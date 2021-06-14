<?php

use App\Connection;
use App\Table\CategoryTable;
use App\Validator;
use App\HTML\Form;
use App\Validators\CategoryValidator;
use App\ObjectHelper;
use App\Auth;
use App\Modele\Category;

Auth::check();
$errors = [];
$item = new Category();
//$post->setCreatedAt(date('Y-m-d H:i:s'));
if (!empty($_POST)) {
    $pdo = Connection::getPDO();
    $table = new CategoryTable($pdo);
    //Validator::lang('fr');
    $v = new CategoryValidator($_POST, $table);
    ObjectHelper::hydrate($item, $_POST, ['name', 'slug']);
    if ($v->validate()) {
        $table->create([
            'name' => $item->getName(),
            'slug' => $item->getSlug()
        ]);
        header('Location: ' . $router->url('admin_categories') . '?created=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($item, $errors);
?>


<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        l'article n'a pas pu être enregistrer, merci de corriger vos erreurs
    </div>
<?php endif ?>

<h1>Créer une catégorie</h1>

<?php require('_form.php'); ?>