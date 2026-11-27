<?php
http_response_code(405);

require_once __DIR__ . '/includes/config.php';

$meta = page_meta([
    'title' => 'Method Not Allowed | Yoga Prosperity Model',
    'description' => 'The requested action is not supported for this resource.',
    'path' => '/405',
    'robots' => 'noindex, nofollow'
]);

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div>
        <p class="eyebrow">405 error</p>
        <h1>That action<br><em>isn't supported.</em></h1>
    </div>

    <p>
        The requested action cannot be completed for this page.
        Please return home and continue exploring.
    </p>
</section>

<section class="content-section">
    <a class="button primary" href="<?= e(site_path()) ?>">
        Return home <span>→</span>
    </a>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>