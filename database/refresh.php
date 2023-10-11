<?php

require_once __DIR__ . '/../bootstrap.php';

$pdo = pdo();

$pdo->exec("DROP DATABASE phpsansframework");
$pdo->exec("CREATE DATABASE phpsansframework");
$pdo->exec("USE phpsansframework");

$pdo->exec("CREATE TABLE admins (
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    password VARCHAR(255),
    
    PRIMARY KEY (id),
    CONSTRAINT uc_admins UNIQUE (name)
)");