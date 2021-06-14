<?php

use App\Connection;
use App\Table\PostTable;
use App\Table\CategoryTable;
use App\Validator;
use App\HTML\Form;
use App\Validators\PostValidator;
use App\ObjectHelper;
use App\Modele\Post;
use App\Auth;

Auth::check();

$errors = [];
$post = new Post();
$pdo = Connection::getPDO();
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$post->setCreatedAt(date('Y-m-d H:i:s'));
if (!empty($_POST)) {
    $postTable = new PostTable($pdo);
    //Validator::lang('fr');
    $v = new PostValidator($_POST, $postTable, $post->getId(), $categories);
    ObjectHelper::hydrate($post, $_POST, ['name', 'content', 'slug', 'created_at']);


    if ($v->validate()) {
        $pdo->beginTransaction();
        $postTable->createPost($post);
        $postTable->attachCategories($post->getId(), $_POST['categories_ids']);
        $pdo->commit();
        header('Location: ' . $router->url('admin_posts', ['id' => $post->getId()]) . '?created=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($post, $errors);
?>


<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        la categorie n'a pas pu être enregistrer, merci de corriger vos erreurs
    </div>
<?php endif ?>

<h1>Créer un produit</h1>

<?php require('_form.php'); ?>