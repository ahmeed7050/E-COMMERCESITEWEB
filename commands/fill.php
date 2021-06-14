<?php

use App\Connection;

require dirname(__DIR__) . '/vendor/autoload.php';

$pdo = Connection::getPDO();

$pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
$pdo->exec("TRUNCATE TABLE post_category");
$pdo->exec("TRUNCATE TABLE post");
$pdo->exec("TRUNCATE TABLE category");
$pdo->exec("TRUNCATE TABLE user");
$pdo->exec("SET FOREIGN_KEY_CHECKS = 1");

$posts = [];
$categories = [];

for ($i = 0; $i < 50; $i++) {
    $pdo->exec("INSERT INTO post SET name='Produit #$i', slug='produit-$i', created_at='2021-05-11 14:00:00', content='Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. '");
    $posts[] = $pdo->lastInsertId();
}

for ($i = 0; $i < 5; $i++) {
    $pdo->exec("INSERT INTO category SET name='category #$i', slug='category-$i'");
    $categories[] = $pdo->lastInsertId();
}

foreach ($posts as $post) {
    $randomCategories = array_slice($categories, rand(0, count($categories) - 1), 1);
    foreach ($randomCategories as $category) {
        $pdo->exec("INSERT INTO post_category SET post_id=$post, category_id=$category");
    }
}

$password = password_hash('admin', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO user SET username = 'admin', password = '$password'");

/*if (password_verify('admin', $password)) {
    echo("true");
}*/