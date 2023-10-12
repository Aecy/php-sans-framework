<?php

require_once __DIR__ . '/../../../bootstrap.php';
redirect_unless_admin();

if (is_post()) {
    validate([
        'name' => ['required'],
        'description' => ['required']
    ]);

    $query = pdo()->prepare("INSERT INTO products (name, description) VALUES (?, ?)");
    $query->execute([$_POST['name'], $_POST['description']]);

    flash_success("Le produit « {$_POST['name']} » a bien été supprimé.");
    redirect('/admin/products/index.php');
}

?>

<?php partial("header_admin", ['title' => "Produits"]) ?>

<h1 class="text-xl mb-4">Ajouter un produit</h1>

<form method="post">
    <div class="max-w-sm mb-3">
        <label for="name" class="block text-sm mb-px">
            Nom
        </label>
        <input id="name" type="text" name="name" class="border focus:border-black px-3 py-1 outline-none w-full" value="<?= $previous_inputs['name'] ?? '' ?>">
        <?php if (isset($previous_errors['name'])): ?>
            <p class="w-full text-red-900 text-xs">
                <?= $previous_errors['name'] ?>
            </p>
        <?php endif ?>
    </div>
    <div class="max-w-sm mb-3">
        <label for="description" class="block text-sm mb-px">
            Description
        </label>
        <textarea id="description" name="description" class="border focus:border-black px-3 py-1 outline-none w-full h-32"><?= $previous_inputs['description'] ?? '' ?></textarea>
        <?php if (isset($previous_errors['description'])): ?>
            <p class="w-full text-red-900 text-xs">
                <?= $previous_errors['description'] ?>
            </p>
        <?php endif ?>
    </div>

    <div class="mt-8">
        <button type="submit" class="border py-1 px-2">
            Créer le produit
        </button>
    </div>
</form>

<?php partial("footer_admin") ?>
