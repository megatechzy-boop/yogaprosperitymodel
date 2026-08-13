<?php if ($successMsg): ?><div class="success-box">Thanks! We've received your details and will be in touch shortly.</div><?php endif; ?>
<form class="reg-form" method="post" action="<?= SITE_URL ?>/register-handler.php">
  <input type="hidden" name="source_page" value="webinar/<?= htmlspecialchars($page['slug']) ?>">
  <input type="hidden" name="redirect_to" value="<?= SITE_URL ?>/webinar/<?= htmlspecialchars($page['slug']) ?>?registered=1">
  <input type="text" name="website" style="position:absolute;left:-9999px" tabindex="-1" autocomplete="off">
  <div><label>Name</label><input type="text" name="name" required></div>
  <div><label>Email</label><input type="email" name="email" required></div>
  <div><label>Phone</label><input type="tel" name="phone"></div>
  <div><label>Message (optional)</label><textarea name="message" rows="2"></textarea></div>
  <button type="submit">Submit</button>
  <?php if ($page['payment_link']): ?>
  <a class="btn" href="<?= htmlspecialchars($page['payment_link']) ?>" target="_blank" rel="noopener" style="text-align:center">Or Register &amp; Pay Now →</a>
  <?php endif; ?>
</form>
