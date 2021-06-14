<?php

use App\Connection;

$err = null;
if (isset($_POST['name'], $_POST['mail'], $_POST['message'])) {
    $pdo = Connection::getPDO();
    $query = $pdo->prepare("INSERT INTO message (name, email, message) VALUES (:name, :email, :message)");
    $query->execute([
        'name' => $_POST['name'],
        'email' => $_POST['mail'],
        'message' => $_POST['message']
    ]);

    $err = "Votre message a été envoyé";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-cont.css">
    <title>Contact
    </title>
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

    .cont {
        width: 100%;
        height: 62vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }

    .cont .logo {
        padding: 1%;
        width: 30%;
        color: BLACK;

        text-align: center;
    }

    .cont .logo .logo-l {
        color: red;
    }

    .cont-form {
        background-color: gray;
        border-radius: 5%;
        width: 30%;
        height: 80%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .cont-form input {
        padding: 1%;
        margin-top: 2%;
        width: 60%;
        border: none;


    }

    .cont-form button {

        border-radius: 10%;
        padding: 1.5%;
    }

    .cont-form input {
        transition: 0.3s all;
    }

    .cont-form input:hover {
        border: 2px solid green;
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
                <li><a href="<?= $router->url('home') ?>" style="margin-right: 10px;">PRODUIT</a></li>
                <li><a href="<?= $router->url('contact') ?>" style="margin-right: 10px;">CONTACT</a></li>
                <li><a href="<?= $router->url('connexion') ?>" style="margin-right: 10px;">CONNEXION</a></li>
            </ul>

        </div>
    </nav>
    <?php if ($err) : ?>
        <div class="alert alert-success">
            <?= $err ?>
        </div>
    <?php endif ?>
    <div class="cont">


        <div class="logo">
            <h1>CONTACT &nbsp;<span class="logo-l">US</span></h1>
        </div>

        <div class="cont-form">
            <form action="" method="POST">
                <input name="name" type="text" placeholder="Name" style="margin-left: 100px;">
                <input name="mail" type=" text" placeholder="e-mail" style="margin-left: 100px;">
                <br>
                <textarea name="message" rows="5" cols="34" placeholder="Messages" style="margin-left: 100px; margin-top: 10px;"></textarea>
                <br><br>
                <button style="margin-left: 190px;"><a>SEND</a></button>
            </form>
        </div>



    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3233.6359098696353!2d10.596831315338807!3d35.857930280153425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd8a6ac0dd6b73%3A0x3a7c2268934541aa!2sInstitut%20Sup%C3%A9rieur%20d&#39;Informatique%20et%20des%20Techniques%20de%20Communication!5e0!3m2!1sen!2stn!4v1622735114683!5m2!1sen!2stn" width="1600" height="450" style="border:0; margin-top: 50px;" allowfullscreen="" loading="lazy"></iframe>




</body>

</html>