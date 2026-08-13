<?php
include __DIR__ . '/_head.php';

function ypm_youtube_embed($url) {
    if (!$url) return null;
    if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([a-zA-Z0-9_-]{6,})/', $url, $m)) {
        return 'https://www.youtube.com/embed/' . $m[1];
    }
    return null; // treat as direct video file / unsupported host
}
$embedUrl = ypm_youtube_embed($page['video_url'] ?? '');
?>
<style>
.wrap{max-width:760px;margin:0 auto;padding:50px 20px 100px}
.video-frame{position:relative;padding-top:56.25%;border-radius:18px;overflow:hidden;background:#000;margin-bottom:34px;box-shadow:0 20px 50px rgba(0,0,0,.18)}
.video-frame iframe,.video-frame video{position:absolute;inset:0;width:100%;height:100%;border:0}
.hero{text-align:center;margin-bottom:36px}
.hero h1{font-size:clamp(28px,5vw,42px);margin:0 0 14px}
.hero p{color:var(--ink-soft);font-size:17px;max-width:520px;margin:0 auto}
.date-badge{display:inline-block;margin-top:16px;background:var(--accent-soft);color:var(--primary-deep);padding:8px 16px;border-radius:999px;font-weight:700;font-size:13px}
.section{background:var(--white);border:1px solid var(--line);border-radius:18px;padding:32px;margin-bottom:24px}
.cta-center{text-align:center;margin:30px 0}
</style>
</head>
<body>
<div class="wrap">
  <?php if ($embedUrl): ?>
  <div class="video-frame"><iframe src="<?= htmlspecialchars($embedUrl) ?>" title="Webinar invitation video" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
  <?php elseif (!empty($page['video_url'])): ?>
  <div class="video-frame"><video controls src="<?= htmlspecialchars($page['video_url']) ?>"></video></div>
  <?php elseif ($page['hero_image']): ?>
  <div class="video-frame" style="padding-top:0;height:340px"><img src="<?= htmlspecialchars($page['hero_image']) ?>" style="width:100%;height:100%;object-fit:cover" alt=""></div>
  <?php endif; ?>

  <div class="hero">
    <h1><?= htmlspecialchars($page['title']) ?></h1>
    <?php if ($page['subtitle']): ?><p><?= htmlspecialchars($page['subtitle']) ?></p><?php endif; ?>
    <?php if ($page['webinar_date']): ?><div class="date-badge"><?= htmlspecialchars($page['webinar_date']) ?></div><?php endif; ?>
  </div>

  <?php if ($page['description']): ?>
  <div class="section"><p style="margin:0;font-size:16px;color:var(--ink-soft)"><?= nl2br(htmlspecialchars($page['description'])) ?></p></div>
  <?php endif; ?>

  <?php if ($highlights): ?>
  <div class="section"><h2 style="margin-top:0">What you'll get</h2><ul class="highlights"><?php foreach ($highlights as $h): ?><li><?= htmlspecialchars($h) ?></li><?php endforeach; ?></ul></div>
  <?php endif; ?>

  <?php if ($page['payment_link']): ?>
  <div class="cta-center"><a class="btn" href="<?= htmlspecialchars($page['payment_link']) ?>" target="_blank" rel="noopener">Register &amp; Pay Now →</a></div>
  <?php endif; ?>

  <div class="section">
    <h2 style="margin-top:0">Register your interest</h2>
    <?php include __DIR__ . '/_form.php'; ?>
  </div>
</div>
</body>
</html>
