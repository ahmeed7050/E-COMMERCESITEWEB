<?php

use App\Connection;
use App\Modele\User;
use App\HTML\Form;
use App\Table\Exception\NotFoundException;
use App\Table\UserTable;

$user = new User();

$errors = [];
$form = new Form($user, $errors);
if (!empty($_POST)) {
    $errors['password'] = 'Indifinant ou mot de passe incorrect';
    $user->setUsername($_POST['username']);
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $table = new UserTable(Connection::getPDO());

        try {
            $u = $table->findByUsername($_POST['username']);
            $u->getPassword();
            $_POST['password'];
            if (password_verify($_POST['password'], $u->getPassword()) === true) {
                session_start();
                $_SESSION['auth'] = $u->getId();
                header('Location: ' . $router->url('admin_posts'));
                exit();
            }
        } catch (NotFoundException $e) {
        }
    }
}
?>
<div class="container">

    <h1>Se connecter</h1>

    <?php if ($errors) : ?>
        <div class="alert alert-danger">
            <?= $errors['password'] ?>
        </div>
    <?php endif ?>

    <?php if (isset($_GET['forbidden'])) : ?>
        <div class="alert alert-danger">
            Vous ne pouvez pas accéder à cette page
        </div>
    <?php endif ?>

    <form action="<?= $router->url('login') ?>" method="POST">
        <?= $form->input('username', 'Nom d\'utisateur'); ?>
        <?= $form->input('password', 'Mot de pasee'); ?>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>