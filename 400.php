<?php
http_response_code(400);

require_once __DIR__ . '/includes/config.php';

$meta = page_meta([
    'title' => 'Bad Request | Yoga Prosperity Model',
    'description' => 'The request could not be understood or processed.',
    'path' => '/400',
    'robots' => 'noindex, nofollow'
]);

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div>
        <p class="eyebrow">400 error</p>
        <h1>Something went<br><em>wrong.</em></h1>
    </div>

    <p>
        The request could not be processed. Please check the URL
        and try again.
    </p>
</section>

<section class="content-section">
    <a class="button primary" href="<?= e(site_path()) ?>">
        Return home <span>→</span>
    </a>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>