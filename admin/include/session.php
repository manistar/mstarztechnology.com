<?php

session_start(); // Start the session

	// $_SESSION['userSession'] = "783736";
	if (!isset($_SESSION['adminSession'])) {
		header('location: login?message=Please Sign In First'); 
        exit;
	}
	
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

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['adminSession']);
    // unset($_SESSION['lockscreen']);
    // unset($_SESSION['usertypeSession']);
    header("location: login");
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