<?php
$meta = page_meta(['title' => $program['name'] . ' | Yoga Prosperity Model', 'description' => $program['description'], 'path' => '/programs/' . $program['slug'] . '/']);
$current = 'programs';
$numericPrice = preg_replace('/[^0-9]/', '', $program['price']);
$structuredData = [
    breadcrumb_schema([['Home', '/'], ['Programs', '/programs/'], [$program['name'], '/programs/' . $program['slug'] . '/']]),
    [
        '@context' => 'https://schema.org', '@type' => 'Course',
        'name' => $program['name'], 'description' => $program['description'],
        'url' => SITE_URL . '/programs/' . $program['slug'] . '/',
        'provider' => ['@id' => SITE_URL . '/#organization'],
        'offers' => ['@type' => 'Offer', 'price' => $numericPrice, 'priceCurrency' => 'INR', 'availability' => 'https://schema.org/InStock', 'url' => SITE_URL . '/contact/?program=' . rawurlencode($program['name'])],
    ],
];
require __DIR__ . '/header.php';
?>
<section class="page-hero"><div><p class="breadcrumbs"><a href="/">Home</a> / <a href="/programs.php">Programs</a> / <?= e($program['name']) ?></p><h1><?= e($program['name']) ?><br><em><?= e($program['level']) ?></em></h1></div><p><?= e($program['description']) ?></p></section>
<section class="content-section"><div class="prose"><p class="eyebrow">Program overview</p><h2><?= e($program['price']) ?> <small>/ year</small></h2><p><?= e($program['intro']) ?></p><div class="feature-list"><?php foreach ($program['features'] as $feature): ?><article><h3><?= e($feature[0]) ?></h3><p><?= e($feature[1]) ?></p></article><?php endforeach; ?></div><div class="notice">Online payment is not active in this first website phase. Contact the team to discuss enrolment.</div><a class="button primary" href="/contact.php?program=<?= urlencode($program['name']) ?>">Enquire about <?= e($program['name']) ?> <span>↗</span></a></div></section>
<?php require __DIR__ . '/footer.php'; ?>
