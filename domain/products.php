<?php

class Product
{

    public $id;
    public $name;
    public $description;

}

function find_product(int $id): Product
{
    $query = pdo()->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([$id]);
    $query->setFetchMode(PDO::FETCH_CLASS, Product::class);

    return $query->fetch() ?? abort_404();
}
