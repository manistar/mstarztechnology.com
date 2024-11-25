<?php
ob_start(); // Start output buffering
require_once 'session.php';
require_once 'database.php';
$d = new database;


if(isset($_POST['updateChat'])){
    $userID = $_POST['ID'];

        // Data to update
        $data = ["isRead" => 1];
    
        // Construct the WHERE clause as a string directly
        $where= "userID = '$userID' AND whois = 'user'";
    
        // Call the update method directly with the WHERE clause as a string
        $updateResult = $d->update("chat", $data, $where);
    // $d->updateCount($chat, $isRead);
}
?>

