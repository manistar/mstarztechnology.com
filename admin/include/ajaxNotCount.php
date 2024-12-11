<?php
require_once 'session.php';
require_once "database.php";
$d = new database;


$chat = []; 

// Fetch all unread messages (isRead = 0) with more details
$chat = $d->getall("chat", "isRead = 0 AND whois = 'user'", [], fetch: "moredetails");

// Initialize the response array
$response = [
    'count' => 0, // Default message count
    'isRead' => [],
    'messages' => []
];

if (!empty($chat)) {
    // Extract user IDs from the fetched messages
    $userIDs = array_unique(array_column($chat, 'userID'));

    // Count distinct user IDs
    $messageCount = count($userIDs);

    // Add isRead data to the response
    $isReadData = array_column($chat, 'isRead');

    // Prepare the response with actual data
    $response = [
        'count' => $messageCount,
        'isRead' => $isReadData,
        'messages' => $chat // Include the actual messages with more details
    ];
} 

// Return the response as JSON
// header('Content-Type: application/json');
// echo json_encode($response);


// $chat = [];
// if(is_array($chat)) {
// // Fetch all unread messages (isRead = 0) with more details
// $chat = $d->getall("chat", "isRead = 0 AND whois ='user'", [], fetch: "moredetails");
// // var_dump($chat); // Debugging: Check the fetched messages

// if (!empty($chat)) {
//     // Extract user IDs from the fetched messages
//     $userIDs = array_unique(array_column($chat, 'userID'));

//     // Count distinct user IDs
//     $messageCount = count($userIDs);

//     // Add isRead data to the output
//     $isReadData = array_column($chat, 'isRead');

//     // Prepare the response
//     $response = [
//         'count' => $messageCount,
//         'isRead' => $isReadData,
//         'messages' => $chat // Include the actual messages with more details
//     ];
// } else {
//     // No messages found
//     $response = [
//         'count' => 42,
//         'isRead' => [],
//         'messages' => [] // No messages found
//     ];
// }
// }
// Return the response as JSON
// echo json_encode($response);
?>