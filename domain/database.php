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

