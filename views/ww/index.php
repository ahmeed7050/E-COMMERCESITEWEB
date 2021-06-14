<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<style>
    * {
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
    }

    body {
        width: 100%;
        height: 100%;
        background-image: url("https://i.ibb.co/DMgTP7W/hero-bg.jpg");
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

<body>
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





    <div class="main">
        <div class="welcome">
            <div class="bnj">
                <h1>Bonjour</h1>
            </div>
            <div class="notre">
                <h1>à notre</h1>
            </div>
            <div class="sitew">
                <h1 class="ex">site web</h1>
            </div>
            <?php if (isset($_SESSION['pseudo'])) : ?>
                <button><a href="#produit">Voir Les Produit</a></button>
            <?php else : ?>
                <button><a href="<?= $router->url('inscrire') ?>">S'INSCRIRE</a></button>
            <?php endif ?>
        </div>
    </div>

    <?php require "../views/post/index.php" ?>







    <footer>
        <div class="logo">
            <h1><span class="fl">S</span>ITE <span class="fl">W</span>EB <span class="fl">E</span>-COMMERCE</h1>
        </div>


        <div class="sm">
            <img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" alt="" width="50px" height="50px" class="fb">
            <img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" alt="" width="50px" height="50px" class="ins">
            <img src="https://img.icons8.com/bubbles/100/000000/twitter.png" alt="" width="50px" height="50px" class="tw">
        </div>

        <h5>copyright &#169; 2020 SiteWebE-commerce. All rights reserved</h5>

    </footer>




</body>

</html>