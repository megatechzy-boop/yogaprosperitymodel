<?php
require_once __DIR__ . '/admin/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die('Method not allowed.');
}

// Honeypot spam trap - if this hidden field is filled, silently drop it.
if (!empty($_POST['website'])) {
    header('Location: ' . ($_POST['redirect_to'] ?? '/'));
    exit;
}

function clean($v) {
    return trim(strip_tags($v ?? ''));
}

$name = clean($_POST['name'] ?? '');
$email = clean($_POST['email'] ?? '');
$phone = clean($_POST['phone'] ?? '');
$message = clean($_POST['message'] ?? '');
$sourcePage = clean($_POST['source_page'] ?? 'homepage');
$redirectTo = $_POST['redirect_to'] ?? '/?contact=success';

if ($name === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    die('Please provide a valid name and email address, then go back and try again.');
}

$pdo = db_connect();

// 1. Save to database - this always happens first so no lead is ever lost,
//    even if the email below fails to send.
$stmt = $pdo->prepare("INSERT INTO leads (name, email, phone, message, source_page) VALUES (?,?,?,?,?)");
$stmt->execute([$name, $email, $phone, $message, $sourcePage]);

// 2. Work out which email address should be notified.
$notifyEmail = DEFAULT_NOTIFY_EMAIL;
if (strpos($sourcePage, 'webinar/') === 0) {
    $slug = substr($sourcePage, strlen('webinar/'));
    $pageStmt = $pdo->prepare("SELECT notify_email FROM landing_pages WHERE slug = ?");
    $pageStmt->execute([$slug]);
    $row = $pageStmt->fetch();
    if ($row && !empty($row['notify_email'])) {
        $notifyEmail = $row['notify_email'];
    }
}

// 3. Send email notification (best-effort - lead is already saved above).
$subject = "New enquiry from $sourcePage — $name";
$body = "New form submission\n\n"
      . "Source: $sourcePage\n"
      . "Name: $name\n"
      . "Email: $email\n"
      . "Phone: $phone\n"
      . "Message: $message\n";
$headers = "From: " . MAIL_FROM_NAME . " <" . MAIL_FROM_EMAIL . ">\r\n"
         . "Reply-To: $email\r\n"
         . "Content-Type: text/plain; charset=UTF-8";

@mail($notifyEmail, $subject, $body, $headers);

// 4. Redirect back with a success flag.
header('Location: ' . $redirectTo);
exit;
