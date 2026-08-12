<?php
require_once __DIR__ . '/includes/config.php';

$meta = page_meta([
    'title' => 'Contact Yoga Prosperity Model | Pune',
    'description' => 'Contact the Yoga Prosperity Model team to discuss yoga business programs, mentorship and community membership.',
    'path' => '/contact/',
]);
$faqs = [
    ['How quickly will the Yoga Prosperity Model team respond?', 'The team aims to respond within one business day after receiving a complete enquiry.'],
    ['What happens during the 15-minute clarity call?', 'The conversation covers your current yoga work, goals and preferred level of support so the team can suggest a suitable next step without guaranteeing an outcome.'],
    ['Where is Yoga Prosperity Model based?', 'Yoga Prosperity Model is based in Ravet, Pune, Maharashtra, India, and its current learning and mentoring offers include online delivery.'],
];
$structuredData = [breadcrumb_schema([['Home', '/'], ['Contact', '/contact/']]), faq_schema($faqs)];
$name = trim((string) ($_GET['name'] ?? ''));
$email = trim((string) ($_GET['email'] ?? ''));
$phone = trim((string) ($_GET['phone'] ?? ''));
$message = trim((string) ($_GET['message'] ?? ''));
$program = trim((string) ($_GET['program'] ?? ''));

ensure_session();
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero page-hero-visual">
  <div><p class="breadcrumbs"><a href="<?= e(site_path()) ?>">Home</a> / Contact</p><h1>Start a<br><em>conversation.</em></h1></div>
  <p>Tell us about your yoga journey and the kind of growth you are working toward. Our team will follow up personally.</p>
  <div class="page-hero-image focus-right"><img src="<?= e(asset_url('images/trainer-phone-consultation-v1.jpg')) ?>" fetchpriority="high" decoding="async" srcset="<?= e(responsive_srcset('trainer-phone-consultation-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja guiding a yoga teacher through a clarity consultation" width="1536" height="1024"><span>Your next step starts here</span></div>
</section>
<section class="content-section contact-page">
  <div>
    <p class="eyebrow">Contact details</p>
    <h2>We are here to help.</h2>
    <div class="contact-details">
      <a href="tel:+917756857108">+91 77568 57108</a>
      <a href="mailto:support@yogaprosperitymodel.com">support@yogaprosperitymodel.com</a>
      <p>Ravet, Pune - 412101</p>
    </div>
    <a class="button appointment-button" href="<?= e(APPOINTMENT_URL) ?>" target="_blank" rel="noopener noreferrer">Book your appointment <span>↗</span></a>
    <div class="notice">Share your details for a 15-minute clarity call. Our team will personally guide you to the right next step.</div>
  </div>
  <form class="contact-form" data-lead-form action="<?= e(site_path('api/contact.php')) ?>" method="post" novalidate>
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <label class="honeypot">Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
    <label>Name<input type="text" name="name" value="<?= e($name) ?>" placeholder="Your full name" required maxlength="80"></label>
    <label>Email<input type="email" name="email" value="<?= e($email) ?>" placeholder="you@example.com" required maxlength="120"></label>
    <label>Phone<input type="tel" name="phone" value="<?= e($phone) ?>" placeholder="+91 77568 57108" required maxlength="20" pattern="[0-9+\s]{7,20}"></label>
    <label>Program of interest
      <select name="program">
        <option value="Clarity call">15-minute clarity call</option>
        <option value="Rajat Sangh" <?= $program === 'Rajat Sangh' ? 'selected' : '' ?>>Rajat Sangh</option>
        <option value="Vajra Sangh" <?= $program === 'Vajra Sangh' ? 'selected' : '' ?>>Vajra Sangh</option>
      </select>
    </label>
    <label>How can we help?<textarea name="message" rows="5" maxlength="1200" placeholder="Tell us about your goals"><?= e($message) ?></textarea></label>
    <button type="submit">Send your enquiry <span>-&gt;</span></button>
    <p class="form-status" data-form-status aria-live="polite">We usually respond within one business day.</p>
  </form>
</section>
<section class="faq section program-faq"><div><p class="eyebrow">Before you enquire</p><h2>Contact<br><em>questions.</em></h2><p class="faq-intro">What to expect when you reach out to the team.</p></div><div class="accordions"><?php foreach ($faqs as $index => $faq): ?><details <?= $index === 0 ? 'open' : '' ?>><summary><?= e($faq[0]) ?><span>+</span></summary><p><?= e($faq[1]) ?></p></details><?php endforeach; ?></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
