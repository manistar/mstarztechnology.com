<?php 
session_start();
if (!isset($_SESSION['attendanceID'])) {
    ?>
        <script type="text/javascript">
             window.location="attendance_login.php";
         </script>
    <?php
}elseif (isset($_SESSION['adminID'])) {
		unset($_SESSION['adminID']);
}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['attendanceID']);
		header("location: login.php");
	}
		$sess_id=$_SESSION['attendanceID'];
	
?>