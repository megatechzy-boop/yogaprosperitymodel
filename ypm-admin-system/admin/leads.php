<?php
require_once __DIR__ . '/includes/auth.php';
require_login();

$pdo = db_connect();
$leads = $pdo->query("SELECT * FROM leads ORDER BY created_at DESC")->fetchAll();

$page_title = 'Leads';
$active = 'leads';
include __DIR__ . '/includes/header.php';
?>
<h1>Leads / Submissions</h1>
<p class="subtitle">Every contact form and webinar registration submitted on your site.</p>

<div class="card">
  <?php if ($leads): ?>
  <table>
    <tr><th>Name</th><th>Email</th><th>Phone</th><th>Message</th><th>Source page</th><th>Date</th></tr>
    <?php foreach ($leads as $l): ?>
    <tr>
      <td><?= htmlspecialchars($l['name']) ?></td>
      <td><a href="mailto:<?= htmlspecialchars($l['email']) ?>"><?= htmlspecialchars($l['email']) ?></a></td>
      <td><?= htmlspecialchars($l['phone']) ?></td>
      <td><?= htmlspecialchars(mb_strimwidth($l['message'] ?? '', 0, 60, '…')) ?></td>
      <td><?= htmlspecialchars($l['source_page']) ?></td>
      <td><?= htmlspecialchars($l['created_at']) ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php else: ?>
  <div class="empty-state">No submissions yet. They'll show up here as soon as someone fills out a form.</div>
  <?php endif; ?>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
