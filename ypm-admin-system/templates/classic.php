<?php include __DIR__ . '/_head.php'; ?>
<style>
.wrap{max-width:760px;margin:0 auto;padding:60px 20px 100px}
.hero{background:var(--primary-deep);color:#fff;border-radius:24px;padding:50px 36px;margin-bottom:40px;text-align:center}
.hero img{max-width:140px;border-radius:50%;margin-bottom:20px}
.hero h1{font-size:clamp(28px,5vw,42px);margin:0 0 14px;line-height:1.15}
.hero p{color:var(--accent-soft);font-size:17px;max-width:520px;margin:0 auto;opacity:.92}
.hero .date-badge{display:inline-block;margin-top:18px;background:var(--accent-soft);color:var(--primary-deep);padding:8px 16px;border-radius:999px;font-weight:700;font-size:13px}
.section{background:var(--white);border:1px solid var(--line);border-radius:18px;padding:32px;margin-bottom:24px}
.section h2{font-size:20px;margin-top:0}
.cta-center{text-align:center;margin:30px 0}
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
  <div class="section"><p style="margin:0;font-size:16px;color:var(--ink-soft)"><?= nl2br(htmlspecialchars($page['description'])) ?></p></div>
  <?php endif; ?>

  <?php if ($highlights): ?>
  <div class="section"><h2>What you'll get</h2><ul class="highlights"><?php foreach ($highlights as $h): ?><li><?= htmlspecialchars($h) ?></li><?php endforeach; ?></ul></div>
  <?php endif; ?>

  <?php if ($page['payment_link']): ?>
  <div class="cta-center"><a class="btn" href="<?= htmlspecialchars($page['payment_link']) ?>" target="_blank" rel="noopener">Register &amp; Pay Now →</a></div>
  <?php endif; ?>

  <div class="section">
    <h2>Have a question? Register your interest</h2>
    <?php include __DIR__ . '/_form.php'; ?>
  </div>
</div>
</body>
</html>
