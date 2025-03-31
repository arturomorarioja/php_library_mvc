<?php include dirname(__DIR__) . '../Base/header.php'; ?>
<?php include dirname(__DIR__) . '../Base/nav.php'; ?>
    <main>
        <p>Hello <?=htmlspecialchars($school); ?> students</p>
        <p>
            These are some of the concepts illustrated here:
        </p>
        <ul>
            <?php foreach ($concepts as $concept): ?>
                <li><?=htmlspecialchars($concept); ?></li>
            <?php endforeach; ?>
        </ul>
    </main>
<?php include dirname(__DIR__) . '../Base/footer.php'; ?>