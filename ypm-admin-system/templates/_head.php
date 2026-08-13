<!doctype html>
<html lang="en-IN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($page['meta_title'] ?: $page['title']) ?></title>
<meta name="description" content="<?= htmlspecialchars($page['meta_description'] ?: $page['subtitle']) ?>">
<meta name="robots" content="index, follow">
<link rel="canonical" href="<?= htmlspecialchars(SITE_URL . '/webinar/' . $page['slug']) ?>">
<style>
:root{<?= $themeCss ?>--line:rgba(0,0,0,.1)}
*{box-sizing:border-box}
body{margin:0;font-family:Arial,Helvetica,sans-serif;background:var(--paper);color:var(--ink);line-height:1.6}
a{color:inherit}
.btn{display:inline-block;background:var(--cta);color:#fff;padding:16px 30px;border-radius:999px;font-weight:700;text-decoration:none;font-size:16px;border:0;cursor:pointer;font-family:inherit}
.btn:hover{background:var(--primary-deep)}
form.reg-form{display:grid;gap:14px}
form.reg-form label{font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--ink-soft)}
form.reg-form input,form.reg-form textarea{width:100%;padding:12px;border:1px solid var(--line);border-radius:8px;font:inherit;margin-top:6px;background:var(--white);color:var(--ink)}
form.reg-form button{background:var(--primary);color:#fff;border:0;padding:14px 24px;border-radius:8px;font:inherit;font-weight:700;cursor:pointer;width:100%}
form.reg-form button:hover{background:var(--primary-deep)}
.success-box{background:var(--accent-soft);border-left:3px solid var(--primary);padding:16px;border-radius:8px;color:var(--primary-deep);margin-bottom:20px}
.highlights{list-style:none;padding:0;margin:0;display:grid;gap:12px}
.highlights li{padding-left:28px;position:relative}
.highlights li:before{content:"✓";position:absolute;left:0;color:var(--cta);font-weight:700}
</style>
