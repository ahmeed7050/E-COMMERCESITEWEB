<?php
session_start();

use App\Connection;
use App\Table\PostTable;
use App\Table\CategoryTable;

$slug = (int)$params['slug'];
$id = $params['id'];

$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);

$title = "Article {$post->getName()}";
?>
<style>
    * {
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
    }

    body {
        width: 100%;
        height: 100%;
        background-size: cover;


    }

    nav {
        width: 100%;
        margin: auto;
        height: 8vh;
        background-color: red;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: gray;
    }

    .navbar7 {
        width: 40%;

    }

    .logo {
        color: white;
        font-weight: bold;
        margin-left: 3%;
    }

    .fl {
        color: red;
    }

    nav ul {
        list-style: none;
        height: 100%;
        display: flex;
        justify-content: space-around;
        align-items: center
    }



    nav ul li a {
        text-decoration: none;
        color: white;
    }

    nav ul li a:hover {
        color: crimson;
    }




    .main {
        height: 92vh;

        width: 100%;

    }


    .welcome {
        width: 25%;
        height: 50%;
        margin-left: 3%;
        padding-top: 10%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

    }

    .welcome h1 {
        font-size: 60px;
        color: black;
    }

    .welcome .ex {
        font-weight: 400;
        color: red;
    }

    .welcome button {
        width: 55%;
        padding: 4%;
        margin-top: 5%;
        border: 1px solid red;
        transition: 0.3s all;
    }

    .welcome button:hover {
        background-color: red;
    }

    .main a {
        text-decoration: none;
        color: black;

    }

    * {
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
    }

    nav {
        width: 100%;
        margin: auto;
        height: 8vh;
        background-color: red;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: gray;
    }

    .navbar7 {
        width: 40%;

    }

    .logo {
        color: white;
        font-weight: bold;
        margin-left: 3%;
    }

    .fl {
        color: red;
    }

    nav ul {
        list-style: none;
        height: 100%;
        display: flex;
        justify-content: space-around;
        align-items: center
    }



    nav ul li a {
        text-decoration: none;
        color: white;
    }

    nav ul li a:hover {
        color: crimson
    }

    .cnx {
        width: 100%;
        height: 62vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }

    .cnx .logo {
        padding: 1%;
        width: 30%;
        color: BLACK;

        text-align: center;
    }

    .cnx .logo .logo-l {
        color: red;
    }

    .login-form {
        background-color: gray;
        border-radius: 5%;
        width: 30%;
        height: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .login-form input {
        padding: 1%;
        margin-top: 2%;
        width: 60%;
        border: none;


    }

    .login-form button {
        margin-left: -38%;
        margin-top: 2%;
        border-radius: 10%;
        padding: 1.5%;
    }

    .login-form input {
        transition: 0.3s all;
    }

    .login-form input:hover {
        border: 2px solid green;
    }


    footer {
        width: 100%;
        height: 30vh;
        background-color: gray;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        flex-direction: column;
    }

    footer .logo {
        margin-left: 0%;

    }

    footer h5 {
        margin-top: 4%;
        font-size: 110%;
        color: white;
    }

    footer .sm {

        width: 15%;
        display: flex;
        justify-content: space-around;
    }

    footer .fb,
    footer .ins,
    footer .tw {
        transition: 0.3s all ease-in;
    }

    footer .fb:hover,
    .ins:hover,
    .tw:hover {


        width: 57px;
        height: 57px;



    }
</style>
<nav>
    <div class="logo">
        <h1><span class="fl">S</span>ITE <span class="fl">W</span>EB <span class="fl">E</span>-COMMERCE</h1>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="<?= $router->url('home') ?>" style="margin-right: 10px;">ACCUEIL</a></li>
            <li><a href="#produit" style="margin-right: 10px;">PRODUIT</a></li>
            <li><a href="<?= $router->url('contact') ?>" style="margin-right: 10px;">CONTACT</a></li>
            <?php if (isset($_SESSION['pseudo'])) : ?>
                <li><a href="<?= $router->url('deconnecter') ?>" style="margin-right: 10px;">DECONNECTER</a></li>
            <?php else : ?>
                <li><a href="<?= $router->url('connexion') ?>" style="margin-right: 10px;">CONNEXION</a></li>
            <?php endif ?>
        </ul>
    </div>
</nav>

<div class="container" style="margin-top: 50px;">
    <?php if (isset($_GET['panier'])) : ?>
        <div class="alert alert-success">
            ajout réussi
        </div>
    <?php endif; ?>
    <img style="width: 500px;" src="https://i.ibb.co/6Xd6NYC/product-1.png" alt="Denim Jeans" style="width:100%"><br> <br>
    <h5 class="card-title"><?= e($post->getName()) ?></h5>
    <p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
    <?php foreach ($post->getCategories() as $k => $categorie) :
        if ($k > 0) :
            echo (', ');
        endif;
        $categorie_url = $router->url('category', ['slug' => $categorie->getSlug(), 'id' => $categorie->getId()]);
    ?><a href="<?= $categorie_url ?>"><?= e($categorie->getName()) ?></a><?php
                                                                        endforeach ?>
    <p><?= $post->getFormattedContent() ?></p>
    <a href="<?= $router->url('panier', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-primary">Ajouter au panier</a>

</div>