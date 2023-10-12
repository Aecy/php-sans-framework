<?php

require_once __DIR__ . '/../../../bootstrap.php';
redirect_unless_admin();

import('categories');
import('products');

$categories = get_all_categories();

if (is_post()) {
    validate([
        'name' => ['required'],
        'description' => ['required'],
        'category_id' => ['required'],
    ]);

    $slug = slugify($_POST['name']);

    $query = pdo()->prepare("INSERT INTO products (name, slug, description, category_id) VALUES (?, ?, ?, ?)");
    $query->execute([
        $_POST['name'],
        $slug,
        $_POST['description'],
        $_POST['category_id']
    ]);

    flash_success("Le produit « {$_POST['name']} » a bien été supprimé.");
    redirect('/admin/products/index.php');
}

?>

<?php partial("header_admin", ['title' => "Produits"]) ?>

<h1 class="text-xl mb-4">Ajouter un produit</h1>

<form method="post">

    <?php partial('admin_input', ['name' => 'name', 'type' => 'text', 'label' => 'Nom']) ?>
    <?php partial('admin_textarea', ['name' => 'description', 'label' => 'Description']) ?>
    <?php partial('admin_select', ['name' => 'category_id', 'label' => 'Catégorie', 'options' => $categories, 'option_key' => 'name']) ?>

    <div class="mt-8">
        <button type="submit" class="border py-1 px-2">
            Créer le produit
        </button>
    </div>
</form>

<?php partial("footer_admin") ?>
