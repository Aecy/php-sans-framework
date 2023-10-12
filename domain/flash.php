<?php

function flash_success($message): void
{
    flash('success', $message);
}

function flash($type, $message): void
{
    $_SESSION['flash'] = compact('type', 'message');
}

function get_flash()
{
    $flash = $_SESSION['flash'] ?? null;
    $_SESSION['flash'] = null;

    return $flash;
}
