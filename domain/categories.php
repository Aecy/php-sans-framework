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
    return find_or_fail_by_key('categories', Category::class, 'id', $id) ?? abort_404();
}
