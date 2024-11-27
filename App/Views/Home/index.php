<?php include dirname(__DIR__) . '../Base/header.php'; ?>
<?php include dirname(__DIR__) . '../Base/nav.php'; ?>
    <main>
        <p>Hello <?=htmlspecialchars($name); ?></p>
        <p>
            This is the list of colours:
        </p>
        <ul>
            <?php foreach ($colours as $colour): ?>
                <li><?=htmlspecialchars($colour); ?></li>
            <?php endforeach; ?>
        </ul>
    </main>
<?php include dirname(__DIR__) . '../Base/footer.php'; ?>