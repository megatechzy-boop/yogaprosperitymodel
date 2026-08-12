<?php
require_once __DIR__ . '/config.php';
$meta = $meta ?? page_meta();
$current = $current ?? '';
$canonical = SITE_URL . $meta['path'];
if (session_status() !== PHP_SESSION_ACTIVE && !headers_sent()) {
    header('Cache-Control: public, max-age=600, stale-while-revalidate=60');
}
$pageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    '@id' => $canonical . '#webpage',
    'url' => $canonical,
    'name' => $meta['title'],
    'description' => $meta['description'],
    'isPartOf' => ['@id' => SITE_URL . '/#website'],
    'about' => ['@id' => SITE_URL . '/#organization'],
    'inLanguage' => 'en-IN',
];
?>
<!doctype html>
<html lang="en-IN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Analytics loads after interaction so it does not delay the initial render. -->
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-RFQHCJCRZF');
    (function () {
      var loaded = false;
      function loadAnalytics() {
        if (loaded) return;
        loaded = true;
        var script = document.createElement('script');
        script.async = true;
        script.src = 'https://www.googletagmanager.com/gtag/js?id=G-RFQHCJCRZF';
        document.head.appendChild(script);
      }
      ['pointerdown', 'keydown', 'touchstart'].forEach(function (eventName) {
        window.addEventListener(eventName, loadAnalytics, {once: true, passive: true});
      });
      window.setTimeout(loadAnalytics, 15000);
    }());
  </script>
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
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="<?= e($meta['image_alt'] ?? 'Yoga Prosperity Model') ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($meta['title']) ?>">
  <meta name="twitter:description" content="<?= e($meta['description']) ?>">
  <meta name="twitter:image" content="<?= SITE_URL . e($meta['image']) ?>">
  <meta name="theme-color" content="#171b18">
  <meta name="author" content="Prabhu Zunja">
  <link rel="icon" type="image/png" sizes="512x512" href="<?= e(asset_url('images/ypm-logo-2026.png')) ?>">
  <link rel="shortcut icon" type="image/png" href="<?= e(asset_url('images/ypm-logo-2026.png')) ?>">
  <link rel="apple-touch-icon" href="<?= e(asset_url('images/ypm-logo-2026.png')) ?>">
  <link rel="preload" href="<?= e(asset_url('fonts/inter-latin.woff2')) ?>" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= e(asset_url('fonts/fraunces-latin-normal.woff2')) ?>" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= e(asset_url('fonts/fraunces-latin-italic.woff2')) ?>" as="font" type="font/woff2" crossorigin>
  <?php if ($current === 'home'): ?>
  <link rel="preload" as="image" href="<?= e(asset_url('images/hero-live-strategy-workshop-v1-768.webp')) ?>" imagesrcset="<?= e(responsive_srcset('hero-live-strategy-workshop-v1.jpg')) ?>" imagesizes="(max-width: 768px) 100vw, 768px" fetchpriority="high">
  <?php endif; ?>
  <?php
    $stylesheet = (string) file_get_contents(__DIR__ . '/../assets/css/style.css');
    $stylesheet = str_replace('../fonts/', asset_url('fonts/'), $stylesheet);
  ?>
  <style><?= $stylesheet ?></style>
  <?php foreach (array_merge([base_schema()], $current === 'home' ? [] : [$pageSchema], $structuredData ?? []) as $schema): ?>
  <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
  <?php endforeach; ?>
</head>
<body>
  <a class="skip-link" href="#main-content">Skip to content</a>
  <div class="top-note"><span>For yoga teachers ready to build a purposeful, prosperous practice</span><a href="<?= e(APPOINTMENT_URL) ?>" target="_blank" rel="noopener noreferrer">Book a clarity conversation ↗</a></div>
  <header class="site-header">
    <a class="brand" href="<?= e(site_path()) ?>" aria-label="Yoga Prosperity Model home">
      <img class="brand-logo" src="<?= e(asset_url('images/ypm-logo-96.webp')) ?>" alt="" width="96" height="96">
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
    <a class="header-cta" href="<?= e(APPOINTMENT_URL) ?>" target="_blank" rel="noopener noreferrer">Book a call <span>↗</span></a>
  </header>
  <main id="main-content">
