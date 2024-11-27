<?php include dirname(__DIR__) . '../Base/header.php'; ?>
<?php include dirname(__DIR__) . '../Base/nav.php'; ?>
    <main>
        <section>
            <h2>Books</h2>
            <?php foreach ($books as $book): ?>
                <article>
                    <h3><?=htmlspecialchars($book['title']); ?></h3>
                    <h4><?=htmlspecialchars($book['author_first_name'] . ' ' . $book['author_last_name']); ?></h4>
                    <p><?=htmlspecialchars($book['publisher'] . ', ' . $book['publishing_year']) ?></p>
                </article>  
            <?php endforeach; ?>
        </section>
    </main>
<?php include dirname(__DIR__) . '../Base/footer.php'; ?>