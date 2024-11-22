<?php
session_start();
// session_set_cookie_params([
//     'lifetime' => 86400,  // Session lasts for 24 hours
//     'path' => '/',
//     'domain' => 'localhost/mstarzteh.com',
//     'secure' => true,  // Set to true if using HTTPS
//     'httponly' => true,
// ]);

// if (!isset($exclude_session)) {
//     if (!isset($_SESSION['userSession'])) {
//         header('location: login');
//     }

//     if (isset($_SESSION['userSession'])) {
//          $userID = $_SESSION['userSession'];
//     } else {
//         session_destroy();
//         header('location: login');
//     }
// }

// if (isset($_GET['logout'])) {
//     session_destroy();
//     unset($_SESSION['userSession']);
//     header('location: login');
// }
// if (isset($_SESSION['userSession'])) {
//      $userID = $_SESSION['userSession'];
// }




// another below




// Start session if not already started
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// // Redirect to login if userSession is not set
// if (!isset($_SESSION['userSession'])) {
//     header('Location: /mstarztech.com/login'); // Correct path
//     exit();
// }

// // Assign userID if session exists
// $userID = $_SESSION['userSession'];

// // Handle logout
// if (isset($_GET['logout'])) {
//     session_destroy();
//     unset($_SESSION['userSession']);
//     header('Location: /mstarztech.com/login'); // Correct path
//     exit();
// }





// 



// Check if session management should be excluded
if (!isset($exclude_session)) {
    // Redirect to login if the user is not signed in
    if (!isset($_SESSION['userSession'])) {
        header('location: login');
        exit; // Ensure the script stops executing after the redirect
    }

    // Assign the user ID from the session if the user is signed in
    if (isset($_SESSION['userSession'])) {
        $userID = $_SESSION['userSession'];
    } else {
        // If the session is invalid, destroy it and redirect to login
        session_destroy();
        header('location: login');
        exit;
    }
}

// Handle logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userSession']);
    header('location: login');
    exit;
}

// Check and assign user ID if the session exists
if (isset($_SESSION['userSession'])) {
    $userID = $_SESSION['userSession'];
}

?>