<?php

use App\Connection;
use App\Table\CategoryTable;
use App\Table\PostTable;
use App\Validator;
use App\HTML\Form;
use App\Validators\PostValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();
$pdo = Connection::getPDO();
$postTable = new PostTable($pdo);
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();

$post = $postTable->find($params['id']);
$categoryTable->hydratePosts([$post]);
$success = false;


$errors = [];

if (!empty($_POST)) {
    //Validator::lang('fr');
    $v = new PostValidator($_POST, $postTable, $post->getId(), $categories);
    ObjectHelper::hydrate($post, $_POST, ['name', 'content', 'slug', 'created_at']);

    if ($v->validate()) {
        $pdo->beginTransaction();
        $postTable->updatePost($post);
        $postTable->attachCategories($post->getId(), $_POST['categories_ids']);
        $pdo->commit();
        $categoryTable->hydratePosts([$post]);
        $success = true;
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($post, $errors);
?>
<?php if ($success) : ?>
    <div class="alert alert-success">
        Le produit a bien été modifier
    </div>
<?php endif ?>

<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        le produit n'a pas pu être modifié, merci de corriger vos erreurs
    </div>
<?php endif ?>

<h1>Editer le produit <?= e($post->getName()) ?></h1>

<?php require('_form.php'); ?>