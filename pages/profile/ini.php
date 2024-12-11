<?php
// Get user Info
$userID = htmlspecialchars($_SESSION['userSession']);
$uID = $userID; 
$data = $d->getall("users", "ID = ?", [$uID], fetch: "details");
?>