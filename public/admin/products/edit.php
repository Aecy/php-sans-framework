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
        'category_id' => ['required'],
        'price' => ['required', 'price'],
    ]);

    $slug = slugify($_POST['slug']);
    $price_in_cents = (int) (string_to_float($_POST['price']) * 100);

    $query = pdo()->prepare("
        UPDATE products SET
            name = :name,
            slug = :slug,
            description = :description,
            category_id = :category_id,
            price_in_cents = :price_in_cents
        WHERE id = :id
    ");

    $query->execute([
        'name' => $_POST['name'],
        'slug' => $slug,
        'description' => $_POST['description'],
        'category_id' => $_POST['category_id'],
        'price_in_cents' => $price_in_cents,
        'id' => $product->id
    ]);

    flash_success("Le produit « {$product->name} » a bien été modifié.");
    redirect("/admin/products/edit.php?slug={$slug}");
}

?>

<?php partial("admin_header", ['title' => "Produits"]) ?>

<h1 class="text-xl mb-4">Modifier « <?= $product->name ?> »</h1>

<form method="post">

    <?php partial('admin_input', ['name' => 'name', 'label' => 'Nom', 'model' => $product]) ?>
    <?php partial('admin_input', ['name' => 'slug', 'label' => 'Nom simplifié (utilisé dans les liens)', 'model' => $product]) ?>
    <?php partial('admin_textarea', ['name' => 'description', 'label' => 'Description', 'model' => $product]) ?>
    <?php partial('admin_select', ['name' => 'category_id', 'label' => 'Catégorie', 'model' => $product, 'options' => $categories, 'option_key' => 'name']) ?>
    <?php partial('admin_input', ['name' => 'price', 'label' => 'Prix au gramme', 'model' => $product, 'model_value' => euros_to_string($product->price_in_cents / 100)]) ?>

    <div class="mt-8">
        <button type="submit" class="border py-1 px-2">
            Modifier le produit
        </button>
    </div>
</form>

<?php partial("admin_footer") ?>
