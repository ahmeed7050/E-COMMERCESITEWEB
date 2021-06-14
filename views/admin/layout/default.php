<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title><?= isset($title) ? e($title) : 'mon site' ?></title>
</head>

<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="#" class="navbar-brand">mon site</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?= $router->url('admin_posts') ?>" class="nav-link">Produits</a>
            </li>
            <li class="nav-item">
                <a href="<?= $router->url('admin_categories') ?>" class="nav-link">Catégories</a>
            </li>
            <li>
                <form action="<?= $router->url('logout') ?>" method="post" style="display:inline">
                    <button type="submit" class="nav-link" style="background:transparent ; border:none;">Se déconnecter</button>
                </form>
            </li>
        </ul>
    </nav>
    <div class="container">
        <?= $content ?>

    </div>

    <footer class="bg-light py-4 footer mt-auto">
        <div class="container">
            <?php if (defined('DEBUG_TIME')) : ?>
                page générée en <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?> ms
            <?php endif ?>
        </div>
    </footer>
</body>

</html>