<?php

/**
 * Script de criação e povoamento do banco de dados 'bakerysite'.
 * - Usa as configurações em `config.php` (DB_CONF)
 * - Cria o banco se não existir
 * - Cria tabelas: users, types, breads, about
 * - Insere dados iniciais (seed)
 *
 * Uso (CLI): php tests/db_script.php
 */

declare(strict_types=1);

define("DB_CONF", [
    "DB_HOST" => "localhost",
    "DB_PORT" => "3306",
    "DB_NAME" => "bakerysite",
    "DB_USER" => "root",
    "DB_PASSWORD" => "",
    "DB_CHARSET" => "utf8"
]);

if (!defined('DB_CONF')) {
	echo "Erro: DB_CONF não definida em config.php\n";
	exit(1);
}

$conf = DB_CONF;
$host = $conf['DB_HOST'] ?? '127.0.0.1';
$port = $conf['DB_PORT'] ?? '3306';
$dbName = $conf['DB_NAME'] ?? 'bakerysite';
$user = $conf['DB_USER'] ?? 'root';
$pass = $conf['DB_PASSWORD'] ?? '';
$charset = $conf['DB_CHARSET'] ?? 'utf8mb4';

try {
	// 1) conectar ao servidor sem especificar database para criar o DB se necessário
	$dsnServer = sprintf('mysql:host=%s;port=%s;charset=%s', $host, $port, $charset);
	$pdo = new PDO($dsnServer, $user, $pass, [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	]);

	echo "Conectado ao servidor MySQL ({$host}:{$port})\n";

	// 2) criar banco caso não exista
	$pdo->exec(sprintf("CREATE DATABASE IF NOT EXISTS `%s` CHARACTER SET %s COLLATE %s_general_ci", $dbName, $charset, $charset));
	echo "Banco de dados '{$dbName}' verificado/criado.\n";

	// 3) conectar ao banco criado
	$dsnDb = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $host, $port, $dbName, $charset);
	$db = new PDO($dsnDb, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

	// 4) criar tabelas
	$sql = [];

	// users
	$sql[] = "CREATE TABLE IF NOT EXISTS `users` (
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`name` VARCHAR(150) NOT NULL,
		`email` VARCHAR(150) NOT NULL UNIQUE,
		`password` VARCHAR(255) NOT NULL,
		`role` ENUM('admin','customer') NOT NULL DEFAULT 'customer',
		`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		`updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET={$charset};";

	// types (categoria de pães)
	$sql[] = "CREATE TABLE IF NOT EXISTS `types` (
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`name` VARCHAR(100) NOT NULL UNIQUE,
		`slug` VARCHAR(120) NOT NULL UNIQUE,
		`description` TEXT NULL,
		`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		`updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET={$charset};";

	// breads
	$sql[] = "CREATE TABLE IF NOT EXISTS `breads` (
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`type_id` INT UNSIGNED NOT NULL,
		`name` VARCHAR(150) NOT NULL,
		`slug` VARCHAR(160) NOT NULL UNIQUE,
		`description` TEXT NULL,
		`price` DECIMAL(8,2) NOT NULL DEFAULT 0.00,
		`weight` VARCHAR(50) NULL,
		`size` ENUM('grande','medio','pequeno') NOT NULL DEFAULT 'medio',
		`image` VARCHAR(255) NULL,
		`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		`updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
		CONSTRAINT `fk_breads_type` FOREIGN KEY (`type_id`) REFERENCES `types`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE
	) ENGINE=InnoDB DEFAULT CHARSET={$charset};";

	// about
	$sql[] = "CREATE TABLE IF NOT EXISTS `about` (
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`company_name` VARCHAR(200) NOT NULL,
		`slogan` VARCHAR(255) NULL,
		`description` TEXT NULL,
		`phone` VARCHAR(50) NULL,
		`email` VARCHAR(150) NULL,
		`address` TEXT NULL,
		`mission` TEXT NULL,
		`vision` TEXT NULL,
		`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		`updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET={$charset};";

	foreach ($sql as $stmt) {
		$db->exec($stmt);
	}

	echo "Tabelas (users, types, breads, about) criadas/verificadas.\n";

	// 5) semear dados (seed)
	$db->beginTransaction();

	// types seed
	$types = [
		['name' => 'Pães grande', 'slug' => 'grande', 'description' => 'Pães de tamanho grande (família/compartilhado)'],
		['name' => 'Pães médio', 'slug' => 'medio', 'description' => 'Pães de tamanho médio (pão de forma, ciabatta)'],
		['name' => 'Pães pequeno', 'slug' => 'pequeno', 'description' => 'Pães individuais e pequenos (croissant, pães de leite)']
	];

	$insertType = $db->prepare("INSERT IGNORE INTO `types` (`name`,`slug`,`description`) VALUES (:name,:slug,:description)");
	foreach ($types as $t) {
		$insertType->execute($t);
	}

	// fetch type ids
	$typeMap = [];
	$stmt = $db->query("SELECT id, slug FROM types");
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$typeMap[$row['slug']] = (int)$row['id'];
	}

	// users seed (admin + sample customer)
	$checkUser = $db->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
	$insertUser = $db->prepare("INSERT INTO users (name,email,password,role) VALUES (:name,:email,:password,:role)");

	$adminEmail = 'admin@umbaladopao.local';
	$checkUser->execute([':email' => $adminEmail]);
	if (!$checkUser->fetch()) {
		$insertUser->execute([
			':name' => 'Administrador',
			':email' => $adminEmail,
			':password' => password_hash('ChangeMe123!', PASSWORD_DEFAULT),
			':role' => 'admin'
		]);
		echo "Usuário admin criado: {$adminEmail} (senha: ChangeMe123!)\n";
	} else {
		echo "Usuário admin já existe: {$adminEmail}\n";
	}

	$customerEmail = 'cliente@umbaladopao.local';
	$checkUser->execute([':email' => $customerEmail]);
	if (!$checkUser->fetch()) {
		$insertUser->execute([
			':name' => 'Cliente Exemplo',
			':email' => $customerEmail,
			':password' => password_hash('cliente123', PASSWORD_DEFAULT),
			':role' => 'customer'
		]);
		echo "Usuário cliente criado: {$customerEmail} (senha: cliente123)\n";
	}

	// breads seed
	$breads = [
		['name' => 'Pão Italiano', 'slug' => 'pao-italiano', 'description' => 'Crosta crocante, miolo aerado, ideal para sanduíches e acompanhamentos.', 'price' => 8.50, 'weight' => '800g', 'size' => 'grande', 'image' => '/assets/images/pao-italiano.jpg'],
		['name' => 'Bolo de Laranja', 'slug' => 'bolo-laranja', 'description' => 'Bolo caseiro de laranja, macio e suculento.', 'price' => 25.00, 'weight' => '1200g', 'size' => 'grande', 'image' => '/assets/images/bolo-laranja.jpg'],
		['name' => 'Croissant', 'slug' => 'croissant', 'description' => 'Folhado amanteigado, perfeito no café da manhã.', 'price' => 6.00, 'weight' => '80g', 'size' => 'pequeno', 'image' => '/assets/images/croissant.jpg'],
		['name' => 'Pão de Centeio', 'slug' => 'pao-centeio', 'description' => 'Pão rústico de centeio, sabor marcante.', 'price' => 7.00, 'weight' => '600g', 'size' => 'medio', 'image' => '/assets/images/pao-centeio.jpg'],
		['name' => 'Pão de Milho', 'slug' => 'pao-milho', 'description' => 'Sabor suave, ótimo com manteiga.', 'price' => 6.50, 'weight' => '500g', 'size' => 'medio', 'image' => '/assets/images/pao-milho.jpg'],
		['name' => 'Pão de Leite', 'slug' => 'pao-leite', 'description' => 'Fofinho, ideal para lanches infantis.', 'price' => 4.00, 'weight' => '60g', 'size' => 'pequeno', 'image' => '/assets/images/pao-leite.jpg'],
	];

	$insertBread = $db->prepare("INSERT IGNORE INTO breads (type_id,name,slug,description,price,weight,size,image) VALUES (:type_id,:name,:slug,:description,:price,:weight,:size,:image)");
	foreach ($breads as $b) {
		$typeKey = $b['size'];
		$typeId = $typeMap[$typeKey] ?? null;
		if ($typeId === null) {
			// default to 'medio' if mapping not found
			$typeId = $typeMap['medio'] ?? 1;
		}
		$insertBread->execute([
			':type_id' => $typeId,
			':name' => $b['name'],
			':slug' => $b['slug'],
			':description' => $b['description'],
			':price' => $b['price'],
			':weight' => $b['weight'],
			':size' => $b['size'],
			':image' => $b['image']
		]);
	}

	// about seed (single record)
	$aboutCheck = $db->query("SELECT id FROM about LIMIT 1")->fetch();
	if (!$aboutCheck) {
		$stmt = $db->prepare("INSERT INTO about (company_name,slogan,description,phone,email,address,mission,vision) VALUES (:company_name,:slogan,:description,:phone,:email,:address,:mission,:vision)");
		$stmt->execute([
			':company_name' => 'Umbala do Pão',
			':slogan' => 'Sabor e tradição em cada fornada',
			':description' => 'Padaria artesanal especializada em pães, bolos e doces feitos com ingredientes selecionados e técnicas artesanais.',
			':phone' => '+55 11 99999-9999',
			':email' => 'contato@umbaladopao.local',
			':address' => 'Rua Exemplo, 123, Centro, Cidade, Estado',
			':mission' => 'Produzir pães artesanais de alta qualidade, valorizando o sabor e a tradição.',
			':vision' => 'Ser referência local em panificação artesanal.'
		]);
		echo "Registro 'about' criado.\n";
	} else {
		echo "Registro 'about' já existe.\n";
	}

	$db->commit();

	echo "Seed concluído com sucesso.\n";

} catch (PDOException $e) {
	if (isset($db) && $db->inTransaction()) {
		$db->rollBack();
	}
	echo "Erro PDO: " . $e->getMessage() . "\n";
	exit(1);
}

echo "Script finalizado.\n";

