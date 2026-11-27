<?php
http_response_code(403);

require_once __DIR__ . '/includes/config.php';

$meta = page_meta([
    'title' => 'Access Denied | Yoga Prosperity Model',
    'description' => 'You do not have permission to access this page.',
    'path' => '/403',
    'robots' => 'noindex, nofollow'
]);

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div>
        <p class="eyebrow">403 error</p>
        <h1>This path is<br><em>restricted.</em></h1>
    </div>

    <p>
        You don't have permission to access this page.
        Please return home and continue exploring Yoga Prosperity Model.
    </p>
</section>

<section class="content-section">
    <a class="button primary" href="<?= e(site_path()) ?>">
        Return home <span>→</span>
    </a>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>