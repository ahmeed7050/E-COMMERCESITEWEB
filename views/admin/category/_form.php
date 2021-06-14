<form action="#" method="POST">
    <?= $form->input('name', 'Title') ?>
    <?= $form->input('slug', 'URL') ?>
    <button class="btn btn-primary">
        <?php if ($item->getId() !== null) : ?>
            Modifier
        <?php else : ?>
            Créer
        <?php endif ?>
    </button>
</form>