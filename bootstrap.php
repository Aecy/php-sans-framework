<?php

ini_set('display_errors', 1);
set_error_handler(function ($severity, $message, $file, $line) {
    throw new \ErrorException($message, $severity, $file, $line);
});

session_start();

if (is_post()) {
    $previous_errors = [];
    $previous_inputs = [];
} else {
    $previous_errors = $_SESSION['previous_errors'] ?? [];
    $previous_inputs = $_SESSION['previous_inputs'] ?? [];
    $_SESSION['previous_errors'] = [];
    $_SESSION['previous_inputs'] = [];
}

function partial(string $name, array $params = []): void
{
	extract($params);

	require __DIR__ . DIRECTORY_SEPARATOR . "html_partials" . DIRECTORY_SEPARATOR . "{$name}.html.php";
}

function is_post(): bool
{
	return ($_SERVER['REQUEST_METHOD'] ?? 'CLI') === 'POST';
}

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

function redirect_self(): void
{
    redirect($_SERVER['REQUEST_URI']);
}

function abort_404(): void
{
    http_response_code(404);
    header("HTTP/1.1 404 Not Found");

    die();
}

function is_on_page($page): bool
{
    return $_SERVER['SCRIPT_NAME'] === $page;
}

function is_on_directory($directory): bool
{
    return strpos($_SERVER['SCRIPT_NAME'], $directory) === 0;
}

function import(string $domain): void
{
    require_once __DIR__ . "/domain/$domain.php";
}

function save_inputs(): void
{
    foreach ($_POST as $key => $value) {
        if (in_array($key, ['password'])) {
            continue;
        }
        $_SESSION['previous_inputs'][$key] = $value;
    }
}

import('validation');
import('flash');
