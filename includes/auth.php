<?php
declare(strict_types=1);

require_once __DIR__ . '/helpers.php';

function is_admin_logged_in(): bool
{
    return isset($_SESSION['admin_user']) && is_array($_SESSION['admin_user']);
}

function admin_user(): array
{
    return is_admin_logged_in() ? $_SESSION['admin_user'] : [];
}

function login_admin(array $user): void
{
    $_SESSION['admin_user'] = [
        'id' => (int) ($user['id'] ?? 0),
        'username' => (string) ($user['username'] ?? ''),
        'full_name' => (string) ($user['full_name'] ?? ''),
    ];
}

function logout_admin(): void
{
    unset($_SESSION['admin_user']);
}

function require_admin_auth(): void
{
    if (!is_admin_logged_in()) {
        header('Location: ' . page_url('admin_login'));
        exit;
    }
}
