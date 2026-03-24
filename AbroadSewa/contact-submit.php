<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

$name        = trim($input['name'] ?? '');
$email       = trim($input['email'] ?? '');
$phone       = trim($input['phone'] ?? '');
$destination = trim($input['destination'] ?? '');
$service     = trim($input['service'] ?? '');
$message     = trim($input['message'] ?? '');

// Basic validation
if (!$name || !$email || !$phone) {
    echo json_encode(['success' => false, 'message' => 'Required fields missing']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// Save to JSON file (simple storage — replace with DB as needed)
$file = __DIR__ . '/data/enquiries.json';
$entries = [];
if (file_exists($file)) {
    $entries = json_decode(file_get_contents($file), true) ?? [];
}
$entries[] = [
    'id'          => uniqid(),
    'name'        => $name,
    'email'       => $email,
    'phone'       => $phone,
    'destination' => $destination,
    'service'     => $service,
    'message'     => $message,
    'submitted_at'=> date('Y-m-d H:i:s'),
    'ip'          => $_SERVER['REMOTE_ADDR'] ?? '',
];
file_put_contents($file, json_encode($entries, JSON_PRETTY_PRINT));

// Send email notification (configure SMTP as needed)
$to      = 'info@abroadsewa.com.np';
$subject = 'New Enquiry from ' . $name;
$body    = "Name: $name\nEmail: $email\nPhone: $phone\nDestination: $destination\nService: $service\n\nMessage:\n$message";
$headers = "From: noreply@abroadsewa.com.np\r\nReply-To: $email";
@mail($to, $subject, $body, $headers);

echo json_encode(['success' => true, 'message' => 'Message received']);
