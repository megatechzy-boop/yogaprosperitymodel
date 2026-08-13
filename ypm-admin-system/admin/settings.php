<?php
require_once __DIR__ . '/includes/auth.php';
require_login();

$pdo = db_connect();
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save_settings'])) {
        set_setting('default_payment_link', trim($_POST['default_payment_link'] ?? ''));
        set_setting('default_notify_email', trim($_POST['default_notify_email'] ?? ''));
        $message = 'Settings saved.';
    }

    if (isset($_POST['change_password'])) {
        $current = $_POST['current_password'] ?? '';
        $new = $_POST['new_password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE id = ?");
        $stmt->execute([$_SESSION['admin_id']]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($current, $user['password_hash'])) {
            $error = 'Current password is incorrect.';
        } elseif (strlen($new) < 8) {
            $error = 'New password must be at least 8 characters.';
        } elseif ($new !== $confirm) {
            $error = 'New password and confirmation do not match.';
        } else {
            $hash = password_hash($new, PASSWORD_DEFAULT);
            $pdo->prepare("UPDATE admin_users SET password_hash = ? WHERE id = ?")->execute([$hash, $user['id']]);
            $message = 'Password updated successfully.';
        }
    }
}

$defaultPaymentLink = get_setting('default_payment_link');
$defaultNotifyEmail = get_setting('default_notify_email');

$page_title = 'Settings';
$active = 'settings';
include __DIR__ . '/includes/header.php';
?>
<h1>Settings</h1>
<p class="subtitle">Defaults used for new landing pages, and your admin account.</p>

<?php if ($message): ?><div class="success-box"><?= htmlspecialchars($message) ?></div><?php endif; ?>
<?php if ($error): ?><div class="error-box"><?= htmlspecialchars($error) ?></div><?php endif; ?>

<form method="post" class="card">
  <h2 style="margin-top:0;font-size:17px">Default values for new pages</h2>
  <div class="form-grid">
    <div class="field"><label>Default Razorpay payment link</label><input type="text" name="default_payment_link" value="<?= htmlspecialchars($defaultPaymentLink) ?>"></div>
    <div class="field"><label>Default notification email</label><input type="email" name="default_notify_email" value="<?= htmlspecialchars($defaultNotifyEmail) ?>"></div>
  </div>
  <button type="submit" name="save_settings" value="1" class="btn" style="margin-top:18px">Save settings</button>
</form>

<form method="post" class="card">
  <h2 style="margin-top:0;font-size:17px">Change admin password</h2>
  <div class="form-grid">
    <div class="field full"><label>Current password</label><input type="password" name="current_password" required></div>
    <div class="field"><label>New password</label><input type="password" name="new_password" required></div>
    <div class="field"><label>Confirm new password</label><input type="password" name="confirm_password" required></div>
  </div>
  <button type="submit" name="change_password" value="1" class="btn" style="margin-top:18px">Update password</button>
</form>

<?php include __DIR__ . '/includes/footer.php'; ?>
