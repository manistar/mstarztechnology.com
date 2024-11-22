<?php

session_start(); // Start the session

// if(!isset($_SESSION['adminSession'])){
//     header('location: login?message=Please Sign In First'); 
// }

// if (isset($_GET['logout'])) {
//     // Set the session 'lockscreen' before destroying the session
//     $_SESSION['lockscreen'] = "adminSession";

//     session_destroy();
//     unset($_SESSION['adminSession']);
//     header("location: login");
//     exit; // Add this line to stop further execution
// }

// if(isset($_SESSION['adminSession'])){
//     $userID = $_SESSION['adminSession'];
// }else{
//     session_destroy();
//     header("location: login");
// } 


// session_start(); // Start or resume session


// session_start();
	// $_SESSION['userSession'] = "783736";
	if (!isset($_SESSION['adminSession'])) {
		header('location: login?message=Please Sign In First'); 
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['adminSession']);
		// unset($_SESSION['lockscreen']);
        // unset($_SESSION['usertypeSession']);
		header("location: login");
	}



// if (!isset($_SESSION['adminSession'])) {
//     header('location: login?message=Please Sign In First');
//     exit;
// }

$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);

// Check if the page is not the lock page and the screen is locked
if (isset($_SESSION['lockscreen']) && $curPageName != "lock") {
    // Unset the lockscreen session variable
    unset($_SESSION['lockscreen']);
    $id = $_SESSION['adminSession'];
    session_destroy();
    session_start();
    $_SESSION['ID'] = $id;
    header("location: lock");
    exit;
}


// If none of the above conditions are met, the user is authenticated and on a valid page
// Check if adminSession is set, otherwise, redirect to login page
if (!isset($_SESSION['adminSession'])) {
    header("location: login");
    exit;
} else {
    $userID = $_SESSION['adminSession'];
}
?>
