<?php
require_once __DIR__ . '/config.php';
$meta = $meta ?? page_meta();
$current = $current ?? '';
$canonical = SITE_URL . $meta['path'];
?>
<!doctype html>
<html lang="en-IN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="<?= e(site_path()) ?>">
  <title><?= e($meta['title']) ?></title>
  <meta name="description" content="<?= e($meta['description']) ?>">
  <meta name="robots" content="<?= e($meta['robots']) ?>">
  <link rel="canonical" href="<?= e($canonical) ?>">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_IN">
  <meta property="og:site_name" content="<?= SITE_NAME ?>">
  <meta property="og:title" content="<?= e($meta['title']) ?>">
  <meta property="og:description" content="<?= e($meta['description']) ?>">
  <meta property="og:url" content="<?= e($canonical) ?>">
  <meta property="og:image" content="<?= SITE_URL . e($meta['image']) ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="theme-color" content="#09061c">
  <meta name="author" content="Prabhu Zunja">
  <link rel="icon" type="image/png" sizes="512x512" href="<?= e(asset_url('images/yoga-prosperity-model-logo.png')) ?>">
  <link rel="apple-touch-icon" href="<?= e(asset_url('images/yoga-prosperity-model-logo.png')) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= e(asset_url('css/style.css')) ?>?v=1.0.1">
  <?php foreach (array_merge([base_schema()], $structuredData ?? []) as $schema): ?>
  <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
  <?php endforeach; ?>
</head>
<body>
  <a class="skip-link" href="#main-content">Skip to content</a>
  <div class="top-note"><span>For yoga teachers ready to build a purposeful, prosperous practice</span><a href="/contact.php">Book a clarity conversation ↗</a></div>
  <header class="site-header">
    <a class="brand" href="<?= e(site_path()) ?>" aria-label="Yoga Prosperity Model home">
      <img class="brand-logo" src="<?= e(asset_url('images/yoga-prosperity-model-logo.png')) ?>" alt="" width="512" height="512">
      <span>Yoga <b>Prosperity Model</b></span>
    </a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-nav"><span></span><span></span><span></span><b>Menu</b></button>
    <nav id="primary-nav" aria-label="Main navigation">
      <a class="<?= $current === 'home' ? 'active' : '' ?>" href="<?= e(site_path()) ?>">Home</a>
      <a class="<?= $current === 'method' ? 'active' : '' ?>" href="<?= e(site_path('yoga-prosperity-method')) ?>">Our Method</a>
      <a class="<?= $current === 'programs' ? 'active' : '' ?>" href="<?= e(site_path('programs')) ?>">Programs</a>
      <a class="<?= $current === 'about' ? 'active' : '' ?>" href="<?= e(site_path('about')) ?>">About</a>
      <a class="<?= $current === 'blog' ? 'active' : '' ?>" href="<?= e(site_path('resources')) ?>">Resources</a>
    </nav>
    <a class="header-cta" href="/contact.php">Get in touch <span>↗</span></a>
  </header>
  <main id="main-content">
