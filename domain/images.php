<?php

class Image
{
    public $id;
    public $filename;
}

function find_image(int $id): Image
{
    $query = pdo()->prepare("SELECT * FROM images WHERE id = ?");
    $query->execute([$id]);
    $query->setFetchMode(PDO::FETCH_CLASS, Image::class);

    return $query->fetch() ?? abort_404();
}
