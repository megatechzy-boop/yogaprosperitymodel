<?php
require_once __DIR__ . '/includes/auth.php';
require_login();

$pdo = db_connect();
$totalLeads = $pdo->query("SELECT COUNT(*) c FROM leads")->fetch()['c'];
$totalPages = $pdo->query("SELECT COUNT(*) c FROM landing_pages")->fetch()['c'];
$publishedPages = $pdo->query("SELECT COUNT(*) c FROM landing_pages WHERE status='published'")->fetch()['c'];
$last7DaysLeads = $pdo->query("SELECT COUNT(*) c FROM leads WHERE created_at >= NOW() - INTERVAL 7 DAY")->fetch()['c'];

$recentLeads = $pdo->query("SELECT * FROM leads ORDER BY created_at DESC LIMIT 5")->fetchAll();

$page_title = 'Dashboard';
$active = 'dashboard';
include __DIR__ . '/includes/header.php';
?>
<h1>Dashboard</h1>
<p class="subtitle">Overview of your leads and webinar landing pages.</p>

<div class="stat-grid">
  <div class="stat-card"><strong><?= $totalLeads ?></strong><span>Total submissions</span></div>
  <div class="stat-card"><strong><?= $last7DaysLeads ?></strong><span>Last 7 days</span></div>
  <div class="stat-card"><strong><?= $publishedPages ?></strong><span>Live landing pages</span></div>
  <div class="stat-card"><strong><?= $totalPages ?></strong><span>Total landing pages</span></div>
</div>

<div class="card">
  <div class="actions-row">
    <h2 style="margin:0;font-size:17px">Recent submissions</h2>
    <a href="<?= SITE_URL ?>/admin/leads.php" class="text-link">View all →</a>
  </div>
  <?php if ($recentLeads): ?>
  <table>
    <tr><th>Name</th><th>Email</th><th>Phone</th><th>Source</th><th>Date</th></tr>
    <?php foreach ($recentLeads as $l): ?>
    <tr>
      <td><?= htmlspecialchars($l['name']) ?></td>
      <td><?= htmlspecialchars($l['email']) ?></td>
      <td><?= htmlspecialchars($l['phone']) ?></td>
      <td><?= htmlspecialchars($l['source_page']) ?></td>
      <td><?= htmlspecialchars($l['created_at']) ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php else: ?>
  <div class="empty-state">No submissions yet.</div>
  <?php endif; ?>
</div>

<div class="card">
  <div class="actions-row">
    <h2 style="margin:0;font-size:17px">Quick actions</h2>
  </div>
  <a href="<?= SITE_URL ?>/admin/page-edit.php" class="btn">+ Create new landing page</a>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
