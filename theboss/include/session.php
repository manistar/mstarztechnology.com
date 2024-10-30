<?php 
session_start();
	if (!isset($_SESSION['AdminSession'])) {
		header('location: login.php'); 
	}

	$userID = htmlspecialchars($_SESSION['AdminSession']);
	$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
	if(isset($_SESSION['lockscreen']) && $curPageName != "lock.php"){
		header("Location: lock.php");
	}
	// $usertype = htmlspecialchars($_SESSION['usertypeSession']);
	
	if (isset($_GET['logout']) || $userID == "293498") {
	session_destroy();
	unset($_SESSION['AdminSession']);
	unset($_SESSION['lockscreen']);
	// unset($_SESSION['usertypeSession']);
	header("location: login.php");
}




	// if (isset($_GET['logout'])) {
	// 	session_destroy();
	// 	unset($_SESSION['AdminSession']);
	// 	header("location: login.php");
	// }
		$sess_id=$_SESSION['AdminSession'];

		
	
?>