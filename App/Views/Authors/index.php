<?php include dirname(__DIR__) . '/Base/header.php'; ?>
<?php include dirname(__DIR__) . '/Base/nav.php'; ?>
    <nav>
        <ul>
            <li><a href="authors/new" class="button">Add author</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <header>
                <h2>Author list</h2>
            </header>
            <?php if (isset($_SESSION['message'])): ?>
                <section class="message">
                    <p><?=$_SESSION['message'] ?></p>
                    <?php unset($_SESSION['message']); ?>
                </section>
            <?php endif; ?>
            <?php foreach ($authors as $author): ?>
                <article class="card">
                    <header>
                        <h3><?=htmlspecialchars($author['first_name'] . ' ' . $author['last_name']); ?></h3>
                    </header>
                    <form action="<?=\App\Config::BASE_URL ?>authors/delete" method="POST">
                        <input type="hidden" name="author_id" value="<?=$author['author_id'] ?>">
                        <button>Delete</button>
                    </form>
                </article>  
            <?php endforeach; ?>
        </section>
    </main>
<?php include dirname(__DIR__) . '/Base/footer.php'; ?>