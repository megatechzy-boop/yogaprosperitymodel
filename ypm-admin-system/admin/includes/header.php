<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= isset($page_title) ? htmlspecialchars($page_title) . ' — ' : '' ?>Admin — Yoga Prosperity Model</title>
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="<?= SITE_URL ?>/admin/assets/admin.css">
</head>
<body>
<div class="admin-shell">
  <aside class="admin-sidebar">
    <div class="admin-brand">Yoga Prosperity <span>Admin</span></div>
    <nav>
      <a href="<?= SITE_URL ?>/admin/index.php" class="<?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>">Dashboard</a>
      <a href="<?= SITE_URL ?>/admin/leads.php" class="<?= ($active ?? '') === 'leads' ? 'active' : '' ?>">Leads / Submissions</a>
      <a href="<?= SITE_URL ?>/admin/pages.php" class="<?= ($active ?? '') === 'pages' ? 'active' : '' ?>">Landing Pages</a>
      <a href="<?= SITE_URL ?>/admin/settings.php" class="<?= ($active ?? '') === 'settings' ? 'active' : '' ?>">Settings</a>
    </nav>
    <div class="admin-sidebar-footer">
      <span>Logged in as <?= htmlspecialchars(current_admin_username()) ?></span>
      <a href="<?= SITE_URL ?>/admin/logout.php">Log out</a>
    </div>
  </aside>
  <main class="admin-main">
