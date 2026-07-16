<?php
http_response_code(404);
require_once __DIR__ . '/includes/config.php';
$meta = page_meta(['title' => 'Page Not Found | Yoga Prosperity Model', 'description' => 'The requested page could not be found.', 'path' => '/404', 'robots' => 'noindex, follow']);
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div><p class="eyebrow">404 error</p><h1>Let’s find the<br><em>right path.</em></h1></div><p>The page you requested is unavailable. Return home or explore our programs.</p></section><section class="content-section"><a class="button primary" href="/">Return home <span>→</span></a></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
