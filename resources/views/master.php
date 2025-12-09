<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        *{margin: 0; padding: 0; box-sizing: border-box;}
        body {width: 90%; margin: 20px auto;}
        header {display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;}
        header ul {display: flex; flex-wrap: wrap; list-style: none; gap: 20;}
        header ul a {padding: 10px 20px;}
        main {margin: 30px 0;}
        footer {color: #666;}
        h1, h1, h3 {margin-bottom: 20px;}
        p, li {margin-bottom: 10px;}
        .danger {color: red;}
        h1.danger + p {color: #900;}
    </style>
</head>
<body>
    <header>
        <h1><a href="/">Route system</a></h1>

        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/service">Services</a></li>
                <li><a href="/about">About</a></li>
            </ul>
        </nav>
    </header>
    <main>
        
        <?php require VIEWS . '/' . $page . '.php'; ?>

    </main>
    <footer>
        <p>&copy; ngomafortuna <?= date('Y') ?></p>
    </footer>
</body>
</html>