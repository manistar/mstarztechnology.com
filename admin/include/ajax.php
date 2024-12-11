<?php
require_once 'session.php';
require_once 'database.php';
$d = new database;

if (isset($_POST['chatnow'])) {
    $myuser = htmlspecialchars($_POST['userID']);
    $chat   = htmlspecialchars($_POST['chat']);
    $d->newchat($chat, $myuser);
}

if (isset($_GET['updatechat'])) {
    if (isset($_GET['ID']) && !empty($_GET['ID'])) {
        $myuser = htmlspecialchars($_GET['ID'], ENT_QUOTES, 'UTF-8'); // Sanitize the user ID
        $chats  = $d->getall("chat", "userID = ?", [$myuser], fetch: "moredetails"); // Fetch chats

        // Display chats dynamically
        foreach ($chats as $row) {
            $whois = $row['whois'];
            if ($whois == "user") {
                ?>
                <div class="d-flex justify-content-start mb-4">
                    <div class="msg_cotainer" style="width:100%">
                        <?= $row['chat']; ?>
                        <span class="msg_time_send" style="color:green; width:100%"><?= $row['date']; ?></span>
                    </div>
                </div>
                <?php
            } elseif ($whois == "admin") {
                ?>
                <div class="d-flex justify-content-end mb-4">
                    <div class="msg_cotainer_send"
                        style="width:auto; max-width:70%; position: relative; padding: 7px; border-radius: 8px; background-color: #d4fdd4;">
                        <?= $row['chat']; ?>

                        <div style="display: flex; align-items: center; position: relative;">
                            <span class='msg_time_send' style='color:green; font-size: 12px; margin-right: 5px; z-index: 1;'>
                                <?= date('H:i', strtotime($row['date'])); ?>
                            </span>
                            <img id='statusIcon_<?= $row['userID']; ?>' class='status-icon' src='assets/status/tick_grey.png'
                                alt='Status' style='width:14px; height:12px; z-index: 0;'>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    } else {
        // Handle the case where no ID is provided
        echo json_encode(['status' => 'error', 'message' => 'No User ID provided here.']);
    }
}

?>