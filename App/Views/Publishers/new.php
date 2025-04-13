<?php include dirname(__DIR__) . '/Base/header.php'; ?>
<?php include dirname(__DIR__) . '/Base/nav.php'; ?>
    <nav>
        <ul>
            <li><a href="<?=\App\Config::BASE_URL ?>publishers" class="button">Back</a></li>
        </ul>
    </nav>
    <main>
        <?php if (isset($validationErrors)): ?>
            <section class="validation_error">
                <?php foreach ($validationErrors as $error): ?>
                    <p><?=$error ?></p>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
        <section>
            <form action="<?=\App\Config::BASE_URL ?>publishers/create" method="POST" novalidate>
                <div>
                    <label for="txtName">Name</label>
                    <input type="text" name="name" id="txtName"
                        value="<?=htmlspecialchars(trim($_POST['name'] ?? '')) ?>">
                </div>
                <div>
                    <button type="submit">Add publisher</button>
                </div>
            </form>
        </section>
    </main>
<?php include dirname(__DIR__) . '/Base/footer.php'; ?>