<?php include dirname(__DIR__) . '/Base/header.php'; ?>
<?php include dirname(__DIR__) . '/Base/nav.php'; ?>
    <main id="home">
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
        <img src="<?=\App\Config::BASE_URL ?>img/library.jpg" alt="KEA Library">
    </main>
<?php include dirname(__DIR__) . '/Base/footer.php'; ?>