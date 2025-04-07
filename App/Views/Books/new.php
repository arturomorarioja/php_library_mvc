<?php include dirname(__DIR__) . '../Base/header.php'; ?>
<?php include dirname(__DIR__) . '../Base/nav.php'; ?>
    <nav>
        <ul>
            <li><a href="books">Back</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <form action="" method="POST">
                <div>
                    <label for="txtTitle">Title</label>
                    <input type="text" name="title" id="txtTitle">
                </div>
                <div>
                    <label for="cmbAuthors">Author</label>
                    <select name="author" id="cmbAuthors">
                        <?php foreach ($authors as $author): ?>
                            <option value="<?=htmlspecialchars($author['author_id']) ?>">
                                <?=htmlspecialchars($author['first_name']) . ' ' . 
                                    htmlspecialchars($author['last_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="cmbPublishers">Publisher</label>
                    <select name="publisher" id="cmbPublishers">
                        <?php foreach ($publishers as $publisher): ?>
                            <option value="<?=htmlspecialchars($publisher['publisher_id']) ?>">
                                <?=htmlspecialchars($publisher['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="txtPublishingYear">Publishing year</label>
                    <input type="number" name="publishing_year" id="txtPublishingYear" pattern="\d{4}">
                </div>
                <div>
                    <button type="submit">Add book</button>
                </div>
            </form>
        </section>
    </main>
<?php include dirname(__DIR__) . '../Base/footer.php'; ?>