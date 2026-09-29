<?php
session_start();

if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'photography_management_system');
    define('BASE_URL', '/photograph');
}

require_once __DIR__ . '/../classses/Database.php';

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') . '">';
}

function verify_csrf(): bool
{
    return isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token']);
}

function sanitize_input($value): string
{
    return trim(htmlspecialchars(strip_tags($value), ENT_QUOTES, 'UTF-8'));
}

function redirect($path): void
{
    header('Location: ' . BASE_URL . $path);
    exit();
}

function require_login(): void
{
    if (empty($_SESSION['user_id'])) {
        redirect('/login.php');
    }
}

function require_role(array $roles): void
{
    require_login();

    if (!in_array($_SESSION['role'] ?? '', $roles, true)) {
        $_SESSION['error'] = 'You do not have permission to access this page.';
        redirect('/login.php');
    }
}
