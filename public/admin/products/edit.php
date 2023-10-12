<?php

require_once __DIR__ . '/../../../bootstrap.php';
redirect_unless_admin();

import('products');

$query = pdo()->prepare("SELECT * FROM products WHERE id = ?");
$query->execute([$_GET['id']]);
$query->setFetchMode(PDO::FETCH_CLASS, Product::class);

$product = $query->fetch();

if (! $product) {
    abort_404();
}

if (is_post()) {

    validate([
        'name' => ['required'],
        'description' => ['required']
    ]);

    $query = pdo()->prepare("UPDATE products SET name = ?, description = ? WHERE id = ?");
    $query->execute([$_POST['name'], $_POST['description'], $product->id]);

    flash_success("Le produit « {$product->name} » a bien été modifié.");
    redirect("/admin/products/edit.php?id={$product->id}");
}

?>

<?php partial("header_admin", ['title' => "Produits"]) ?>

<h1 class="text-xl mb-4">Modifier « <?= $product->name ?> »</h1>

<form method="post">
    <div class="max-w-sm mb-3">
        <label for="name" class="block text-sm mb-px">
            Nom
        </label>
        <input id="name" type="text" name="name" class="border focus:border-black px-3 py-1 outline-none w-full" value="<?= $previous_inputs['name'] ?? $product->name ?>">
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
        <textarea id="description" name="description" class="border focus:border-black px-3 py-1 outline-none w-full h-32"><?= $previous_inputs['description'] ??  $product->description ?></textarea>
        <?php if (isset($previous_errors['description'])): ?>
            <p class="w-full text-red-900 text-xs">
                <?= $previous_errors['description'] ?>
            </p>
        <?php endif ?>
    </div>

    <div class="mt-8">
        <button type="submit" class="border py-1 px-2">
            Modifier le produit
        </button>
    </div>
</form>

<?php partial("footer_admin") ?>
