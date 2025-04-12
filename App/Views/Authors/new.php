<?php include dirname(__DIR__) . '/Base/header.php'; ?>
<?php include dirname(__DIR__) . '/Base/nav.php'; ?>
    <nav>
        <ul>
            <li><a href="<?=\App\Config::BASE_URL ?>authors" class="button">Back</a></li>
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
            <form action="<?=\App\Config::BASE_URL ?>authors/create" method="POST" novalidate>
                <div>
                    <label for="txtFirstName">First name</label>
                    <input type="text" name="first_name" id="txtFirstName"
                        value="<?=htmlspecialchars(trim($_POST['first_name'] ?? '')) ?>">
                </div>
                <div>
                    <label for="txtLastName">Last name</label>
                    <input type="text" name="last_name" id="txtLastName"
                        value="<?=htmlspecialchars(trim($_POST['last_name'] ?? '')) ?>">
                </div>
                <div>
                    <button type="submit">Add author</button>
                </div>
            </form>
        </section>
    </main>
<?php include dirname(__DIR__) . '/Base/footer.php'; ?>