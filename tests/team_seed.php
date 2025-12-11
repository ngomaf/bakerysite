<?php
/**
 * Script para criar a tabela `team` e semear membros da equipe.
 * Uso (CLI): php tests/team_seed.php
 *
 * O script procura por uma constante `DB_CONF` (mesma usada por tests/db_script.php).
 * Se não existir, altere as configurações abaixo ou inclua seu `config.php`.
 */

declare(strict_types=1);

// carregar configuração se existir

// ajuste conforme seu ambiente
$host = '127.0.0.1';
$port = '3306';
$dbName = 'bakerysite';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

try {
    $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $host, $port, $dbName, $charset);
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    echo "Conectado a {$dbName} em {$host}:{$port}\n";

    // Criar tabela `team` se não existir
    $sql = "CREATE TABLE IF NOT EXISTS `team` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(150) NOT NULL,
        `role` VARCHAR(150) NULL,
        `image` VARCHAR(255) NULL,
        `bio` TEXT NULL,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET={$charset};";

    $pdo->exec($sql);
    echo "Tabela 'team' criada/verificada.\n";

    // Inserir membros (usar INSERT IGNORE por segurança)
    $members = [
        ['name' => 'João Umbala', 'role' => 'Fundador & Mestre Padeiro', 'image' => '/assets/images/team/joao-umbala.jpg', 'bio' => 'Fundador da padaria, responsável pelas receitas tradicionais.'],
        ['name' => 'Maria Silva', 'role' => 'Confeiteira', 'image' => '/assets/images/team/maria-silva.jpg', 'bio' => 'Especialista em confeitaria e decoração de bolos.'],
        ['name' => 'Carlos Souza', 'role' => 'Atendimento', 'image' => '/assets/images/team/carlos-sousa.jpg', 'bio' => 'Cuida do atendimento ao cliente e vendas.']
    ];

    $insert = $pdo->prepare("INSERT INTO team (name, role, image, bio) VALUES (:name, :role, :image, :bio)");

    foreach ($members as $m) {
        // checar existência por nome (simples)
        $check = $pdo->prepare("SELECT id FROM team WHERE name = :name LIMIT 1");
        $check->execute([':name' => $m['name']]);
        if ($check->fetch()) {
            echo "Membro já existe: {$m['name']}\n";
            continue;
        }
        $insert->execute([
            ':name' => $m['name'],
            ':role' => $m['role'],
            ':image' => $m['image'],
            ':bio' => $m['bio']
        ]);
        echo "Membro inserido: {$m['name']}\n";
    }

    echo "Seed da tabela 'team' concluído.\n";

} catch (PDOException $e) {
    echo "Erro PDO: " . $e->getMessage() . "\n";
    exit(1);
}
