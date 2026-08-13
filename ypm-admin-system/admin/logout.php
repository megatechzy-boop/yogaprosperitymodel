<?php
require_once __DIR__ . '/includes/db.php';
session_unset();
session_destroy();
header('Location: ' . SITE_URL . '/admin/login.php');
exit;
