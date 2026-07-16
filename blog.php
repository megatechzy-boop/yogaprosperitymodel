<?php
require_once __DIR__ . '/includes/config.php';
$current = 'blog';
$meta = page_meta([
    'title' => 'Yoga Business Resources for Teachers | Yoga Prosperity Model',
    'description' => 'Practical resources on yoga business, client attraction, signature programs, pricing and online yoga teaching.',
    'path' => '/resources/',
    'robots' => 'noindex, follow',
]);
$structuredData = [breadcrumb_schema([['Home', '/'], ['Resources', '/resources/']])];
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div><p class="breadcrumbs"><a href="/">Home</a> / Resources</p><h1>Ideas for<br><em>purposeful growth.</em></h1></div><p>Practical guidance for yoga teachers building meaningful programs, trusted visibility and sustainable careers.</p></section>
<section class="content-section"><div class="article-grid"><article class="article-card"><span>Yoga business</span><h2>How to start an online yoga business in India</h2><p>A simple path from choosing a niche to creating your first focused offer.</p><a href="/contact.php?message=Send me the online yoga business guide">Guide coming soon →</a></article><article class="article-card"><span>Positioning</span><h2>How to choose a profitable yoga niche</h2><p>Find the overlap between your experience, the people you understand and a meaningful need.</p><a href="/contact.php?message=Send me the yoga niche guide">Guide coming soon →</a></article><article class="article-card"><span>Programs</span><h2>Package your yoga expertise into a signature program</h2><p>Move beyond individual classes with a structured transformation and clear outcome.</p><a href="/contact.php?message=Send me the signature program guide">Guide coming soon →</a></article><article class="article-card"><span>Pricing</span><h2>How much should a yoga teacher charge?</h2><p>Think beyond hourly rates and price according to scope, support and transformation.</p><a href="/contact.php?message=Send me the yoga pricing guide">Guide coming soon →</a></article><article class="article-card"><span>Marketing</span><h2>Ethical marketing for yoga teachers</h2><p>Communicate with clarity and invite the right people without aggressive selling.</p><a href="/contact.php?message=Send me the ethical marketing guide">Guide coming soon →</a></article><article class="article-card"><span>Clients</span><h2>Finding your first premium yoga clients</h2><p>Build trust, start better conversations and create a clear path to enrolment.</p><a href="/contact.php?message=Send me the yoga client guide">Guide coming soon →</a></article></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
