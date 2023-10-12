<?php

class Product
{

    public $id;
    public $name;
    public $slug;
    public $description;
    public $category_id;

}

function find_product(string $slug): Product
{
    $query = pdo()->prepare("SELECT * FROM products WHERE slug = ?");
    $query->execute([$slug]);
    $query->setFetchMode(PDO::FETCH_CLASS, Product::class);

    return $query->fetch() ?? abort_404();
}
