
<?php
// Chat Area
require_once 'session.php';
require_once "database.php";

$d = new database;

if (isset($_POST['userID'])) {
    $userID = $_POST['userID'];
    
    // Call getall with the fetch parameter set to "moredetails"
    $chatResults = $d->getall("chat", "userID = ? AND whois = 'admin'", [$userID], "*", "moredetails");

    // Since $chatResults is now an array, you can check if it's not empty
    if (!empty($chatResults)) {
        $userRead = $chatResults[0]['userRead']; // Ensure this is the correct message
        echo json_encode(['userRead' => $userRead]);
    } else {
        echo json_encode(['userRead' => 0]);
    }
    exit();
}

?>