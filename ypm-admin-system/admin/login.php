<?php
require_once __DIR__ . '/includes/db.php';

if (!empty($_SESSION['admin_id'])) {
    header('Location: ' . SITE_URL . '/admin/index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $pdo = db_connect();
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_username'] = $user['username'];
        header('Location: ' . SITE_URL . '/admin/index.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login — Yoga Prosperity Model</title>
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="<?= SITE_URL ?>/admin/assets/admin.css">
</head>
<body>
<div class="login-wrap">
  <div class="login-card">
    <h1>Admin Login</h1>
    <p>Yoga Prosperity Model — management panel</p>
    <?php if ($error): ?><div class="error-box"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="post">
      <div class="field"><label>Username</label><input type="text" name="username" required autofocus></div>
      <div class="field"><label>Password</label><input type="password" name="password" required></div>
      <button class="btn" type="submit" style="width:100%">Log in</button>
    </form>
  </div>
</div>
</body>
</html>
