<?php
require_once __DIR__ . '/includes/config.php';
$current = 'about';
$meta = page_meta(['title' => 'About Prabhu Zunja | Yoga Business Mentor', 'description' => 'Meet Rajyogi Prabhu Zunja, founder of Yoga Prosperity Model and mentor to yoga teachers building purpose-led careers.', 'path' => '/about/']);
$structuredData = [breadcrumb_schema([['Home', '/'], ['About', '/about/']]), [
    '@context' => 'https://schema.org', '@type' => 'Person', '@id' => SITE_URL . '/about/#prabhu-zunja',
    'name' => 'Prabhu Zunja', 'url' => SITE_URL . '/about/', 'image' => SITE_URL . '/assets/images/founder.png',
    'jobTitle' => 'Yoga Teacher and Business Mentor', 'worksFor' => ['@id' => SITE_URL . '/#organization'],
    'knowsAbout' => ['Patanjali Yoga', 'Yoga teaching', 'Yoga business mentoring', 'Online yoga programs'],
]];
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div><p class="breadcrumbs"><a href="/">Home</a> / About</p><h1>Purpose meets<br><em>prosperity.</em></h1></div><p>Meet the teacher, mentor and entrepreneur helping yoga professionals build sustainable careers without losing their connection to service.</p></section>
<section class="about section"><div class="about-image"><img src="/assets/images/founder.png" alt="Portrait of Rajyogi Prabhu Zunja" width="472" height="528"><span>Founder & mentor</span></div><div class="about-copy"><p class="eyebrow">Rajyogi Prabhu Zunja</p><h2>Rooted in yoga.<br><em>Built for impact.</em></h2><p>Prabhu Zunja is a certified Yoga Wellness Instructor, mentor and entrepreneur. He combines the traditional foundations of Patanjali Yoga with practical strategies that help teachers communicate their value, create focused programs and serve more people.</p><p>He has trained more than 2,000 individuals across India and internationally, with learners in the USA, Canada, Qatar and France.</p><div class="credentials"><div><strong>2,000+</strong><span>people trained</span></div><div><strong>5</strong><span>countries reached</span></div><div><strong>Pune</strong><span>home base</span></div></div></div></section>
<section class="content-section"><div class="prose"><p class="eyebrow">Mission & vision</p><h2>Health, happiness and dignified growth.</h2><p>The Yoga Prosperity Model exists to help yoga teachers earn well while contributing to a healthier society—physically, mentally, emotionally and spiritually.</p><div class="feature-list"><article><h3>Our mission</h3><p>Create a strong community of capable yoga teachers who can build dependable careers and expand their positive impact.</p></article><article><h3>Our philosophy</h3><p>Combine Indian spiritual wisdom with responsible modern entrepreneurship, clear communication and consistent implementation.</p></article></div></div></section>
<section class="cta-band"><h2>Build a career aligned<br>with your purpose.</h2><a class="button" href="/contact.php">Talk to our team <span>↗</span></a></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
