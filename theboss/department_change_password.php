<?php  
include('include/dept_session.php');
include('include/server.php');

if(isset($_POST['change_department_password'])){
    if(isset($_SESSION['EKSUTHdepartmentsession'])){
        $sess_id = $_SESSION['EKSUTHdepartmentsession'];
        $dep = database::getInstance()->fastgetwhere($what_to_get="department",$where="email=?", $what="$sess_id",$limit="LIMIT 1", $status="details");
    }
    $realpassword = $dep['password'];
    $password = $_POST['current_password'];
    if(password_verify($password, $realpassword)){
    database::getInstance()->change_department_password();
    }else{
        echo   $error = '<div class="alert alert-danger">
        <strong>Warning!</strong> Current Password Incorrect.
    </div>';
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>EKSUTH| Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="NSP login page" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<!--clock init-->
</head> 
<body>
								<!--/login-->
								
									   <div style="background-color:white!important;" class="error_page">
												<!--/login-top-->
												
													<div style="background-color:transparent; border:1px solid #69be00;" class="error-top">
													
													    <div  class="login">
                                                        <h3 style="color:#69be00" class="inner-tittle t-inner">Change Password</h3>
                                                      
																<form action="department_change_password.php" method="post">
                                                                
                                                                        <input type="password" name="current_password" value="" placeholder="Current Password">
                                                                        <input type="password" name="password" value="" placeholder="New Password">
                                                                        <input type="password" name="cpassword" value="" placeholder="Confirm Password">
																		<div class="submit"><input style="background-color:#69be00; border-color:#69be00"  type="submit" name="change_department_password"  value="Change Password" ></div>
																		<div class="clearfix"></div>
																		
																	
																	</form>
														</div>

														
													</div>
													
													
												<!--//login-top-->
										   </div>
						
										  	<!--//login-->
										    <!--footer section start-->
										<div class="footer">
												
										</div>
									<!--footer section end-->
									<!--/404-->
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>