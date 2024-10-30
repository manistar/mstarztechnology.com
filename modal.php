<?php 
if(isset($_GET['p']) && $_GET['p'] == "viwer") {
    require_once "pages/viewer/list.php";  
    // require_once "content/foot.php";
    return ;
}
    // session_start(); 
        $exclude_session = "";
    require_once "inis/ini.php";
    require_once "pages/page-ini.php";
    // require_once "content/foot.php";
?>