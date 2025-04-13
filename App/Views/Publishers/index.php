<?php include dirname(__DIR__) . '/Base/header.php'; ?>
<?php include dirname(__DIR__) . '/Base/nav.php'; ?>
    <nav>
        <ul>
            <li><a href="publishers/new" class="button">Add publisher</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <header>
                <h2>Publisher list</h2>
            </header>
            <?php if (isset($message)): ?>
                <section class="message">
                    <p><?=$message ?></p>
                </section>
            <?php endif; ?>
            <?php foreach ($publishers as $publisher): ?>
                <article class="card">
                    <header>
                        <h3><?=htmlspecialchars($publisher['name']); ?></h3>
                    </header>
                    <form action="<?=\App\Config::BASE_URL ?>publishers/delete" method="POST">
                        <input type="hidden" name="publisher_id" value="<?=$publisher['publisher_id'] ?>">
                        <button>Delete</button>
                    </form>
                </article>  
            <?php endforeach; ?>
        </section>
    </main>
<?php include dirname(__DIR__) . '/Base/footer.php'; ?>