<?php include __DIR__ . '/_head.php'; ?>
<style>
.split-wrap{max-width:1100px;margin:0 auto;padding:0;display:grid;grid-template-columns:1.2fr 1fr;min-height:100vh}
.split-left{background:var(--primary-deep);color:#fff;padding:60px 48px;display:flex;flex-direction:column;justify-content:center;position:relative;overflow:hidden}
.split-left img{width:100%;border-radius:16px;margin-bottom:28px;max-height:280px;object-fit:cover}
.split-left h1{font-size:clamp(30px,4vw,46px);line-height:1.1;margin:0 0 16px}
.split-left p{color:var(--accent-soft);font-size:17px;opacity:.92;max-width:460px}
.split-left .date-badge{display:inline-block;margin-top:16px;background:var(--accent-soft);color:var(--primary-deep);padding:8px 16px;border-radius:999px;font-weight:700;font-size:13px}
.split-left ul.highlights{margin-top:26px;color:#fff}
.split-left ul.highlights li:before{color:var(--accent-soft)}
.split-right{background:var(--paper);padding:60px 44px;display:flex;align-items:center}
.form-card{background:var(--white);border:1px solid var(--line);border-radius:18px;padding:32px;width:100%;position:sticky;top:30px}
.form-card h2{margin-top:0;font-size:19px}
@media(max-width:860px){.split-wrap{grid-template-columns:1fr;min-height:auto}.split-left,.split-right{padding:40px 24px}.form-card{position:static}}
</style>
</head>
<body>
<div class="split-wrap">
  <div class="split-left">
    <?php if ($page['hero_image']): ?><img src="<?= htmlspecialchars($page['hero_image']) ?>" alt=""><?php endif; ?>
    <h1><?= htmlspecialchars($page['title']) ?></h1>
    <?php if ($page['subtitle']): ?><p><?= htmlspecialchars($page['subtitle']) ?></p><?php endif; ?>
    <?php if ($page['webinar_date']): ?><div class="date-badge"><?= htmlspecialchars($page['webinar_date']) ?></div><?php endif; ?>
    <?php if ($page['description']): ?><p style="margin-top:22px;color:#D8E0DB"><?= nl2br(htmlspecialchars($page['description'])) ?></p><?php endif; ?>
    <?php if ($highlights): ?><ul class="highlights"><?php foreach ($highlights as $h): ?><li><?= htmlspecialchars($h) ?></li><?php endforeach; ?></ul><?php endif; ?>
  </div>
  <div class="split-right">
    <div class="form-card">
      <h2>Reserve your spot</h2>
      <?php include __DIR__ . '/_form.php'; ?>
    </div>
  </div>
</div>
</body>
</html>
