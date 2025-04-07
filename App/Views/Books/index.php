<?php include dirname(__DIR__) . '../Base/header.php'; ?>
<?php include dirname(__DIR__) . '../Base/nav.php'; ?>
    <nav>
        <ul>
            <li><a href="books/new">Add book</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <header>
                <h2>Books</h2>
            </header>
            <?php foreach ($books as $book): ?>
                <article>
                    <header>
                        <h3><?=htmlspecialchars($book['title']); ?></h3>
                        <h4><?=htmlspecialchars($book['author_first_name'] . ' ' . $book['author_last_name']); ?></h4>
                    </header>
                    <p><?=htmlspecialchars($book['publisher'] . ', ' . $book['publishing_year']) ?></p>
                </article>  
            <?php endforeach; ?>
        </section>
    </main>
<?php include dirname(__DIR__) . '../Base/footer.php'; ?>