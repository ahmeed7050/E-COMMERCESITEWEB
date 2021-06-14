<?php

use App\Connection;
use App\Table\CategoryTable;
use App\Validator;
use App\HTML\Form;
use App\Validators\CategoryValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$success = false;
$pdo = Connection::getPDO();
$table = new CategoryTable($pdo);
$item = $table->find($params['id']);


$errors = [];
$fields = ['name', 'slug'];
if (!empty($_POST)) {
    //Validator::lang('fr');
    $v = new CategoryValidator($_POST, $table, $item->getId());
    ObjectHelper::hydrate($item, $_POST, $fields);

    if ($v->validate()) {
        $table->update([
            'name' => $item->getName(),
            'slug' => $item->getSlug(),

        ], $item->getId());
        $success = true;
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($item, $errors);
?>
<?php if ($success) : ?>
    <div class="alert alert-success">
        La catégorie a bien été modifier
    </div>
<?php endif ?>

<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        La catégorie n'a pas pu être modifié, merci de corriger vos erreurs
    </div>
<?php endif ?>

<h1>Editer La catégorie <?= e($item->getName()) ?></h1>

<?php require('_form.php'); ?>