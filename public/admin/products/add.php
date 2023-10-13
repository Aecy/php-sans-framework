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
        'price' => ['required', 'price'],
        'main_image' => ['required', 'image'],
    ]);

    $hash = md5_file($_FILES['main_image']['tmp_name']);
    $extension = pathinfo($_FILES['main_image']['name'], PATHINFO_EXTENSION);

    $filename = sprintf("%s.%s", $hash, $extension);

    move_uploaded_file($_FILES['main_image']['tmp_name'], PROJECT_ROOT . "/public/images/uploaded/{$filename}");

    $query = pdo()->prepare("INSERT INTO images (filename) VALUES (?)");
    $query->execute([$filename]);

    $main_image_id = pdo()->lastInsertId();

    $slug = slugify($_POST['name']);
    $price_in_cents = (int) (string_to_float($_POST['price']) * 100);

    $query = pdo()->prepare("INSERT INTO products (name, slug, description, category_id, price_in_cents, main_image_id) VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute([
        $_POST['name'],
        $slug,
        $_POST['description'],
        $_POST['category_id'],
        $price_in_cents,
        $main_image_id
    ]);

    flash_success("Le produit « {$_POST['name']} » a bien été supprimé.");
    redirect('/admin/products/index.php');
}

?>

<?php partial("admin_header", ['title' => "Produits"]) ?>

<section>
    <h1 class="text-xl mb-4">Ajouter un produit</h1>

    <form method="post" enctype="multipart/form-data">

        <?php partial('admin_input', ['name' => 'name', 'label' => 'Nom']) ?>
        <?php partial('admin_textarea', ['name' => 'description', 'label' => 'Description']) ?>
        <?php partial('admin_select', ['name' => 'category_id', 'label' => 'Catégorie', 'options' => $categories, 'option_key' => 'name']) ?>
        <?php partial('admin_input', ['name' => 'price', 'label' => 'Prix au gramme']) ?>
        <?php partial('admin_file', ['name' => 'main_image', 'label' => 'Image principale']) ?>

        <div class="mt-8">
            <button type="submit" class="border py-1 px-2">
                Créer le produit
            </button>
        </div>
    </form>
</section>

<?php partial("admin_footer") ?>
