<?php
require_once __DIR__ . '/includes/config.php';
$current = 'method';
$meta = page_meta(['title' => 'Yoga Prosperity Method | Build Your Yoga Business', 'description' => 'A practical framework for yoga teachers: positioning, signature programs, ethical marketing, confident sales and sustainable delivery.', 'path' => '/yoga-prosperity-method/']);
$structuredData = [breadcrumb_schema([['Home', '/'], ['Yoga Prosperity Method', '/yoga-prosperity-method/']])];
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div><p class="breadcrumbs"><a href="/">Home</a> / Our Method</p><h1>Wisdom into<br><em>action.</em></h1></div><p>A clear business path for yoga teachers who want to serve deeply, communicate confidently and grow sustainably.</p></section>
<section class="content-section"><p class="eyebrow">The framework</p><h2>Five stages of purposeful growth.</h2><div class="feature-list"><article><span>01</span><h3>Purpose & niche</h3><p>Define the people you are best equipped to help and the transformation your work creates.</p></article><article><span>02</span><h3>Signature program</h3><p>Package your knowledge into a structured journey with clear outcomes and delivery.</p></article><article><span>03</span><h3>Positioning & message</h3><p>Express your expertise in language that the right students can understand and trust.</p></article><article><span>04</span><h3>Marketing & enrolment</h3><p>Build a repeatable, ethical system for visibility, conversations and confident sales.</p></article><article><span>05</span><h3>Delivery & community</h3><p>Create excellent student experiences, measure outcomes and grow through referrals.</p></article><article><span>∞</span><h3>Implementation</h3><p>Use accountability, weekly guidance and community support to turn learning into action.</p></article></div></section>
<section class="cta-band"><h2>Choose the support<br>that fits your stage.</h2><a class="button" href="/programs.php">Explore programs <span>→</span></a></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
