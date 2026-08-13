<?php
require_once __DIR__ . '/includes/auth.php';
require_login();

$pdo = db_connect();
$pages = $pdo->query("SELECT * FROM landing_pages ORDER BY created_at DESC")->fetchAll();

$page_title = 'Landing Pages';
$active = 'pages';
include __DIR__ . '/includes/header.php';
?>
<div class="actions-row">
  <div>
    <h1 style="margin-bottom:4px">Landing Pages</h1>
    <p class="subtitle" style="margin:0">Create a new webinar page in minutes — no design tool needed.</p>
  </div>
  <a href="<?= SITE_URL ?>/admin/page-edit.php" class="btn">+ New landing page</a>
</div>

<div class="card">
  <?php if ($pages): ?>
  <table>
    <tr><th>Title</th><th>Layout</th><th>URL</th><th>Webinar date</th><th>Status</th><th>Updated</th><th></th></tr>
    <?php foreach ($pages as $p): ?>
    <tr>
      <td><?= htmlspecialchars($p['title']) ?></td>
      <td><?= htmlspecialchars($p['layout'] ?? 'classic') ?></td>
      <td><a href="<?= SITE_URL ?>/webinar/<?= htmlspecialchars($p['slug']) ?>" target="_blank">/webinar/<?= htmlspecialchars($p['slug']) ?></a></td>
      <td><?= htmlspecialchars($p['webinar_date']) ?></td>
      <td><span class="badge <?= $p['status'] ?>"><?= htmlspecialchars($p['status']) ?></span></td>
      <td><?= htmlspecialchars($p['updated_at']) ?></td>
      <td><a href="<?= SITE_URL ?>/admin/page-edit.php?id=<?= $p['id'] ?>">Edit</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php else: ?>
  <div class="empty-state">No landing pages yet. Click "New landing page" to create your first webinar page.</div>
  <?php endif; ?>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
