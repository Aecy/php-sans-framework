<?php

class Image
{
    public $id;
    public $filename;
}

function find_image(int $id): Image
{
    return find_or_fail_by_key('images', Image::class, 'id', $id) ?? abort_404();
}

function find_image_by_filename(string $filename): Image
{
    return find_or_fail_by_key('images', Image::class, 'filename', $filename);
}
