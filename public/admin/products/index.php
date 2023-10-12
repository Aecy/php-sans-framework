<?php

require_once __DIR__ . '/../../../bootstrap.php';
redirect_unless_admin();

import('products');

$query = pdo()->query("SELECT * FROM products");
$query->execute();

$products = $query->fetchAll(PDO::FETCH_CLASS, Product::class);

?>

<?php partial("header_admin", ['title' => "Produits"]) ?>

<div class="flex items-baseline gap-4 mb-4">
    <h1 class="text-xl">Produits</h1>
    <a href="/admin/products/add.php" class="border px-2 py-1 uppercase text-xs">
        Créer un produit
    </a>
</div>

<?php foreach ($products as $product): ?>
    <div class="mb-4 border-b pb-4">
        <div>
            <h2 class="text-lg">
                <?= $product->name ?>
            </h2>
            <p class="text-gray-600 text-xs">
                <?= $product->description ?>
            </p>
        </div>
        <div class="flex gap-2 mt-4">
            <a href="/admin/products/edit.php?slug=<?= $product->slug ?>" class="border text-sm py-0.5 px-1 uppercase">
                Modifier
            </a>
            <form method="post" action="/admin/products/delete.php?slug=<?= $product->slug ?>">
                <button type="submit" class="border border-red-700 text-red-700 text-sm py-0.5 px-1 uppercase">Supprimer</button>
            </form>
        </div>
    </div>
<?php endforeach ?>

<?php partial("footer_admin") ?>
