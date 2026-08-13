<?php include __DIR__ . '/_head.php'; ?>
<style>
.wrap{max-width:700px;margin:0 auto;padding:60px 20px 100px;text-align:center}
.urgency-tag{display:inline-block;background:var(--cta);color:#fff;padding:8px 18px;border-radius:999px;font-weight:700;font-size:12px;text-transform:uppercase;letter-spacing:.08em;margin-bottom:20px}
.hero h1{font-size:clamp(28px,5.5vw,46px);margin:0 0 14px;line-height:1.1}
.hero p{color:var(--ink-soft);font-size:17px;max-width:520px;margin:0 auto 10px}
.countdown{display:flex;justify-content:center;gap:14px;margin:34px 0}
.countdown div{background:var(--primary-deep);color:#fff;border-radius:14px;padding:18px 16px;min-width:76px}
.countdown strong{display:block;font-size:30px;line-height:1}
.countdown span{font-size:11px;text-transform:uppercase;letter-spacing:.08em;color:var(--accent-soft)}
.section{background:var(--white);border:1px solid var(--line);border-radius:18px;padding:32px;margin:24px 0;text-align:left}
.cta-center{margin:30px 0}
</style>
</head>
<body>
<div class="wrap">
  <div class="hero">
    <?php if (!empty($page['urgency_note'])): ?><div class="urgency-tag"><?= htmlspecialchars($page['urgency_note']) ?></div><?php endif; ?>
    <h1><?= htmlspecialchars($page['title']) ?></h1>
    <?php if ($page['subtitle']): ?><p><?= htmlspecialchars($page['subtitle']) ?></p><?php endif; ?>
  </div>

  <?php if (!empty($page['webinar_date'])): ?>
  <div id="countdown" class="countdown">
    <div><strong id="cd-days">--</strong><span>Days</span></div>
    <div><strong id="cd-hours">--</strong><span>Hours</span></div>
    <div><strong id="cd-mins">--</strong><span>Mins</span></div>
    <div><strong id="cd-secs">--</strong><span>Secs</span></div>
  </div>
  <p style="color:var(--ink-soft);font-size:14px">Starts: <?= htmlspecialchars($page['webinar_date']) ?></p>
  <script>
  (function(){
    var target = new Date(<?= json_encode($page['webinar_date']) ?>).getTime();
    if(isNaN(target)){ document.getElementById('countdown').style.display='none'; return; }
    function tick(){
      var now = new Date().getTime();
      var diff = target - now;
      if(diff <= 0){ document.getElementById('countdown').innerHTML = '<div style="grid-column:1/-1"><strong>We\'re live now!</strong></div>'; return; }
      var d = Math.floor(diff/(1000*60*60*24));
      var h = Math.floor((diff%(1000*60*60*24))/(1000*60*60));
      var m = Math.floor((diff%(1000*60*60))/(1000*60));
      var s = Math.floor((diff%(1000*60))/1000);
      document.getElementById('cd-days').textContent = d;
      document.getElementById('cd-hours').textContent = h;
      document.getElementById('cd-mins').textContent = m;
      document.getElementById('cd-secs').textContent = s;
    }
    tick();
    setInterval(tick, 1000);
  })();
  </script>
  <?php endif; ?>

  <?php if ($page['payment_link']): ?>
  <div class="cta-center"><a class="btn" href="<?= htmlspecialchars($page['payment_link']) ?>" target="_blank" rel="noopener">Secure Your Spot Now →</a></div>
  <?php endif; ?>

  <?php if ($highlights): ?>
  <div class="section"><h2 style="margin-top:0">What you'll get</h2><ul class="highlights"><?php foreach ($highlights as $h): ?><li><?= htmlspecialchars($h) ?></li><?php endforeach; ?></ul></div>
  <?php endif; ?>

  <div class="section">
    <h2 style="margin-top:0">Register your interest</h2>
    <?php include __DIR__ . '/_form.php'; ?>
  </div>
</div>
</body>
</html>
