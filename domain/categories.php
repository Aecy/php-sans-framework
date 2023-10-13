<?php

class Category
{
    public $id;
    public $slug;
    public $name;
}

/** @return Category[] */
function get_all_categories(): array
{
    $query = pdo()->query("SELECT * FROM categories");
    return $query->fetchAll(PDO::FETCH_CLASS, Category::class);
}

function find_category(int $id): Category
{
    $query = pdo()->prepare("SELECT * FROM categories WHERE id = ?");
    $query->execute([$id]);
    $query->setFetchMode(PDO::FETCH_CLASS, Category::class);

    return $query->fetch() ?? abort_404();

}
