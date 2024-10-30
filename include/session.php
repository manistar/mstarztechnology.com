<?php
if (!isset($exclude_session)) {
    if (!isset($_SESSION['userSession'])) {
        header('location: login');
    }

    if (isset($_SESSION['userSession'])) {
         $userID = $_SESSION['userSession'];
    } else {
        session_destroy();
        header('location: login');
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userSession']);
    header('location: login');
}
if (isset($_SESSION['userSession'])) {
     $userID = $_SESSION['userSession'];
}
?>