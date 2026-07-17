<?php
declare(strict_types=1);

require dirname(__DIR__) . '/includes/config.php';

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Please submit the form.']);
    exit;
}

if (!verify_csrf($_POST['csrf_token'] ?? null)) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'message' => 'Please refresh the page and try again.']);
    exit;
}

if (!empty($_POST['website'] ?? '')) {
    echo json_encode(['ok' => true, 'message' => 'Thank you. We will be in touch shortly.']);
    exit;
}

$now = time();
$_SESSION['lead_attempts'] = array_values(array_filter($_SESSION['lead_attempts'] ?? [], static fn ($timestamp): bool => $timestamp > $now - 900));
if (count($_SESSION['lead_attempts']) >= 10) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'message' => 'Please try again in a few minutes.']);
    exit;
}

function clean_lead_field(string $value, int $limit): string
{
    $value = trim(strip_tags($value));
    $value = preg_replace('/\s+/', ' ', $value) ?? '';

    return substr($value, 0, $limit);
}

$name = clean_lead_field((string) ($_POST['name'] ?? ''), 80);
$email = clean_lead_field((string) ($_POST['email'] ?? ''), 120);
$phone = clean_lead_field((string) ($_POST['phone'] ?? ''), 20);
$program = clean_lead_field((string) ($_POST['program'] ?? 'Clarity call'), 80);
$message = clean_lead_field((string) ($_POST['message'] ?? ''), 1200);

$errors = [];
if (strlen($name) < 2) {
    $errors[] = 'Please enter your name.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}
if (!preg_match('/^[0-9+\s]{7,20}$/', $phone)) {
    $errors[] = 'Please enter a valid phone number.';
}

if ($errors) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'message' => implode(' ', $errors)]);
    exit;
}

$_SESSION['lead_attempts'][] = $now;
$lead = [
    'created_at' => date(DATE_ATOM),
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'program' => $program,
    'message' => $message,
];

$subject = 'New Yoga Prosperity Model enquiry: ' . $program;
$body = "New website enquiry\n\n"
    . "Name: {$name}\n"
    . "Email: {$email}\n"
    . "Phone: {$phone}\n"
    . "Interest: {$program}\n\n"
    . "Message:\n{$message}\n";
$headers = [
    'From: Yoga Prosperity Model <' . SUPPORT_EMAIL . '>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'Content-Type: text/plain; charset=UTF-8',
];
$sent = function_exists('mail') && mail(SUPPORT_EMAIL, $subject, $body, implode("\r\n", $headers));

$storageDir = dirname(__DIR__) . '/storage';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0755, true);
}
file_put_contents($storageDir . '/leads.jsonl', json_encode($lead, JSON_UNESCAPED_SLASHES) . PHP_EOL, FILE_APPEND | LOCK_EX);

echo json_encode([
    'ok' => true,
    'message' => $sent
        ? 'Thank you. Your enquiry has been sent. Our team will contact you shortly.'
        : 'Thank you. Your enquiry has been received. Our team will contact you shortly.',
]);
