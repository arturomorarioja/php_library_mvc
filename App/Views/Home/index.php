<?php include dirname(__DIR__) . '/Base/header.php'; ?>
<?php include dirname(__DIR__) . '/Base/nav.php'; ?>
    <main>
        <p>Welcome to library <?=$library ?>, in the future <?=$futureLibrary ?>.</p>
        <section>
            <header>
                <h2>Book topics</h2>
            </header>
            <ul>
                <?php foreach($topics as $topic): ?>
                    <li><?=$topic ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
<?php include dirname(__DIR__) . '/Base/footer.php'; ?>