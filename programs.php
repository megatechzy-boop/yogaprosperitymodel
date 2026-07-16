<?php
require_once __DIR__ . '/includes/config.php';
$current = 'programs';
$meta = page_meta(['title' => 'Yoga Teacher Business Programs | Yoga Prosperity Model', 'description' => 'Compare Rajat Sangh, Suvarn Sangh and Vajra Sangh mentorship programs for yoga teachers.', 'path' => '/programs/']);
$structuredData = [breadcrumb_schema([['Home', '/'], ['Programs', '/programs/']])];
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div><p class="breadcrumbs"><a href="/">Home</a> / Programs</p><h1>Choose your<br><em>growth path.</em></h1></div><p>Three levels of learning, implementation and mentorship for yoga teachers at different stages of their journey.</p></section>
<section class="plans section"><div class="plan-grid"><article class="plan-card blue"><p>Silver membership</p><h3>Rajat Sangh</h3><div class="price">₹6,999<small>/ year</small></div><ul><li>12 practical courses</li><li>30-day business hackathon</li><li>Weekly Q&A and support</li><li>Accountability community</li></ul><a href="/programs/rajat-sangh.php">View full program <span>↗</span></a></article><article class="plan-card orange"><p>Gold membership</p><h3>Suvarn Sangh</h3><div class="price">₹14,999<small>/ year</small></div><ul><li>Everything in Rajat Sangh</li><li>Advanced growth sessions</li><li>Premium community access</li><li>Implementation guidance</li></ul><a href="/programs/suvarn-sangh.php">View full program <span>↗</span></a></article><article class="plan-card dark"><p>Diamond mentorship</p><h3>Vajra Sangh</h3><div class="price">₹99,999<small>/ year</small></div><ul><li>Everything in Suvarn Sangh</li><li>One-to-one coaching</li><li>Collaborative retreat design</li><li>3-year certification path</li></ul><a href="/programs/vajra-sangh.php">View full program <span>↗</span></a></article></div><p class="plan-note">Final inclusions and policies will be confirmed before payment integration is activated.</p></section>
<section class="cta-band"><h2>Not sure which<br>Sangh fits?</h2><a class="button" href="/contact.php">Ask our team <span>↗</span></a></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
