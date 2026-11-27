<?php
http_response_code(429);

require_once __DIR__ . '/includes/config.php';

$meta = page_meta([
    'title' => 'Too Many Requests | Yoga Prosperity Model',
    'description' => 'Too many requests were made in a short period. Please try again later.',
    'path' => '/429',
    'robots' => 'noindex, nofollow'
]);

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div>
        <p class="eyebrow">429 error</p>
        <h1>Please take a<br><em>moment.</em></h1>
    </div>

    <p>
        Too many requests were made in a short period.
        Please wait a moment and try again.
    </p>
</section>

<section class="content-section">
    <a class="button primary" href="<?= e(site_path()) ?>">
        Return home <span>→</span>
    </a>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>