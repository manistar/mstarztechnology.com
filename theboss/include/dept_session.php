<?php 
session_start();
	if (!isset($_SESSION['EKSUTHdepartmentsession'])) {
		header('location: department_login.php'); 
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['EKSUTHdepartmentsession']);
		header("location: department_login.php");
	}
		$sess_id=$_SESSION['EKSUTHdepartmentsession'];
	
?>