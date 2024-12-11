
<?php
// Chat Area
require_once 'session.php';
require_once "database.php";

$d = new database;

// Ensure messageId is provided to identify which message is being updated

// Example PHP logic
if (isset($_POST['userID'])) {
    $userID = $_POST['userID'];
    $chat = $d->getall("chat", "userID = ? AND whois = 'user'", [$userID], fetch: "moredetails");
    $chatResults = $chat->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($chatResults)) {
        $isRead = $chatResults[0]['isRead']; // Ensure this is the correct message
        echo json_encode(['isRead' => $isRead]);
    } else {
        echo json_encode(['isRead' => 0]);
    }
    exit();
}
?>