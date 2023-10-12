<?php

require_once __DIR__ . '/../../../bootstrap.php';
redirect_unless_admin();

import('products');
import('categories');

$product = find_product($_GET['slug']);
$categories = get_all_categories();

if (is_post()) {
    validate([
        'name' => ['required'],
        'slug' => ['required'],
        'description' => ['required'],
        'category_id' => ['required']
    ]);

    $slug = slugify($_POST['slug']);

    $query = pdo()->prepare("UPDATE products SET name = ?, slug = ?, description = ?, category_id = ? WHERE id = ?");
    $query->execute([
        $_POST['name'],
        $slug,
        $_POST['description'],
        $_POST['category_id'],
        $product->id
    ]);

    flash_success("Le produit « {$product->name} » a bien été modifié.");
    redirect_self();
}

?>

<?php partial("header_admin", ['title' => "Produits"]) ?>

<h1 class="text-xl mb-4">Modifier « <?= $product->name ?> »</h1>

<form method="post">

    <?php partial('admin_input', ['name' => 'name', 'label' => 'Nom', 'model' => $product]) ?>
    <?php partial('admin_input', ['name' => 'slug', 'label' => 'Nom simplifié (utilisé dans les liens)', 'model' => $product]) ?>
    <?php partial('admin_textarea', ['name' => 'description', 'label' => 'Description', 'model' => $product]) ?>
    <?php partial('admin_select', ['name' => 'category_id', 'label' => 'Catégorie', 'model' => $product, 'options' => $categories, 'option_key' => 'name']) ?>

    <div class="mt-8">
        <button type="submit" class="border py-1 px-2">
            Modifier le produit
        </button>
    </div>
</form>

<?php partial("footer_admin") ?>
