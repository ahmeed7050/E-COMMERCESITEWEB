<?php

use App\Connection;
use App\Table\CategoryTable;
use App\Table\PostTable;

$slug = (int)$params['slug'];
$id = $params['id'];


$pdo = Connection::getPDO();
$category = (new CategoryTable($pdo))->find($id);;


$title = "Category {$category->getName()}";



[$posts, $paginatedQuery] = (new PostTable($pdo))->findPaginatedForCategory($category->getId());
$link = $router->url('category', ['id' => $category->getId(), 'slug' => $category->getSlug()]);

?>
<h1><?= e($title) ?></h1>

<div class="row">
    <?php foreach ($posts as $post) : ?>
        <div class="col-md-3">
            <?php require dirname(__DIR__) . '/post/card.php' ?>
        </div>
    <?php endforeach ?>
</div>

<div class="d-flex justify-content-between my-4">
    <?= $paginatedQuery->previousLink($link) ?>
    <?= $paginatedQuery->nextLink($link) ?>

</div>