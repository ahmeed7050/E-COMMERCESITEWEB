<?php
$categories = array_map(function ($categorie) use ($router) {
    $url = $router->url('category', ['slug' => $categorie->getSlug(), 'id' => $categorie->getId()]);
    return <<<HTML
    <a href= "{$url}">{$categorie->getName()}</a>
HTML;
}, $post->getCategories());




?>



<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><?= htmlentities($post->getName()) ?></h5>
        <img src="https://i.ibb.co/6Xd6NYC/product-1.png" alt="Denim Jeans" style="width:100%">

        <p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?>
            <?php if (!empty($post->getCategories())) : ?>
                ::
                <?= implode(',', $categories); ?>

            <?php endif ?>

        </p>

        <p>
            <?= $post->getExcerpt() //pour gérer correctement les ligne et excerpt pour avoir une limit a notre content et faire 3points
            ?>
        </p>
        <p>
            <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-primary">Voir Plus</a>
        </p>
    </div>
</div>