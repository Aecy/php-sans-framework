<?php

class Product
{

    public $id;
    public $name;
    public $slug;
    public $description;
    public $category_id;
    public $price_in_cents;
    public $main_image_id;

}

function find_product(string $slug): Product
{
    return find_or_fail_by_key(
        'products',
        Product::class,
        'slug',
        $slug
    );
}
