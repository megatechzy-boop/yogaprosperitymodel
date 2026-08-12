<?php
declare(strict_types=1);

function ensure_session(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    session_set_cookie_params([
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    ]);
    session_start();
}

const SITE_NAME = 'Yoga Prosperity Model';
const SITE_ORIGIN = 'https://yogaprosperitymodel.com';

function detect_site_base_path(): string
{
    $documentRoot = realpath((string) ($_SERVER['DOCUMENT_ROOT'] ?? ''));
    $projectRoot = realpath(dirname(__DIR__));

    if ($documentRoot !== false && $projectRoot !== false) {
        $documentRoot = rtrim(str_replace('\\', '/', $documentRoot), '/');
        $projectRoot = rtrim(str_replace('\\', '/', $projectRoot), '/');
        $documentPrefix = $documentRoot . '/';

        if (strcasecmp($projectRoot, $documentRoot) === 0) {
            return '';
        }

        if (stripos($projectRoot, $documentPrefix) === 0) {
            return '/' . trim(substr($projectRoot, strlen($documentRoot)), '/');
        }
    }

    return preg_match('#^/yogaprosperitymodel(?:/|$)#', (string) ($_SERVER['SCRIPT_NAME'] ?? ''))
        ? '/yogaprosperitymodel'
        : '';
}

define('SITE_BASE_PATH', detect_site_base_path());
define('SITE_URL', SITE_ORIGIN);
const SUPPORT_EMAIL = 'support@yogaprosperitymodel.com';
const SUPPORT_PHONE = '+91 77568 57108';
const YOUTUBE_URL = 'https://www.youtube.com/@YogaProsperityModel';
const INSTAGRAM_URL = 'https://www.instagram.com/prabhuzunja/';
const THREADS_URL = 'https://www.threads.com/@prabhuzunja';
const PAID_GUIDANCE_URL = 'https://rzp.io/rzp/RJNjp4uX';

function redirect_legacy_php_request(): void
{
    if (headers_sent()) {
        return;
    }

    $requestPath = (string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH);
    if ($requestPath === '' || strpos($requestPath, '/api/') !== false) {
        return;
    }

    $file = basename($requestPath);
    $supported = ['index.php', 'about.php', 'yoga-prosperity-method.php', 'programs.php', 'rajat-sangh.php', 'vajra-sangh.php', 'success-stories.php', 'contact.php', 'privacy-policy.php', 'terms.php', 'refund-policy.php', 'pricing-policy.php', 'blog.php'];
    if (!in_array($file, $supported, true)) {
        return;
    }

    if ($file === 'index.php') {
        $target = substr($requestPath, 0, -strlen('index.php'));
    } elseif ($file === 'terms.php') {
        $target = substr($requestPath, 0, -strlen('terms.php')) . 'terms-and-conditions';
    } elseif ($file === 'blog.php') {
        $base = substr($requestPath, 0, -strlen('blog.php')) . 'resources';
        $article = trim((string) ($_GET['article'] ?? ''));
        $target = $article !== '' ? $base . '/' . rawurlencode($article) : $base;
    } else {
        $target = substr($requestPath, 0, -4);
    }

    $query = (string) ($_SERVER['QUERY_STRING'] ?? '');
    if ($file === 'blog.php') {
        parse_str($query, $queryData);
        unset($queryData['article']);
        $query = http_build_query($queryData);
    }
    header('Location: ' . $target . ($query !== '' ? '?' . $query : ''), true, 301);
    exit;
}

redirect_legacy_php_request();

if (!headers_sent() && extension_loaded('zlib') && !in_array('ob_gzhandler', ob_list_handlers(), true)) {
    ob_start('ob_gzhandler');
}

function site_path(string $path = ''): string
{
    return SITE_BASE_PATH . '/' . ltrim($path, '/');
}

function asset_url(string $path): string
{
    return site_path('assets/' . ltrim($path, '/'));
}

function responsive_srcset(string $filename): string
{
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $basename = substr($filename, 0, -(strlen($extension) + 1));
    $fullWidth = $filename === 'trainer-live-coaching-v2.jpg' ? 1122 : 1536;

    return asset_url('images/' . $basename . '-640.webp') . ' 640w, '
        . asset_url('images/' . $basename . '-768.webp') . ' 768w, '
        . asset_url('images/' . $basename . '.webp') . ' ' . $fullWidth . 'w';
}

function page_meta(array $overrides = []): array
{
    return array_merge([
        'title' => 'Yoga Business Coaching for Teachers | Yoga Prosperity Model',
        'description' => 'Build a sustainable yoga career with practical business coaching, positioning, marketing and community support.',
        'path' => '/',
        'image' => '/assets/images/og.jpg',
        'robots' => 'index, follow, max-image-preview:large',
    ], $overrides);
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function csrf_token(): string
{
    ensure_session();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return (string) $_SESSION['csrf_token'];
}

function verify_csrf(?string $token): bool
{
    ensure_session();
    return is_string($token) && hash_equals((string) ($_SESSION['csrf_token'] ?? ''), $token);
}

function base_schema(): array
{
    return [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'Organization',
                '@id' => SITE_URL . '/#organization',
                'name' => SITE_NAME,
                'url' => SITE_URL,
                'logo' => ['@type' => 'ImageObject', 'url' => SITE_URL . '/assets/images/ypm-logo-2026.png', 'width' => 512, 'height' => 512],
                'email' => SUPPORT_EMAIL,
                'telephone' => SUPPORT_PHONE,
                'description' => 'Yoga business mentoring and professional development for yoga teachers in India.',
                'founder' => ['@id' => SITE_URL . '/about/#prabhu-zunja'],
                'sameAs' => [YOUTUBE_URL, INSTAGRAM_URL, THREADS_URL],
                'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Pune', 'addressRegion' => 'Maharashtra', 'postalCode' => '412101', 'addressCountry' => 'IN'],
                'areaServed' => ['@type' => 'Country', 'name' => 'India'],
                'knowsAbout' => ['Yoga business coaching', 'Yoga teacher mentoring', 'Signature yoga programs', 'Ethical yoga marketing'],
            ],
            [
                '@type' => 'WebSite',
                '@id' => SITE_URL . '/#website',
                'url' => SITE_URL,
                'name' => SITE_NAME,
                'publisher' => ['@id' => SITE_URL . '/#organization'],
                'inLanguage' => 'en-IN',
            ],
        ],
    ];
}

function breadcrumb_schema(array $items): array
{
    $elements = [];
    foreach ($items as $position => $item) {
        $elements[] = [
            '@type' => 'ListItem',
            'position' => $position + 1,
            'name' => $item[0],
            'item' => SITE_URL . $item[1],
        ];
    }

    return ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $elements];
}

function faq_schema(array $faqs): array
{
    return [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(static fn(array $faq): array => [
            '@type' => 'Question',
            'name' => $faq[0],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq[1]],
        ], $faqs),
    ];
}
