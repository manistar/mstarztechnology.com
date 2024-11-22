<?php

// Chat Area
require_once 'session.php';
require_once "database.php";

$d = new database;

// Handle sending a new chat message
if (isset($_POST['chatnow'])) {
    $chat = htmlspecialchars($_POST['chat'], ENT_QUOTES, 'UTF-8');
    $d->newchat($chat);
    // echo json_encode(["success" => true, "message" => "Chat sent successfully."]);
    exit;
}

// Handle retrieving chat messages
if (isset($_GET['updatechat'])) {
    $chats = $d->updatechat(); // Fetch chat data from the database

    // Sanitize and output messages
    foreach ($chats as $row) {
        $whois = htmlspecialchars($row['whois'], ENT_QUOTES, 'UTF-8');
        $chatMessage = htmlspecialchars($row['chat'], ENT_QUOTES, 'UTF-8');
        $chatDate = htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8');

        if ($whois == "admin") {
            echo "
            <div class='d-flex justify-content-start mb-4'>
                <div class='msg_cotainer' style='width:100%'>
                    $chatMessage
                    <span class='msg_time' style='color:green; width:100%'>$chatDate</span>
                </div>
            </div>";
        } elseif ($whois == "user") {
            echo "
            <div class='d-flex justify-content-end mb-4'>
                <div class='msg_cotainer_send'>
                    $chatMessage
                    <span class='msg_time_send' style='color:green; width:100%'>$chatDate</span>
                </div>
            </div>";
        }
    }
    exit;
}

?>
