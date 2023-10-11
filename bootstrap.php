<?php

ini_set('display_errors', 1);
session_start();

function partial(string $name, array $params = []): void
{
	extract($params);

	require __DIR__ . DIRECTORY_SEPARATOR . "html_partials" . DIRECTORY_SEPARATOR . "{$name}.html.php";
}

function is_post(): bool
{
	return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function pdo(): PDO
{
	$pdo = new PDO("mysql:host=localhost;dbname=phpsansframework", 'root', 'root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $pdo;
}

function redirect(string $url)
{
    header("Location: $url");
    die();
}

function redirect_unless_admin(): void
{
    if (!($_SESSION['admin'] ?? false)) {
        redirect('/admin/login.php');
    }
}

function abort_404(): void
{
    http_response_code(404);
    header("HTTP/1.1 404 Not Found");

    die();
}
