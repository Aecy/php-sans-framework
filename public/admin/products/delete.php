<?php

require_once __DIR__ . '/../../../bootstrap.php';
redirect_unless_admin();

import('products');

if (! is_post()) {
    abort_404();
}

$product = find_product($_GET['slug']);

$query = pdo()->prepare("DELETE FROM products WHERE id = ?");
$query->execute([$product->id]);

flash_success("Le produit « {$product->name} » a bien été supprimé.");
redirect('/admin/products/index.php');

?>
