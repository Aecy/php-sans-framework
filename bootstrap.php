<?php

define('START_MICROTIME', microtime(true));

ini_set('display_errors', 1);

session_start();

register_shutdown_function(function () {
    $time = round((microtime(true) - START_MICROTIME) * 1000, 3);
    file_put_contents("php://stderr", "Execution page time {$time}ms\n");
});

function partial(string $__name, array $params = [])
{
    extract($params);

    require(__DIR__ . "/html_partials/{$__name}.html.php");
}

function is_post(): bool
{
    return ($_SERVER['REQUEST_METHOD'] ?? 'CLI') === 'POST';
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

        $_SESSION['previous_inputs'] = $_SESSION['previous_inputs'] ?? [];
        $_SESSION['previous_inputs'][$key] = $value;
    }
}

function get_previous_inputs()
{
    static $previous_inputs;
    if ($previous_inputs) {
        return $previous_inputs;
    }

    $previous_inputs = $_SESSION['previous_inputs'] ?? [];
    $_SESSION['previous_inputs'] = [];

    return $previous_inputs;
}

function get_previous_input(string $key)
{
    return get_previous_inputs()[$key] ?? null;
}

function slugify(string $text)
{
    if (extension_loaded('intl')) {
        $text = transliterator_transliterate('Any-Latin; Latin-ASCII', $text);
    }

    $text = preg_replace('/[^a-zA-Z0-9]+/', '-', $text);
    $text = trim($text, '-');

    return strtolower($text);
}

import('validation');
import('flash');
import('database');
