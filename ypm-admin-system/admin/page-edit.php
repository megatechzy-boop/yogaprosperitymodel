<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/themes.php';
require_login();

$pdo = db_connect();
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$page = null;
$error = '';

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM landing_pages WHERE id = ?");
    $stmt->execute([$id]);
    $page = $stmt->fetch();
    if (!$page) {
        header('Location: ' . SITE_URL . '/admin/pages.php');
        exit;
    }
}

function slugify($text) {
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    return trim($text, '-');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $slug = trim($_POST['slug'] ?? '') ?: slugify($title);
    $slug = slugify($slug);
    $subtitle = trim($_POST['subtitle'] ?? '');
    $hero_image = trim($_POST['hero_image'] ?? '');
    $webinar_date = trim($_POST['webinar_date'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $highlights = trim($_POST['highlights'] ?? '');
    $payment_link = trim($_POST['payment_link'] ?? '');
    $notify_email = trim($_POST['notify_email'] ?? '');
    $meta_title = trim($_POST['meta_title'] ?? '') ?: $title;
    $meta_description = trim($_POST['meta_description'] ?? '') ?: $subtitle;
    $status = ($_POST['status'] ?? 'draft') === 'published' ? 'published' : 'draft';
    $themes = ypm_themes();
    $theme = $_POST['theme'] ?? 'classic';
    if (!isset($themes[$theme])) { $theme = 'classic'; }
    $allowedLayouts = ['classic', 'split-hero', 'long-form', 'minimal', 'video-first', 'countdown-urgency'];
    $layout = $_POST['layout'] ?? 'classic';
    if (!in_array($layout, $allowedLayouts, true)) { $layout = 'classic'; }
    $video_url = trim($_POST['video_url'] ?? '');
    $testimonial_text = trim($_POST['testimonial_text'] ?? '');
    $testimonial_author = trim($_POST['testimonial_author'] ?? '');
    $urgency_note = trim($_POST['urgency_note'] ?? '');

    if ($title === '' || $slug === '') {
        $error = 'Title is required.';
    } else {
        // ensure slug uniqueness (excluding current page)
        $check = $pdo->prepare("SELECT id FROM landing_pages WHERE slug = ? AND id != ?");
        $check->execute([$slug, $id]);
        if ($check->fetch()) {
            $slug .= '-' . substr(md5(uniqid()), 0, 4);
        }

        if ($id) {
            $stmt = $pdo->prepare("UPDATE landing_pages SET slug=?, title=?, subtitle=?, hero_image=?, theme=?, layout=?, video_url=?, webinar_date=?, description=?, highlights=?, testimonial_text=?, testimonial_author=?, urgency_note=?, payment_link=?, notify_email=?, meta_title=?, meta_description=?, status=? WHERE id=?");
            $stmt->execute([$slug, $title, $subtitle, $hero_image, $theme, $layout, $video_url, $webinar_date, $description, $highlights, $testimonial_text, $testimonial_author, $urgency_note, $payment_link, $notify_email, $meta_title, $meta_description, $status, $id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO landing_pages (slug, title, subtitle, hero_image, theme, layout, video_url, webinar_date, description, highlights, testimonial_text, testimonial_author, urgency_note, payment_link, notify_email, meta_title, meta_description, status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$slug, $title, $subtitle, $hero_image, $theme, $layout, $video_url, $webinar_date, $description, $highlights, $testimonial_text, $testimonial_author, $urgency_note, $payment_link, $notify_email, $meta_title, $meta_description, $status]);
            $id = $pdo->lastInsertId();
        }
        header('Location: ' . SITE_URL . '/admin/pages.php?saved=1');
        exit;
    }
}

// delete
if (isset($_GET['delete']) && $id) {
    $pdo->prepare("DELETE FROM landing_pages WHERE id = ?")->execute([$id]);
    header('Location: ' . SITE_URL . '/admin/pages.php');
    exit;
}

$page_title = $id ? 'Edit Landing Page' : 'New Landing Page';
$active = 'pages';
include __DIR__ . '/includes/header.php';
?>
<h1><?= $id ? 'Edit' : 'Create' ?> Landing Page</h1>
<p class="subtitle">Fill in the details below. Once published, it will be live at <code>/webinar/your-slug</code>.</p>

<?php if ($error): ?><div class="error-box"><?= htmlspecialchars($error) ?></div><?php endif; ?>

<div class="card" style="border-color:var(--gold)">
  <h2 style="margin-top:0;font-size:17px">✨ AI Content Assistant <span style="font-weight:400;color:var(--ink-soft);font-size:13px">(free — no account or API key needed)</span></h2>
  <p style="color:var(--ink-soft);font-size:14px;margin-top:-6px">Describe your webinar in a few words, copy the generated prompt into any free AI chat (ChatGPT, Gemini, or Claude.ai), then paste its reply back here to auto-fill the form below.</p>

  <div class="field">
    <label>What is this webinar about?</label>
    <input type="text" id="ai-topic" placeholder="e.g. helping yoga teachers price their first online course">
  </div>
  <button type="button" class="btn secondary" onclick="generateAiPrompt()">1. Generate prompt</button>

  <div class="field" style="margin-top:18px;display:none" id="ai-prompt-wrap">
    <label>Copy this prompt into ChatGPT / Gemini / Claude.ai</label>
    <textarea id="ai-prompt-output" rows="6" readonly></textarea>
    <button type="button" class="btn secondary" style="margin-top:8px" onclick="copyAiPrompt()">Copy prompt</button>
  </div>

  <div class="field" style="margin-top:18px">
    <label>2. Paste the AI's reply here</label>
    <textarea id="ai-response-input" rows="6" placeholder="Paste the JSON reply from the AI here..."></textarea>
  </div>
  <button type="button" class="btn" onclick="autofillFromAi()">3. Auto-fill fields below</button>
  <div id="ai-status" style="margin-top:10px;font-size:13px"></div>
</div>

<form method="post" class="card" id="page-form">
  <h2 style="margin-top:0;font-size:17px">Design layout</h2>
  <p style="color:var(--ink-soft);font-size:13px;margin-top:-8px">Choose the page structure. You can change this anytime — content stays the same.</p>
  <div class="layout-grid">
    <?php
    $layoutOptions = [
      'classic' => ['label' => 'Classic Centered', 'desc' => 'Hero + stacked sections + form', 'wire' => 'stack'],
      'split-hero' => ['label' => 'Split Hero + Sticky Form', 'desc' => 'Image left, form always visible right', 'wire' => 'split'],
      'long-form' => ['label' => 'Long-form Sales Page', 'desc' => 'Problem \u2192 solution \u2192 testimonial \u2192 CTA', 'wire' => 'longform'],
      'minimal' => ['label' => 'Minimal', 'desc' => 'Just headline + one button', 'wire' => 'minimal'],
      'video-first' => ['label' => 'Video-First', 'desc' => 'Invite video at the very top', 'wire' => 'video'],
      'countdown-urgency' => ['label' => 'Countdown / Urgency', 'desc' => 'Live timer + urgency messaging', 'wire' => 'countdown'],
    ];
    $currentLayout = $page['layout'] ?? 'classic';
    foreach ($layoutOptions as $key => $opt):
    ?>
    <label class="layout-card <?= $currentLayout === $key ? 'selected' : '' ?>">
      <input type="radio" name="layout" value="<?= $key ?>" <?= $currentLayout === $key ? 'checked' : '' ?> onchange="document.querySelectorAll('.layout-card').forEach(e=>e.classList.remove('selected'));this.closest('label').classList.add('selected')">
      <span class="wireframe wireframe-<?= $opt['wire'] ?>">
        <?php if ($opt['wire'] === 'stack'): ?><i></i><i></i><i></i>
        <?php elseif ($opt['wire'] === 'split'): ?><b></b><b></b>
        <?php elseif ($opt['wire'] === 'longform'): ?><i></i><i></i><i></i><i></i><i></i>
        <?php elseif ($opt['wire'] === 'minimal'): ?><i style="width:60%;margin:auto"></i><i style="width:40%;margin:auto"></i>
        <?php elseif ($opt['wire'] === 'video'): ?><i style="height:16px"></i><i></i><i></i>
        <?php elseif ($opt['wire'] === 'countdown'): ?><i style="width:80%;margin:auto"></i><i style="height:14px"></i><i></i>
        <?php endif; ?>
      </span>
      <span class="layout-label"><?= htmlspecialchars($opt['label']) ?></span>
      <span class="layout-desc"><?= htmlspecialchars($opt['desc']) ?></span>
    </label>
    <?php endforeach; ?>
  </div>

  <h2 style="margin-top:34px;font-size:17px">Colour theme <span style="font-weight:400;color:var(--ink-soft);font-size:13px">(optional)</span></h2>
  <div class="theme-grid">
    <?php $currentTheme = $page['theme'] ?? 'classic'; foreach (ypm_themes() as $key => $t): $v = $t['vars']; ?>
    <label class="theme-swatch <?= $currentTheme === $key ? 'selected' : '' ?>">
      <input type="radio" name="theme" value="<?= $key ?>" <?= $currentTheme === $key ? 'checked' : '' ?> onchange="document.querySelectorAll('.theme-swatch').forEach(e=>e.classList.remove('selected'));this.closest('label').classList.add('selected')">
      <span class="swatch-colors">
        <span style="background:<?= $v['primary'] ?>"></span><span style="background:<?= $v['accent'] ?>"></span><span style="background:<?= $v['cta'] ?>"></span>
      </span>
      <span class="swatch-label"><?= htmlspecialchars($t['label']) ?></span>
    </label>
    <?php endforeach; ?>
  </div>

  <h2 style="font-size:17px;margin-top:30px">Page content</h2>
  <div class="form-grid">
    <div class="field"><label>Webinar / Page Title *</label><input type="text" name="title" id="f-title" value="<?= htmlspecialchars($page['title'] ?? '') ?>" required></div>
    <div class="field"><label>URL slug (leave blank to auto-generate)</label><input type="text" name="slug" value="<?= htmlspecialchars($page['slug'] ?? '') ?>" placeholder="e.g. august-webinar"></div>

    <div class="field full"><label>Subtitle</label><input type="text" name="subtitle" id="f-subtitle" value="<?= htmlspecialchars($page['subtitle'] ?? '') ?>"></div>

    <div class="field"><label>Webinar date / time (shown on page)</label><input type="text" name="webinar_date" id="f-webinar_date" value="<?= htmlspecialchars($page['webinar_date'] ?? '') ?>" placeholder="e.g. 20 Aug, 7:00 PM IST"><small style="color:var(--ink-soft);font-size:11px">For the Countdown layout's live timer to work, use a machine-readable format like <code>2026-08-20 19:00:00</code></small></div>
    <div class="field"><label>Hero image URL</label><input type="text" name="hero_image" value="<?= htmlspecialchars($page['hero_image'] ?? '') ?>" placeholder="/assets/images/your-photo.jpg"></div>

    <div class="field"><label>Video URL <span style="font-weight:400;text-transform:none;font-size:11px">(YouTube link — used by Video-First layout)</span></label><input type="text" name="video_url" value="<?= htmlspecialchars($page['video_url'] ?? '') ?>" placeholder="https://youtube.com/watch?v=..."></div>
    <div class="field"><label>Urgency note <span style="font-weight:400;text-transform:none;font-size:11px">(used by Countdown layout)</span></label><input type="text" name="urgency_note" value="<?= htmlspecialchars($page['urgency_note'] ?? '') ?>" placeholder="e.g. Only 20 seats left"></div>

    <div class="field full"><label>Description</label><textarea name="description" id="f-description" rows="4"><?= htmlspecialchars($page['description'] ?? '') ?></textarea></div>

    <div class="field full"><label>Highlights (one per line — shown as bullet points)</label><textarea name="highlights" id="f-highlights" rows="4" placeholder="Build your signature program&#10;Attract premium clients&#10;Live Q&A with Prabhu"><?= htmlspecialchars($page['highlights'] ?? '') ?></textarea></div>

    <div class="field"><label>Testimonial quote <span style="font-weight:400;text-transform:none;font-size:11px">(used by Long-form layout)</span></label><input type="text" name="testimonial_text" value="<?= htmlspecialchars($page['testimonial_text'] ?? '') ?>" placeholder="I finally found the clarity I needed..."></div>
    <div class="field"><label>Testimonial author</label><input type="text" name="testimonial_author" value="<?= htmlspecialchars($page['testimonial_author'] ?? '') ?>" placeholder="Shruti Deshpande, Yoga teacher"></div>

    <div class="field"><label>Razorpay payment link *</label><input type="text" name="payment_link" value="<?= htmlspecialchars($page['payment_link'] ?? get_setting('default_payment_link')) ?>" placeholder="https://rzp.io/l/..."></div>
    <div class="field"><label>Notify email for this page's registrations</label><input type="email" name="notify_email" value="<?= htmlspecialchars($page['notify_email'] ?? get_setting('default_notify_email')) ?>"></div>

    <div class="field"><label>SEO meta title</label><input type="text" name="meta_title" id="f-meta_title" value="<?= htmlspecialchars($page['meta_title'] ?? '') ?>"></div>
    <div class="field"><label>SEO meta description</label><input type="text" name="meta_description" id="f-meta_description" value="<?= htmlspecialchars($page['meta_description'] ?? '') ?>"></div>

    <div class="field"><label>Status</label>
      <select name="status">
        <option value="draft" <?= (($page['status'] ?? 'draft') === 'draft') ? 'selected' : '' ?>>Draft (not public)</option>
        <option value="published" <?= (($page['status'] ?? '') === 'published') ? 'selected' : '' ?>>Published (live)</option>
      </select>
    </div>
  </div>

  <div style="margin-top:24px;display:flex;gap:12px;align-items:center">
    <button type="submit" class="btn"><?= $id ? 'Save changes' : 'Create page' ?></button>
    <a href="<?= SITE_URL ?>/admin/pages.php" class="btn secondary">Cancel</a>
    <?php if ($id): ?>
      <a href="<?= SITE_URL ?>/admin/page-edit.php?id=<?= $id ?>&delete=1" class="btn danger" style="margin-left:auto" onclick="return confirm('Delete this landing page permanently?')">Delete</a>
    <?php endif; ?>
  </div>
</form>

<style>
.layout-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(190px,1fr));gap:14px}
.layout-card{border:2px solid var(--line);border-radius:14px;padding:14px;cursor:pointer;display:flex;flex-direction:column;gap:8px;background:var(--white)}
.layout-card.selected{border-color:var(--moss);box-shadow:0 0 0 3px rgba(33,77,60,.12)}
.layout-card input{display:none}
.wireframe{background:var(--paper);border-radius:8px;padding:10px;height:80px;display:flex;flex-direction:column;gap:5px}
.wireframe i{background:var(--line);border-radius:3px;height:10px;display:block}
.wireframe-split{flex-direction:row;gap:6px}
.wireframe-split b{flex:1;background:var(--line);border-radius:4px;display:block}
.layout-label{font-size:13.5px;font-weight:700}
.layout-desc{font-size:11.5px;color:var(--ink-soft);line-height:1.4}

.theme-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:12px}
.theme-swatch{border:2px solid var(--line);border-radius:12px;padding:12px;cursor:pointer;display:flex;flex-direction:column;gap:8px;background:var(--white)}
.theme-swatch.selected{border-color:var(--moss);box-shadow:0 0 0 3px rgba(33,77,60,.12)}
.theme-swatch input{display:none}
.swatch-colors{display:flex;height:28px;border-radius:6px;overflow:hidden}
.swatch-colors span{flex:1}
.swatch-label{font-size:12.5px;font-weight:600}
</style>
<script>
function generateAiPrompt(){
  var topic = document.getElementById('ai-topic').value.trim();
  if(!topic){ alert('Please describe the webinar topic first.'); return; }
  var prompt = "You are helping write a webinar landing page for a yoga business coach in India. "
    + "The webinar topic is: \"" + topic + "\". "
    + "Reply with ONLY valid JSON (no markdown, no explanation) in exactly this shape:\n"
    + '{"title":"...","subtitle":"...","description":"2-3 sentence description","highlights":["short benefit 1","short benefit 2","short benefit 3","short benefit 4"],"meta_title":"under 60 characters","meta_description":"under 155 characters"}'
    + "\nKeep the tone warm, purposeful and non-salesy, matching a yoga teacher audience.";
  document.getElementById('ai-prompt-output').value = prompt;
  document.getElementById('ai-prompt-wrap').style.display = 'block';
}
function copyAiPrompt(){
  var el = document.getElementById('ai-prompt-output');
  el.select();
  document.execCommand('copy');
  document.getElementById('ai-status').textContent = 'Prompt copied! Paste it into ChatGPT, Gemini, or Claude.ai.';
}
function autofillFromAi(){
  var raw = document.getElementById('ai-response-input').value.trim();
  var statusEl = document.getElementById('ai-status');
  if(!raw){ statusEl.textContent = 'Paste the AI\'s reply first.'; statusEl.style.color = '#A8472F'; return; }
  raw = raw.replace(/```json/gi,'').replace(/```/g,'').trim();
  try{
    var data = JSON.parse(raw);
    if(data.title) document.getElementById('f-title').value = data.title;
    if(data.subtitle) document.getElementById('f-subtitle').value = data.subtitle;
    if(data.description) document.getElementById('f-description').value = data.description;
    if(Array.isArray(data.highlights)) document.getElementById('f-highlights').value = data.highlights.join('\n');
    if(data.meta_title) document.getElementById('f-meta_title').value = data.meta_title;
    if(data.meta_description) document.getElementById('f-meta_description').value = data.meta_description;
    statusEl.style.color = '#214D3C';
    statusEl.textContent = 'Fields filled in below — review and adjust before saving.';
  }catch(e){
    statusEl.style.color = '#A8472F';
    statusEl.textContent = 'Could not read that as JSON. Make sure you copied the AI\'s full reply, including the { } braces.';
  }
}
</script>
<?php include __DIR__ . '/includes/footer.php'; ?>
