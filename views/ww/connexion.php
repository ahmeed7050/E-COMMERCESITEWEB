<?php

use App\Connection;

$err = null;
if (isset($_POST['pseudo'], $_POST['mdp'])) {
    $pdo = Connection::getPDO();
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $query = $pdo->query('SELECT * FROM client');
    $users = $query->fetchAll();
    foreach ($users as $user) {
        if ($user->name === $_POST['pseudo'] || $user->mdp === $_POST['mdp']) {
            session_start();
            $_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION['id'] = $user->id;
            header('location: ' . $router->url('home'));
            exit();
        }
    }
    $err = "Ce compte n'existe pas";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-con.css">
    <title>connexion</title>
</head>
<style>
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

    .navbar {
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
        justify-content: center;
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


        width: 27px;
        height: 27px;
    }
</style>

<body>

    <nav>



        <div class="logo">
            <h1><span class="fl">S</span>ITE <span class="fl">W</span>EB <span class="fl">E</span>-COMMERCE</h1>
        </div>



        <div class="navbar7">
            <ul>
                <li><a href="<?= $router->url('home') ?>" style="margin-right: 10px;">ACCUEIL</a></li>
                <li><a href="<?= $router->url('home') ?>" style="margin-right: 10px;">PRODUIT</a></li>
                <li><a href="<?= $router->url('contact') ?>" style="margin-right: 10px;">CONTACT</a></li>
                <li><a href="<?= $router->url('connexion') ?>" style="margin-right: 10px;">CONNEXION</a></li>
            </ul>

        </div>
    </nav>


    <?php if ($err) : ?>
        <div class="alert alert-danger">
            <?= $err ?>
        </div>
    <?php endif ?>
    <div class="cnx">
        <div class="logo">
            <h1>CONNE<span class="logo-l">XION</span></h1>
        </div>

        <div class="login-form">
            <form action="" method="POST" style="position: relative;">
                <input name="pseudo" type="text" placeholder="Entrez votre pseudo" require style="margin-left: 100px;">
                <input name="mdp" type="password" placeholder="Entrez votre mot de passe" require style="margin-left: 100px;">
                <button style="position: absolute; margin-top: 50px;"><a>CONNEXION</a></button>
            </form>
        </div>




    </div>

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