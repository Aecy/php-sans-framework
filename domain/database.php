<?php

function pdo(): PDO
{
    static $pdo;

    if ($pdo) {
        return $pdo;
    }

    $pdo = new PDO("mysql:host=localhost;dbname=phpsansframework", 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

function find_or_fail_by_key(string $table, $class, string $key_name, string $key_value)
{
    $query = pdo()->prepare("SELECT * FROM $table WHERE $key_name = ?");
    $query->setFetchMode(PDO::FETCH_CLASS, $class);
    $query->execute([$key_value]);

    return $query->fetch() ?? null;
}
