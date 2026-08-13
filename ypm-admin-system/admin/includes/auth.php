<?php
require_once __DIR__ . '/db.php';

function require_login() {
    if (empty($_SESSION['admin_id'])) {
        header('Location: ' . SITE_URL . '/admin/login.php');
        exit;
    }
}

function current_admin_username() {
    return $_SESSION['admin_username'] ?? '';
}
