<?php
require_once __DIR__ . '/admin/includes/db.php';
require_once __DIR__ . '/admin/includes/themes.php';

$slug = trim($_GET['slug'] ?? '');
if ($slug === '') {
    http_response_code(404);
    die('Page not found.');
}

$pdo = db_connect();
$stmt = $pdo->prepare("SELECT * FROM landing_pages WHERE slug = ?");
$stmt->execute([$slug]);
$page = $stmt->fetch();

if (!$page || $page['status'] !== 'published') {
    http_response_code(404);
    die('This page is not available.');
}

$highlights = array_filter(array_map('trim', explode("\n", $page['highlights'] ?? '')));
$successMsg = isset($_GET['registered']) ? true : false;

$themes = ypm_themes();
$themeKey = $page['theme'] ?? 'classic';
if (!isset($themes[$themeKey])) { $themeKey = 'classic'; }
$themeCss = ypm_theme_css($themes[$themeKey]['vars']);

$allowedLayouts = ['classic', 'split-hero', 'long-form', 'minimal', 'video-first', 'countdown-urgency'];
$layout = $page['layout'] ?? 'classic';
if (!in_array($layout, $allowedLayouts, true)) {
    $layout = 'classic';
}

include __DIR__ . '/templates/' . $layout . '.php';
