<?php
declare(strict_types=1);

const SITE_NAME = 'Yoga Prosperity Model';
const SITE_ORIGIN = 'https://megatechzy.com';
define('SITE_BASE_PATH', preg_match('#^/yogaprosperitymodel(?:/|$)#', (string) ($_SERVER['SCRIPT_NAME'] ?? '')) ? '/yogaprosperitymodel' : '');
define('SITE_URL', SITE_ORIGIN . SITE_BASE_PATH);
const SUPPORT_EMAIL = 'support@yogaprosperitymodel.com';
const SUPPORT_PHONE = '+91 74200 87709';

function site_path(string $path = ''): string
{
    return SITE_BASE_PATH . '/' . ltrim($path, '/');
}

function asset_url(string $path): string
{
    return site_path('assets/' . ltrim($path, '/'));
}

function page_meta(array $overrides = []): array
{
    return array_merge([
        'title' => 'Yoga Business Coaching for Teachers | Yoga Prosperity Model',
        'description' => 'Build a sustainable yoga career with practical business coaching, positioning, marketing and community support.',
        'path' => '/',
        'image' => '/assets/images/og.png',
        'robots' => 'index, follow, max-image-preview:large',
    ], $overrides);
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
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
                'logo' => ['@type' => 'ImageObject', 'url' => SITE_URL . '/assets/images/yoga-prosperity-model-logo.png', 'width' => 512, 'height' => 512],
                'email' => SUPPORT_EMAIL,
                'telephone' => SUPPORT_PHONE,
                'founder' => ['@id' => SITE_URL . '/about/#prabhu-zunja'],
                'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Pune', 'addressRegion' => 'Maharashtra', 'postalCode' => '412101', 'addressCountry' => 'IN'],
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
