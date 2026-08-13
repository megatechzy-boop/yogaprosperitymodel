<?php include __DIR__ . '/_head.php'; ?>
<style>
.wrap{max-width:560px;margin:0 auto;min-height:100vh;display:flex;flex-direction:column;justify-content:center;padding:60px 24px;text-align:center}
.wrap img{max-width:100px;border-radius:50%;margin:0 auto 26px}
.wrap h1{font-size:clamp(30px,6vw,48px);line-height:1.12;margin:0 0 18px}
.wrap p.subtitle{color:var(--ink-soft);font-size:18px;margin:0 0 30px}
.date-badge{display:inline-block;margin-bottom:30px;background:var(--accent-soft);color:var(--primary-deep);padding:8px 16px;border-radius:999px;font-weight:700;font-size:13px}
.form-mini{max-width:400px;margin:0 auto}
</style>
</head>
<body>
<div class="wrap">
  <?php if ($page['hero_image']): ?><img src="<?= htmlspecialchars($page['hero_image']) ?>" alt=""><?php endif; ?>
  <h1><?= htmlspecialchars($page['title']) ?></h1>
  <?php if ($page['subtitle']): ?><p class="subtitle"><?= htmlspecialchars($page['subtitle']) ?></p><?php endif; ?>
  <?php if ($page['webinar_date']): ?><div class="date-badge"><?= htmlspecialchars($page['webinar_date']) ?></div><?php endif; ?>
  <?php if ($page['payment_link']): ?>
    <div style="margin-bottom:14px"><a class="btn" href="<?= htmlspecialchars($page['payment_link']) ?>" target="_blank" rel="noopener">Register &amp; Pay Now →</a></div>
  <?php endif; ?>
  <div class="form-mini"><?php include __DIR__ . '/_form.php'; ?></div>
</div>
</body>
</html>
