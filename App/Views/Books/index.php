<?php include dirname(__DIR__) . '/Base/header.php'; ?>
<?php include dirname(__DIR__) . '/Base/nav.php'; ?>
    <nav>
        <ul>
            <li><a href="books/new" class="button">Add book</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <header>
                <h2>Book list</h2>
            </header>
            <?php if (isset($message)): ?>
                <section class="message">
                    <p><?=$message ?></p>
                </section>
            <?php endif; ?>
            <?php foreach ($books as $book): ?>
                <article class="book_card">
                    <header>
                        <h3><?=htmlspecialchars($book['title']); ?></h3>
                        <h4><?=htmlspecialchars($book['author_first_name'] . ' ' . $book['author_last_name']); ?></h4>
                    </header>
                    <p><?=htmlspecialchars($book['publisher'] . ', ' . $book['publishing_year']) ?></p>
                    <form action="<?=\App\Config::BASE_URL ?>books/delete" method="POST">
                        <input type="hidden" name="book_id" value="<?=$book['book_id'] ?>">
                        <button>Delete</button>
                    </form>
                </article>  
            <?php endforeach; ?>
        </section>
    </main>
<?php include dirname(__DIR__) . '/Base/footer.php'; ?>