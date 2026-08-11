<?php
$meta = page_meta(['title' => $program['name'] . ' | Yoga Prosperity Model', 'description' => $program['description'], 'path' => '/programs/' . $program['slug'] . '/']);
$current = 'programs';
$numericPrice = preg_replace('/[^0-9]/', '', $program['price']);
$faqEntities = array_map(static fn(array $faq): array => [
    '@type' => 'Question',
    'name' => $faq[0],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq[1]],
], $program['faqs']);
$structuredData = [
    breadcrumb_schema([['Home', '/'], ['Programs', '/programs/'], [$program['name'], '/programs/' . $program['slug'] . '/']]),
    [
        '@context' => 'https://schema.org', '@type' => 'Course',
        'name' => $program['name'], 'description' => $program['description'],
        'url' => SITE_URL . '/programs/' . $program['slug'] . '/',
        'provider' => ['@id' => SITE_URL . '/#organization'],
        'audience' => ['@type' => 'Audience', 'audienceType' => 'Yoga teachers'],
        'educationalLevel' => $program['slug'] === 'rajat-sangh' ? 'Foundation' : 'Advanced mentorship',
        'hasCourseInstance' => ['@type' => 'CourseInstance', 'courseMode' => 'Online', 'courseWorkload' => 'Flexible, self-paced learning with guided support'],
        'offers' => ['@type' => 'Offer', 'price' => $numericPrice, 'priceCurrency' => 'INR', 'availability' => 'https://schema.org/InStock', 'url' => SITE_URL . '/contact/?program=' . rawurlencode($program['name'])],
    ],
    ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $faqEntities],
];
require __DIR__ . '/header.php';
?>
<section class="page-hero page-hero-visual"><div><p class="breadcrumbs"><a href="<?= e(site_path()) ?>">Home</a> / <a href="<?= e(site_path('programs')) ?>">Programs</a> / <?= e($program['name']) ?></p><h1><?= e($program['name']) ?><br><em><?= e($program['level']) ?></em></h1></div><p><?= e($program['description']) ?></p><div class="page-hero-image <?= e($program['image_focus'] ?? '') ?>"><img src="<?= e(asset_url('images/' . $program['image'])) ?>" srcset="<?= e(responsive_srcset($program['image'])) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="<?= e($program['image_alt']) ?>" width="1536" height="1024" fetchpriority="high" decoding="async"><span><?= e($program['image_label']) ?></span></div></section>
<section class="content-section"><div class="prose"><p class="eyebrow">Program overview</p><h2><?= e($program['price']) ?> <small>/ year</small></h2><p class="resource-intro"><?= e($program['intro']) ?></p><div class="answer-box"><strong>Who this is for</strong><p><?= e($program['audience']) ?></p></div><h2>What you will work toward</h2><ul class="checklist"><?php foreach ($program['outcomes'] as $outcome): ?><li><?= e($outcome) ?></li><?php endforeach; ?></ul><h2>How the program works</h2><div class="feature-list"><?php foreach ($program['features'] as $feature): ?><article><h3><?= e($feature[0]) ?></h3><p><?= e($feature[1]) ?></p></article><?php endforeach; ?></div><h2>Delivery at a glance</h2><div class="program-facts"><?php foreach ($program['delivery'] as $fact): ?><div><strong><?= e($fact[0]) ?></strong><p><?= e($fact[1]) ?></p></div><?php endforeach; ?></div><div class="notice">Online payment is not active in this website phase. Current schedule, access details and policies are confirmed before enrolment.</div><a class="button primary" href="<?= e(site_path('contact')) ?>?program=<?= urlencode($program['name']) ?>">Enquire about <?= e($program['name']) ?> <span>↗</span></a></div></section>
<section class="faq section program-faq"><div><p class="eyebrow">Questions, answered</p><h2><?= e($program['name']) ?><br><em>FAQs.</em></h2><p class="faq-intro">Clear answers about the audience, format and enrolment.</p></div><div class="accordions"><?php foreach ($program['faqs'] as $index => $faq): ?><details <?= $index === 0 ? 'open' : '' ?>><summary><?= e($faq[0]) ?><span>+</span></summary><p><?= e($faq[1]) ?></p></details><?php endforeach; ?></div></section>
<?php require __DIR__ . '/footer.php'; ?>
