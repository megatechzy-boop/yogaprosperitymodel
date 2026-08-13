<?php include __DIR__ . '/_head.php'; ?>
<style>
.wrap{max-width:720px;margin:0 auto;padding:0 20px 100px}
.hero{padding:70px 0 40px;text-align:center}
.hero img{max-width:120px;border-radius:50%;margin-bottom:20px}
.hero h1{font-size:clamp(30px,5vw,48px);line-height:1.1;margin:0 0 16px}
.hero p{color:var(--ink-soft);font-size:18px;max-width:560px;margin:0 auto}
.hero .date-badge{display:inline-block;margin-top:18px;background:var(--accent-soft);color:var(--primary-deep);padding:8px 16px;border-radius:999px;font-weight:700;font-size:13px}
.block{margin-bottom:56px}
.block h2{font-size:24px;margin:0 0 18px;color:var(--primary)}
.block p{font-size:17px;color:var(--ink-soft)}
.testimonial{background:var(--white);border-left:4px solid var(--cta);border-radius:0 16px 16px 0;padding:28px 32px;font-style:italic;font-size:18px}
.testimonial footer{margin-top:14px;font-style:normal;font-weight:700;font-size:14px;color:var(--primary)}
.cta-banner{background:var(--primary);color:#fff;border-radius:24px;padding:44px 36px;text-align:center;margin-bottom:56px}
.cta-banner h2{color:#fff;margin-top:0}
.cta-banner .btn{background:var(--cta);margin-top:14px}
.form-block{background:var(--white);border:1px solid var(--line);border-radius:18px;padding:36px}
</style>
</head>
<body>
<div class="wrap">
  <div class="hero">
    <?php if ($page['hero_image']): ?><img src="<?= htmlspecialchars($page['hero_image']) ?>" alt=""><?php endif; ?>
    <h1><?= htmlspecialchars($page['title']) ?></h1>
    <?php if ($page['subtitle']): ?><p><?= htmlspecialchars($page['subtitle']) ?></p><?php endif; ?>
    <?php if ($page['webinar_date']): ?><div class="date-badge"><?= htmlspecialchars($page['webinar_date']) ?></div><?php endif; ?>
  </div>

  <?php if ($page['description']): ?>
  <div class="block"><h2>Why this matters</h2><p><?= nl2br(htmlspecialchars($page['description'])) ?></p></div>
  <?php endif; ?>

  <?php if ($highlights): ?>
  <div class="block"><h2>What you'll walk away with</h2><ul class="highlights"><?php foreach ($highlights as $h): ?><li><?= htmlspecialchars($h) ?></li><?php endforeach; ?></ul></div>
  <?php endif; ?>

  <?php if (!empty($page['testimonial_text'])): ?>
  <div class="block">
    <blockquote class="testimonial" style="margin:0">
      "<?= htmlspecialchars($page['testimonial_text']) ?>"
      <?php if (!empty($page['testimonial_author'])): ?><footer>— <?= htmlspecialchars($page['testimonial_author']) ?></footer><?php endif; ?>
    </blockquote>
  </div>
  <?php endif; ?>

  <?php if ($page['payment_link']): ?>
  <div class="cta-banner">
    <h2>Ready to join?</h2>
    <p style="color:#E4EDE7;margin:0">Seats are limited — reserve yours today.</p>
    <a class="btn" href="<?= htmlspecialchars($page['payment_link']) ?>" target="_blank" rel="noopener">Register &amp; Pay Now →</a>
  </div>
  <?php endif; ?>

  <div class="form-block">
    <h2 style="margin-top:0;font-size:20px;color:var(--primary)">Or leave your details and we'll reach out</h2>
    <?php include __DIR__ . '/_form.php'; ?>
  </div>
</div>
</body>
</html>
