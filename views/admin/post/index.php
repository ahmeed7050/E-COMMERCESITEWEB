<?php

use App\Connection;
use App\Table\PostTable;
use App\Auth;

Auth::check();

$title = "administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_posts');
[$posts, $pagination] = (new PostTable($pdo))->findPaginated();
?>
<?php if (isset($_GET['delete'])) : ?>
    <div class="alert alert-success">l'enregistrement a bien été supprimé</div>
<?php endif ?>
<?php if (isset($_GET['created'])) : ?>
    <div class="alert alert-success">
        Le produit a bien été crée
    </div>
<?php endif ?>
<table class="table table-hover w-100">
    <thead>
        <th>#</th>
        <th>Title</th>
        <th>
            <a href="<?= $router->url('admin_post_new') ?>" class="btn btn-primary">Nouveau</a>
        </th>
    </thead>
    <tbody>
        <?php foreach ($posts as $post) : ?>
            <tr>
                <td>
                    <?= $post->getId() ?>
                </td>
                <td>
                    <a href="<?= $router->url('admin_post', ['id' => $post->getId()]) ?>">
                        <?= $post->getName() ?>
                    </a>
                </td>
                <td>
                    <a href="<?= $router->url('admin_post', ['id' => $post->getId()]) ?>" class="btn btn-primary">
                        Editer
                    </a>
                    <form action=" <?= $router->url('admin_post_delete', ['id' => $post->getId()]) ?>" method="POSt" onsubmit="return confirm('voulez vous vraiment supprimer ce article')" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class=" d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
</div>