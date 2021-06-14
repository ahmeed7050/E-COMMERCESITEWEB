<?php

use App\Connection;
use App\Table\CategoryTable;
use App\Auth;

Auth::check();

$title = "Gestion des catégories";
$pdo = Connection::getPDO();
$link = $router->url('admin_categories');
$items = (new CategoryTable($pdo))->all();
?>
<?php if (isset($_GET['delete'])) : ?>
    <div class="alert alert-success">l'enregistrement a bien été supprimé</div>
<?php endif ?>
<?php if (isset($_GET['created'])) : ?>
    <div class="alert alert-success">
        La categorie a bien été crée
    </div>
<?php endif ?>
<table class="table table-hover w-100">
    <thead>
        <th>#</th>
        <th>Title</th>
        <th>URL</th>
        <th>
            <a href="<?= $router->url('admin_category_new') ?>" class="btn btn-primary">Nouveau</a>
        </th>
    </thead>
    <tbody>
        <?php foreach ($items as $item) : ?>
            <tr>
                <td>
                    <?= $item->getId() ?>
                </td>
                <td>
                    <a href="<?= $router->url('admin_category', ['id' => $item->getId()]) ?>">
                        <?= $item->getName() ?>
                    </a>
                </td>
                <td><?= $item->getSlug() ?></td>
                <td>
                    <a href="<?= $router->url('admin_category', ['id' => $item->getId()]) ?>" class="btn btn-primary">
                        Editer
                    </a>
                    <form action=" <?= $router->url('admin_category_delete', ['id' => $item->getId()]) ?>" method="POSt" onsubmit="return confirm('voulez vous vraiment supprimer ce article')" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>