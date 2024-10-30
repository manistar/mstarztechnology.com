<?php

// session_start(); // Start the session

if(!isset($_SESSION['adminSession'])){
    header('location: login.php?message=Please Sign In First'); 
}

if (isset($_GET['logout'])) {
    // Set the session 'lockscreen' before destroying the session
    $_SESSION['lockscreen'] = "adminSession";

    session_destroy();
    unset($_SESSION['adminSession']);
    header("location: login.php");
    exit; // Add this line to stop further execution
}

if(isset($_SESSION['adminSession'])){
    $userID = $_SESSION['adminSession'];
}else{
    session_destroy();
    header("location: login.php");
} 
?>
