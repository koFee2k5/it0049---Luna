<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | BPLS</title>
    <link rel="stylesheet" href="<?= esc(base_url('css/style.css?v=20261017')) ?>">
</head>
<body>
    <header>
        <nav class="nav">
            <a class="brand" href="<?= esc(base_url()) ?>">
                <span class="brand-mark">B</span> BPLS
            </a>
            <div class="nav-links">
                <a href="<?= esc(base_url()) ?>">Dashboard</a>
                <a href="<?= esc(base_url('about')) ?>">About BPLS</a>
                <a href="<?= esc(base_url('businesses')) ?>">Permits</a>
                <a href="<?= esc(base_url('tasks')) ?>">Tasks</a>
                <a href="<?= esc(base_url('customer-accounts')) ?>">Customers</a>
                <a href="<?= esc(base_url('user-accounts')) ?>">Users</a>
                <a href="<?= esc(base_url('profile')) ?>">Profile</a>
            </div>
        </nav>
    </header>

    <main class="container">
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Juan Lorenzo M. Luna &mdash; BPLS</p>
    </footer>
</body>
</html>
