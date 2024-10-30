<?php include('include/server.php');
$link = $_GET['link'];
$dep = database::getInstance()->fastgetwhere($what_to_get="department",$where="Link=?", $what="$link",$limit="LIMIT 1", $status="details");
$count = database::getInstance()->fastgetwhere($what_to_get="department",$where="Link=?", $what="$link",$limit="LIMIT 1", $status="");

if($count < 1){
    header("Location:../message.php");
}elseif($dep['link_status'] == 'used' && $dep['password'] !=""){
    header("Location:department_login.php");
} elseif($dep['link_status'] == "new" && $dep['password'] ==""){
    session_start();
    $_SESSION['department_create_password_email'] = $dep['email'];
    $_SESSION['department_create_password_name'] = $dep['name'];

    header("Location:department_create_password.php");
}else{
    header("Location:http://www.eksuth.org.ng");
}
?>
