<?php
$meta = page_meta(['title' => $legal['title'] . ' | Yoga Prosperity Model', 'description' => $legal['description'], 'path' => $legal['path']]);
$structuredData = [breadcrumb_schema([['Home', '/'], [$legal['title'], $legal['path']]])];
require __DIR__ . '/header.php';
?>
<section class="page-hero"><div><p class="breadcrumbs"><a href="/">Home</a> / <?= e($legal['title']) ?></p><h1><?= e($legal['title']) ?></h1></div><p><?= e($legal['description']) ?></p></section>
<section class="content-section"><div class="legal"><p><strong>Last updated:</strong> 17 July 2026</p><?php foreach ($legal['sections'] as $section): ?><h2><?= e($section[0]) ?></h2><?php foreach ($section[1] as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?><?php endforeach; ?><div class="notice">This working policy copy should be reviewed by your legal or accounting adviser before payments are activated.</div></div></section>
<?php require __DIR__ . '/footer.php'; ?>
