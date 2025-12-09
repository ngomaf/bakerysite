
        <h1><?= $title ?></h1>
        <p><?= $description ?></p>

        <br>
        <?php echo $secoudtitle ?? null ?>
        
        <ul>
            <?php foreach($services as $key => $service): ?>
            <li><a href="/service/<?= ++$key ?>"><?= $service['name'] ?></a></li>
            <?php endforeach ?>
        </ul>
        