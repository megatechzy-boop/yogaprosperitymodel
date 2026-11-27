<?php
http_response_code(500);

require_once __DIR__ . '/includes/config.php';

$meta = page_meta([
    'title' => 'Server Error | Yoga Prosperity Model',
    'description' => 'Something went wrong on our server. Please try again shortly.',
    'path' => '/500',
    'robots' => 'noindex, nofollow'
]);

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div>
        <p class="eyebrow">500 error</p>
        <h1>A temporary<br><em>pause.</em></h1>
    </div>

    <p>
        Something went wrong while processing your request.
        Please try again in a moment.
    </p>
</section>

<section class="content-section">
    <a class="button primary" href="<?= e(site_path()) ?>">
        Return home <span>→</span>
    </a>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>