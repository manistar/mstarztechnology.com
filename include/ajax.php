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
        $whois       = htmlspecialchars($row['whois'], ENT_QUOTES, 'UTF-8');
        $chatMessage = htmlspecialchars($row['chat'], ENT_QUOTES, 'UTF-8');
        $chatDate    = htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8');

        if ($whois == "admin") {
            echo "
            <div class='d-flex justify-content-start mb-4'>
                <div class='msg_cotainer' style='width:auto; max-width:70%; position: relative; padding: 15px; border-radius: 8px;'>
                    $chatMessage
                     <div style='display: flex; align-items: center; justify-content: flex-end; margin-top: 8px;'>
                    <span class='msg_time' style='color:green; font-size: 12px; position: absolute; bottom: 5px; right: 5px;'>
                        " . date('H:i', strtotime($row['date'])) . "
                    </span>
                    </div>
                </div>
            </div>";
        } elseif ($whois == "user") {
            echo "
            <div class='d-flex justify-content-end mb-4'>
        <div class='msg_cotainer_send' style='width:auto; max-width:70%; position: relative; padding: 7px; border-radius: 8px; background-color: #d4fdd4;'>
                    $chatMessage
                    <div style='display: flex; align-items: center; position: relative;'>
                        <div style='display: flex; align-items: center; justify-content: flex-end; width: 100%;'>
                            <span class='msg_time_send' style='color:green; font-size: 12px;  margin-right: 30px;'>
                                " . date('H:i', strtotime($chatDate)) . "
                            </span>
                            <img id='statusIcon_" . htmlspecialchars($row['userID'], ENT_QUOTES, 'UTF-8') . "' class='status-icon' src='assets/images/status/tick_grey.png' alt='Status' style='width:14px; height:11px;'>
                        </div>
                    </div>
                </div>
    </div>";
        }
        
    }
    exit;
}



?>