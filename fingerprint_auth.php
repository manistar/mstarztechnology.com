<?php
require_once "inis/ini.php";
// $fingerprintAuth = new FingerprintAuth();

$action = $_GET['action'] ?? '';

$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'] ?? '';

if ($action === 'register') {
    echo $fingerprintAuth->register($email);
} elseif ($action === 'complete_registration') {
    echo $fingerprintAuth->completeRegistration($data);
} elseif ($action === 'login') {
    echo $fingerprintAuth->login($email);
} elseif ($action === 'complete_login') {
    echo $fingerprintAuth->completeLogin($data);
} else {
    echo json_encode(['message' => 'Invalid action']);
}
?>