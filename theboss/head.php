<?php 
include('include/session.php'); 

include('include/server.php');
require_once 'include/getall.php';

if(isset($_GET['lockscreen'])){
    $_SESSION['lockscreen'] = $acct['password'];
    header("Location:lock.php");
}
?>