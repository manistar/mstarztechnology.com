<?php 
require_once 'session.php';
require_once 'database.php';
$d = new database;

if (isset($_POST['chatnow'])) {
    $myuser = htmlspecialchars($_POST['ID'], ENT_QUOTES, 'UTF-8'); // Sanitize user ID
    $chat = htmlspecialchars($_POST['chat'], ENT_QUOTES, 'UTF-8'); // Sanitize chat message

    // Insert the new chat using the newchat function
    $response = $d->newchat($chat, $myuser);

    // Return a JSON response
    if ($response) {
        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message.']);
    }
    exit; // Ensure no further output
}

if (isset($_GET['updatechat'])) {
    if (isset($_GET['ID']) && !empty($_GET['ID'])) {
        $myuser = htmlspecialchars($_GET['ID'], ENT_QUOTES, 'UTF-8'); // Sanitize the user ID
        $chats = $d->getall("chat", "userID = ?", [$myuser], fetch: "moredetails"); // Fetch chats

        // Display chats dynamically
        foreach ($chats as $row) {
            $whois = $row['whois'];
            if ($whois == "user") {
                 ?>
                 <div class="d-flex justify-content-start mb-4">
                   <div class="msg_cotainer" style="width:100%">
                       <?= $row['chat']; ?>
                     </div>
               </div> 
               <?php
            } elseif ($whois == "admin") {
                 ?>
             <div class="d-flex justify-content-end mb-4">
                     <div class="msg_cotainer_send">
                         <?= $row['chat']; ?>
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



// Handle retrieving chat messages
// if (isset($_GET['updatechat'])) {
//     if (isset($_GET['ID']) && !empty($_GET['ID'])) {
//         // Fetch chat data for the given user ID
//         $myuser = htmlspecialchars($_GET['ID'], ENT_QUOTES, 'UTF-8'); // Sanitize the user ID
//         $chats = $d->getall("chat", "userID = ?", [$myuser], fetch: "moredetails"); // Fetch chats

//         if (!empty($chats)) {
//             // Sanitize and output messages
//             foreach ($chats as $row) {
//                 $whois = htmlspecialchars($row['whois'], ENT_QUOTES, 'UTF-8');
//                 $chatMessage = htmlspecialchars($row['chat'], ENT_QUOTES, 'UTF-8');
//                 $chatDate = htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8');

//                 if ($whois == "user") {
//                     echo "
//                     <div class='d-flex justify-content-start mb-4'>
//                         <div class='msg_cotainer' style='width:100%'>
//                             $chatMessage
//                             <span class='msg_time' style='color:green; width:100%'>$chatDate</span>
//                         </div>
//                     </div>";
//                 } elseif ($whois == "admin") {
//                     echo "
//                     <div class='d-flex justify-content-end mb-4'>
//                         <div class='msg_cotainer_send'>
//                             $chatMessage
//                             <span class='msg_time_send' style='color:green; width:100%'>$chatDate</span>
//                         </div>
//                     </div>";
//                 }
//             }
//         } else {
//             // No chats found for the user
//             echo json_encode(['status' => 'success', 'chats' => [], 'message' => 'No chats available.']);
//         }
//     } else {
//         // Invalid or missing user ID
//         echo json_encode(['status' => 'error', 'message' => 'No valid User ID provided.']);
//     }
//     exit;
// }

?>