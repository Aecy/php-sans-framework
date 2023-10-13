<?php

require_once __DIR__ . '/../bootstrap.php';

$pdo = pdo();

/**
 * Refresh database.
 */

$pdo->exec("DROP DATABASE phpsansframework");
$pdo->exec("CREATE DATABASE phpsansframework");
$pdo->exec("USE phpsansframework");

/**
 * Admins
 */

$pdo->exec("CREATE TABLE admins (
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,

    PRIMARY KEY (id),
    CONSTRAINT uc_admins UNIQUE (name)
)");

/**
 * Images
 */

$pdo->exec("CREATE TABLE images (
    id INTEGER NOT NULL AUTO_INCREMENT,
    filename VARCHAR(255) NOT NULL,

    PRIMARY KEY (id)
)");

/**
 * Categories
 */

$pdo->exec("CREATE TABLE categories  (
    id INTEGER NOT NULL AUTO_INCREMENT,
    slug VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,

    PRIMARY KEY (id),
    CONSTRAINT uc_categories UNIQUE (slug)
)");

$pdo->exec("INSERT INTO categories (slug, name) VALUES ('fleurs-cbd', 'Fleurs CBD')");
$pdo->exec("INSERT INTO categories (slug, name) VALUES ('resines-cbd', 'Résines CBD')");
$pdo->exec("INSERT INTO categories (slug, name) VALUES ('huiles-cbd', 'Huiles CBD')");
$pdo->exec("INSERT INTO categories (slug, name) VALUES ('accessoires', 'Accessoires')");

/**
 * Products
 */

$pdo->exec("CREATE TABLE products (
    id INTEGER NOT NULL AUTO_INCREMENT,
    category_id INTEGER NOT NULL,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price_in_cents INTEGER NOT NULL,
    main_image_id INTEGER NOT NULL REFERENCES images(id),

    PRIMARY KEY (id),
    CONSTRAINT fk_category_products FOREIGN KEY (category_id) REFERENCES categories(id),
    CONSTRAINT uc_products UNIQUE (slug)
)");

