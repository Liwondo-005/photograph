<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/photograph');
}

if (!isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) !== 'index.php' && basename($_SERVER['PHP_SELF']) !== 'login.php' && basename($_SERVER['PHP_SELF']) !== 'register.php' && basename($_SERVER['PHP_SELF']) !== 'forgot_password.php' && basename($_SERVER['PHP_SELF']) !== 'reset_password.php') {
    header('Location: ' . BASE_URL . '/login.php');
    exit();
}

function require_login(): void
{
    if (empty($_SESSION['user_id'])) {
        header('Location: ' . BASE_URL . '/login.php');
        exit();
    }
}

function require_role(array $roles): void
{
    require_login();

    if (!in_array($_SESSION['role'] ?? '', $roles, true)) {
        $_SESSION['error'] = 'You do not have permission to access this page.';
        header('Location: ' . BASE_URL . '/login.php');
        exit();
    }
}
