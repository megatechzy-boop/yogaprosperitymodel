<?php
require_once __DIR__ . '/includes/config.php';
$current = 'home';
$meta = page_meta([
    'title' => 'Yoga Business Coaching for Teachers | Yoga Prosperity Model',
    'description' => 'Turn your yoga expertise into a trusted, sustainable practice with mentorship, business strategy and the Yoga Gurus Sangh community.',
]);
$structuredData = [[
    '@context' => 'https://schema.org',
    '@graph' => [
        ['@type' => 'WebPage', '@id' => SITE_URL . '/#webpage', 'url' => SITE_URL . '/', 'name' => $meta['title'], 'description' => $meta['description'], 'isPartOf' => ['@id' => SITE_URL . '/#website'], 'about' => ['@id' => SITE_URL . '/#organization'], 'inLanguage' => 'en-IN'],
        ['@type' => 'FAQPage', 'mainEntity' => [
            ['@type' => 'Question', 'name' => 'Who is the Yoga Prosperity Model for?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'It is designed for yoga teachers and wellness professionals who want to package their expertise, reach the right clients and build dependable income.']],
            ['@type' => 'Question', 'name' => 'Do I need business experience?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'No. The programs guide you from clarity and positioning through marketing, sales and delivery.']],
            ['@type' => 'Question', 'name' => 'Are the programs online?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'The current offer includes online learning, weekly guidance and community support, with selected higher-level collaborative experiences.']],
            ['@type' => 'Question', 'name' => 'How do I know which Sangh is right for me?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Rajat Sangh is the foundation pathway, while Vajra Sangh provides deeper mentorship for established teachers. A clarity conversation can confirm the suitable level of support.']],
        ]],
    ],
]];
require __DIR__ . '/includes/header.php';
?>
<section class="hero hero-v2">
  <div class="hero-copy">
    <div class="hero-kicker"><span class="kicker-dot"></span> Yoga business mentorship • India</div>
    <h1>Your yoga<br>deserves a<br><em>bigger stage.</em></h1>
    <div class="hero-bottom">
      <p class="hero-intro">Build a signature program, attract the right clients and grow a respected yoga practice—without losing the purpose behind your work.</p>
<div class="hero-actions"><a class="button primary" href="<?= e(site_path('programs')) ?>">Find your growth path <span>→</span></a><a class="round-link" href="<?= e(site_path('about')) ?>" aria-label="Meet your mentor">↘</a></div>
    </div>
  </div>
  <div class="hero-visual">
    <div class="hero-word" aria-hidden="true">PROSPER</div>
    <div class="hero-photo-wrap"><img src="<?= e(asset_url('images/hero-live-strategy-workshop-v1.jpg')) ?>" fetchpriority="high" decoding="async" srcset="<?= e(responsive_srcset('hero-live-strategy-workshop-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Rajyogi Prabhu Zunja leading a live yoga business strategy workshop" width="1536" height="1024"></div>
    <div class="mentor-card"><img src="<?= e(asset_url('images/founder-112.webp')) ?>" alt="Rajyogi Prabhu Zunja" width="112" height="125"><div><span>Your mentor</span><strong>Rajyogi<br>Prabhu Zunja</strong></div></div>
    <div class="impact-card"><span>Community impact</span><strong>5,000+</strong><small>people empowered through yoga</small></div>
    <div class="orbit-badge"><span>Purpose</span><b>✦</b><span>Prosperity</span></div>
  </div>
</section>

<section class="proof-strip">
  <p>Built for yoga teachers who are ready to</p>
  <div><strong>Clarify</strong><span>their niche</span></div><div><strong>Create</strong><span>a signature program</span></div><div><strong>Connect</strong><span>with ideal clients</span></div><div><strong>Grow</strong><span>with confidence</span></div>
</section>

<section class="marquee" aria-label="Program themes"><div>Purpose <b>•</b> Positioning <b>•</b> Premium Programs <b>•</b> Prosperity <b>•</b> Community <b>•</b></div></section>

<section class="method section" id="method">
  <div class="section-heading"><div><p class="eyebrow">A practical path forward</p><h2>Ancient wisdom.<br><em>Modern strategy.</em></h2></div></div>
  <p class="section-lede">We help yoga teachers build meaningful careers without compromising the values that brought them to yoga in the first place.</p>
  <div class="method-grid">
<article><span>01</span><h3>Find your niche</h3><p>Clarify who you serve, the transformation you create and why your approach matters.</p><a href="<?= e(site_path('yoga-prosperity-method')) ?>">Build your positioning ↗</a></article>
<article><span>02</span><h3>Package your wisdom</h3><p>Turn your experience into a focused signature program with a confident price and promise.</p><a href="<?= e(site_path('yoga-prosperity-method')) ?>">Shape your program ↗</a></article>
<article><span>03</span><h3>Grow with systems</h3><p>Learn simple marketing, sales and delivery systems that support steady, sustainable growth.</p><a href="<?= e(site_path('yoga-prosperity-method')) ?>">Start growing ↗</a></article>
  </div>
</section>

<section class="about section home-about">
  <div class="about-image"><img src="<?= e(asset_url('images/trainer-live-coaching-v2.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-live-coaching-v2.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Rajyogi Prabhu Zunja leading a live online group coaching session" width="1122" height="1402" loading="lazy"><span>Live coaching in action</span></div>
<div class="about-copy"><p class="eyebrow">Meet your mentor</p><h2>A teacher who understands <em>both sides.</em></h2><p>Prabhu Zunja is a yoga teacher, mentor and entrepreneur who blends traditional Patanjali Yoga with modern business strategy. His work has reached learners across India and internationally.</p><p>Through the Yoga Prosperity Model, he helps teachers create a sustainable career while expanding their impact—physically, mentally, emotionally and spiritually.</p><div class="credentials"><div><strong>5,000+</strong><span>people trained</span></div><div><strong>5</strong><span>countries reached</span></div><div><strong>1</strong><span>prosperous mission</span></div></div><a class="button dark" href="<?= e(site_path('about')) ?>">Know Prabhu's story <span>→</span></a></div>
</section>

<section class="plans section">
  <div class="section-heading split-title"><div><p class="eyebrow">Choose your growth path</p><h2>From first step to<br><em>full transformation.</em></h2></div><p>Every path combines learning, implementation and community. Choose the level of guidance that matches where you are today.</p></div>
  <div class="plan-grid">
<article class="plan-card blue"><div class="plan-scene"><img src="<?= e(asset_url('images/rajat-recorded-lectures-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('rajat-recorded-lectures-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Rajat Sangh member learning through Prabhu Zunja's recorded online lectures" width="1536" height="1024" loading="lazy"><span>Recorded lecture library</span></div><p>Silver membership</p><h3>Rajat Sangh</h3><div class="price">₹6,999<small>/ year</small></div><ul><li>12 recorded lecture courses</li><li>30-day business hackathon</li><li>Weekly Q&amp;A and support</li><li>Accountability community</li></ul><a href="<?= e(site_path('programs/rajat-sangh')) ?>">Explore Rajat Sangh <span>↗</span></a></article>
<article class="plan-card dark"><div class="plan-scene"><img src="<?= e(asset_url('images/trainer-mentoring-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-mentoring-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja in a focused one-to-one mentoring session" width="1536" height="1024" loading="lazy"><span>Personal guidance</span></div><p>Diamond mentorship</p><h3>Vajra Sangh</h3><div class="price">₹99,999<small>/ year</small></div><ul><li>Everything in Rajat Sangh</li><li>One-to-one coaching</li><li>Collaborative retreat design</li><li>3-year certification path</li></ul><a href="<?= e(site_path('programs/vajra-sangh')) ?>">Explore Vajra Sangh <span>↗</span></a></article>
  </div>
</section>

<section class="in-action section" aria-labelledby="in-action-title">
  <div class="section-heading split-title">
    <div><p class="eyebrow">Mentorship in action</p><h2 id="in-action-title">Real guidance.<br><em>Many moments.</em></h2></div>
    <p>From the first clarity call to celebrating a breakthrough, the work happens wherever yoga teachers are ready to grow.</p>
  </div>
  <div class="action-grid">
    <figure class="action-card action-stage"><img src="<?= e(asset_url('images/trainer-stage-speaking-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-stage-speaking-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja speaking at a yoga entrepreneurship conference" width="1536" height="1024" loading="lazy"><figcaption><span>01</span>Stage speaking</figcaption></figure>
    <figure class="action-card action-podcast"><img src="<?= e(asset_url('images/trainer-podcast-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-podcast-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja in a podcast interview" width="1536" height="1024" loading="lazy"><figcaption><span>02</span>Podcast conversation</figcaption></figure>
    <figure class="action-card action-course"><img src="<?= e(asset_url('images/trainer-course-recording-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-course-recording-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja recording an online course" width="1536" height="1024" loading="lazy"><figcaption><span>03</span>Course recording</figcaption></figure>
    <figure class="action-card action-retreat"><img src="<?= e(asset_url('images/trainer-retreat-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-retreat-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja facilitating an outdoor retreat session" width="1536" height="1024" loading="lazy"><figcaption><span>04</span>Retreat session</figcaption></figure>
    <figure class="action-card action-planning"><img src="<?= e(asset_url('images/trainer-business-planning-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-business-planning-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja planning a yoga business strategy" width="1536" height="1024" loading="lazy"><figcaption><span>05</span>Business planning</figcaption></figure>
    <figure class="action-card action-community"><img src="<?= e(asset_url('images/trainer-community-meetup-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-community-meetup-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja with the yoga teacher community" width="1536" height="1024" loading="lazy"><figcaption><span>06</span>Community meetup</figcaption></figure>
    <figure class="action-card action-certificate"><img src="<?= e(asset_url('images/trainer-certificate-ceremony-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-certificate-ceremony-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja presenting a course certificate" width="1536" height="1024" loading="lazy"><figcaption><span>07</span>Certificate ceremony</figcaption></figure>
    <figure class="action-card action-success"><img src="<?= e(asset_url('images/trainer-success-celebration-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-success-celebration-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja celebrating student success" width="1536" height="1024" loading="lazy"><figcaption><span>08</span>Success celebration</figcaption></figure>
    <figure class="action-card action-phone"><img src="<?= e(asset_url('images/trainer-phone-consultation-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-phone-consultation-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja on a video clarity consultation" width="1536" height="1024" loading="lazy"><figcaption><span>09</span>Clarity consultation</figcaption></figure>
  </div>
  <p class="action-swipe-hint">Swipe to explore all nine moments →</p>
</section>

<section class="stories section">
  <div class="stories-title"><p class="eyebrow">Real stories, real movement</p><h2>Growth feels different when you are <em>not alone.</em></h2></div>
  <div class="story-stack">
    <blockquote><span>01</span><p>“I went from struggling to find clients to securing my first premium client within two months. The structure gave me clarity and confidence.”</p><footer>Shruti Deshpande<small>Yoga teacher</small></footer></blockquote>
    <blockquote><span>02</span><p>“I stopped undervaluing my work, built a focused program and began attracting students who genuinely value my expertise.”</p><footer>Arvind Patel<small>Yoga teacher</small></footer></blockquote>
    <blockquote><span>03</span><p>“The masterclass helped me package my yoga experience into a clear premium offer and reach clients beyond my city.”</p><footer>Meera Jain<small>Yoga teacher</small></footer></blockquote>
<a class="text-link" href="<?= e(site_path('success-stories')) ?>">Read more success stories <span>↗</span></a>
  </div>
</section>

<section class="faq section">
  <div><p class="eyebrow">Questions, answered</p><h2>Ready to build with <em>clarity?</em></h2><p class="faq-intro">Start with the answer you need. If it is not here, talk directly with our team.</p></div>
  <div class="accordions">
    <details open><summary>Who is the Yoga Prosperity Model for?<span>+</span></summary><p>It is designed for yoga teachers and wellness professionals who want to package their expertise, reach the right clients and build dependable income.</p></details>
    <details><summary>Do I need business experience?<span>+</span></summary><p>No. The programs guide you from clarity and positioning through marketing, sales and delivery.</p></details>
    <details><summary>Are the programs online?<span>+</span></summary><p>The current offer includes online learning, weekly guidance and community support, with selected higher-level collaborative experiences.</p></details>
    <details><summary>How do I know which Sangh is right for me?<span>+</span></summary><p>Contact the team for a short conversation about your goals, experience and preferred level of support.</p></details>
  </div>
</section>

<section class="contact section">
  <div class="contact-copy"><p class="eyebrow">Your next chapter</p><h2>Let your purpose<br><em>prosper.</em></h2><p>Tell us where you are in your yoga journey. We will help you choose the clearest next step.</p></div>
  <form class="contact-form" action="/contact.php" method="get"><label>Name<input type="text" name="name" placeholder="Your full name" required></label><label>Email<input type="email" name="email" placeholder="you@example.com" required></label><label>Phone<input type="tel" name="phone" placeholder="+91"></label><label>What would you like help with?<textarea name="message" placeholder="Tell us about your goals" rows="3"></textarea></label><button type="submit">Start the conversation <span>↗</span></button></form>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
