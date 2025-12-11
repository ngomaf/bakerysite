<?php
/**
 * Script para aumentar a quantidade de pães até 50, distribuindo-os entre as categorias
 * (grande, medio, pequeno) de forma uniforme ou quase uniforme.
 * Uso: php tests/expand_breads.php
 */

declare(strict_types=1);

// carregar configuração se existir
define("DB_CONF", [
    "DB_HOST" => "localhost",
    "DB_PORT" => "3306",
    "DB_NAME" => "bakerysite",
    "DB_USER" => "root",
    "DB_PASSWORD" => "",
    "DB_CHARSET" => "utf8"
]);

// valores padrão se DB_CONF não estiver definido
if (defined('DB_CONF')) {
    $conf = DB_CONF;
    $host = $conf['DB_HOST'] ?? '127.0.0.1';
    $port = $conf['DB_PORT'] ?? '3306';
    $dbName = $conf['DB_NAME'] ?? 'bakerysite';
    $user = $conf['DB_USER'] ?? 'root';
    $pass = $conf['DB_PASSWORD'] ?? '';
    $charset = $conf['DB_CHARSET'] ?? 'utf8mb4';
} else {
    // ajuste conforme seu ambiente
    $host = '127.0.0.1';
    $port = '3306';
    $dbName = 'bakerysite';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
}

try {
    $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $host, $port, $dbName, $charset);
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    echo "Conectado a {$dbName} em {$host}:{$port}\n";

    // Mapear tipos (slug => id)
    $typeMap = [];
    $stmt = $pdo->query("SELECT id, slug FROM types");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $typeMap[$row['slug']] = (int)$row['id'];
    }

    if (empty($typeMap)) {
        echo "Nenhum tipo encontrado na tabela 'types'. Rode tests/db_script.php primeiro para criar tipos.\n";
        exit(1);
    }

    // contar pães existentes
    $totalStmt = $pdo->query("SELECT COUNT(*) AS c FROM breads");
    $totalRow = $totalStmt->fetch();
    $currentTotal = (int)($totalRow['c'] ?? 0);

    $targetTotal = 50;
    if ($currentTotal >= $targetTotal) {
        echo "Já existem {$currentTotal} pães (>= {$targetTotal}). Nada a fazer.\n";
        exit(0);
    }

    $toCreate = $targetTotal - $currentTotal;
    echo "Existem atualmente {$currentTotal} pães. Será inserido(s) {$toCreate} para alcançar {$targetTotal}.\n";

    // obter distribuição atual por size
    $countsBySize = ['grande' => 0, 'medio' => 0, 'pequeno' => 0];
    $stmt = $pdo->query("SELECT size, COUNT(*) AS c FROM breads GROUP BY size");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $size = $row['size'] ?? '';
        if (isset($countsBySize[$size])) {
            $countsBySize[$size] = (int)$row['c'];
        }
    }

    // objetivo por categoria (distribuição uniforme)
    $base = intdiv($targetTotal, 3); // 16
    $remainder = $targetTotal % 3; // 2
    $goalBySize = ['grande' => $base, 'medio' => $base, 'pequeno' => $base];
    // distribuir remainder para as primeiras categorias
    $order = ['grande', 'medio', 'pequeno'];
    for ($i = 0; $i < $remainder; $i++) {
        $goalBySize[$order[$i]]++;
    }

    echo "Meta por categoria: grande={$goalBySize['grande']}, medio={$goalBySize['medio']}, pequeno={$goalBySize['pequeno']}\n";

    // calcular quantos inserir por categoria
    $needPerSize = [];
    foreach ($goalBySize as $size => $goal) {
        $needPerSize[$size] = max(0, $goal - ($countsBySize[$size] ?? 0));
    }

    // caso ainda faltem (por diferença entre currentTotal and goals), ajustar pelo total faltante
    $sumNeed = array_sum($needPerSize);
    if ($sumNeed < $toCreate) {
        // distribuir os restantes ciclicamente
        $remaining = $toCreate - $sumNeed;
        $idx = 0;
        while ($remaining > 0) {
            $needPerSize[$order[$idx % 3]]++;
            $remaining--;
            $idx++;
        }
    }

    echo "Será inserido por categoria: grande={$needPerSize['grande']}, medio={$needPerSize['medio']}, pequeno={$needPerSize['pequeno']}\n";

    // preparar insert
    $insert = $pdo->prepare("INSERT INTO breads (type_id,name,slug,description,price,weight,size,image) VALUES (:type_id,:name,:slug,:description,:price,:weight,:size,:image)");

    $created = 0;
    $counter = 1;

    // helper para gerar slug
    $slugify = function($text) {
        $text = strtolower(trim($text));
        $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
        $text = trim($text, '-');
        return $text ?: 'pao';
    };

    $sampleNames = [
        'Pão Integral', 'Pão de Centeio', 'Pão de Alecrim', 'Baguete', 'Focaccia', 'Pão de Milho', 'Pão de Azeitona', 'Pão de Batata', 'Pão Doce', 'Croissant Simples', 'Pão de Leite', 'Pão de Queijo', 'Ciabatta', 'Pão Sírio', 'Brioche', 'Rosca Caseira'
    ];

    foreach (['grande','medio','pequeno'] as $size) {
        $count = $needPerSize[$size] ?? 0;
        for ($i = 0; $i < $count; $i++) {
            // escolher nome base
            $baseName = $sampleNames[array_rand($sampleNames)];
            $name = $baseName . ' ' . ($currentTotal + $created + 1);
            $slug = $slugify($baseName) . '-' . uniqid();

            // tipo_id: mapear por slug (aqui usamos type slug igual ao size)
            $typeId = $typeMap[$size] ?? null;
            if ($typeId === null) {
                // fallback: pegar primeiro id disponível
                $first = reset($typeMap);
                $typeId = $first ?: 1;
            }

            // price e weight por tamanho
            switch ($size) {
                case 'grande':
                    $price = number_format(rand(900,2000)/100, 2, '.', ''); // 9.00 - 20.00
                    $weight = rand(700,1200) . 'g';
                    break;
                case 'medio':
                    $price = number_format(rand(450,1000)/100, 2, '.', ''); // 4.50 - 10.00
                    $weight = rand(400,700) . 'g';
                    break;
                default:
                    $price = number_format(rand(150,650)/100, 2, '.', ''); // 1.50 - 6.50
                    $weight = rand(40,150) . 'g';
            }

            $image = '/assets/images/pao-placeholder.jpg';
            $description = 'Delicioso ' . $baseName . ' preparado com carinho.';

            $insert->execute([
                ':type_id' => $typeId,
                ':name' => $name,
                ':slug' => $slug,
                ':description' => $description,
                ':price' => $price,
                ':weight' => $weight,
                ':size' => $size,
                ':image' => $image
            ]);

            $created++;
        }
    }

    echo "Inseridos {$created} novos pães. Total final estimado: " . ($currentTotal + $created) . "\n";
    echo "Concluído.\n";

} catch (PDOException $e) {
    echo "Erro PDO: " . $e->getMessage() . "\n";
    exit(1);
}
