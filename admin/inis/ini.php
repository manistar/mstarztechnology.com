<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
define("Regex", []);
require_once "include/session.php";
require "include/phpmailer/PHPMailerAutoload.php";
require_once "include/database.php";
require_once 'consts/home.php';
require_once "consts/resuming.php";
require_once "consts/store.php";
require_once 'consts/checkout.php';
require_once "function/shop.php";
require_once "content/content.php";
require_once "function/autorize.php";
require_once 'function/staffs.php';
require_once "function/store.php";
// require 'function/ads.php';
require 'function/content.php';

// require_once "function/store.php";
// $i = new input;
// $a = new ads; 
$d = new database; 
$v = new validate;
$s = new shop;
$i = new input;
$c = new content;
$staff = new staffs;
// $plan = new plans;
$content = new web_content;
// $u = new fontusers;
// $u = new fontusers;
// $userID = "";
$date = date('Y-m-d');

if(isset($_GET['lockscreen'])){
    $_SESSION['lockscreen'] = $dat['password'];
    header("Location:lock.php");
}

$page = "dashboard";
        if(isset($_GET['p'])) {
            $page = htmlspecialchars($_GET['p']);
        }



if(isset($_GET['datefrom']) && isset($_GET['dateto']) && !empty($_GET['datefrom']) && !empty($_GET['dateto'])){
    $datefrom =  date("Y-m-d", strtotime($_POST['datefrom']))." 12:00:00"; 
    $dateto = date("Y-m-d", strtotime($_POST['dateto']))." 12:00:00"; 
}else{
    $datefrom = "";
    $dateto = $dateto = date("Y-m-d h:i:s");
}



// Get admin Info
$userID = htmlspecialchars($_SESSION['adminSession']);
$adminID = $userID; 
$data = $d->getall("admins", "ID = ?", [$adminID], fetch: "details");
//var_dump($data); // Check the type and content of $user




// charts info 
// $Tsucessp = $d->getall("payment", "date >= ? and date <= ? and status = ?", [$datefrom, $dateto, "success"], fetch: "");
$Terrorp =  $d->getall("payment", "date >= ? and date <= ? and status != ?", [$datefrom, $dateto, "success"], fetch: "");
$activeADS = $d->getall("products", "status = ?", ["1"], fetch: "");
$soldoutADS = $d->getall("products", "status = ?", ["2"], fetch: "");
$draftADS = $d->getall("products", "status = ?", ["3"], fetch: "");
$blockedADS = $d->getall("products", "status = ?", ["0"], fetch: "");


$start = 0;
if(isset($_GET['s'])) {
  $start = (int)htmlspecialchars($_GET['s']);
}


$passengers = $d->getall("contact", "date != ? order by date desc LIMIT $start, 5", [""], fetch: "moredetails");
$student = $d->getall("students", "agreement = ?", ["1"], fetch: "moredetails");

$payments = $d->getall("payment", "transaction_id != ? and status != ? order by date DESC LIMIT 8", ["",""], fetch: "moredetails");

// recent tabs 
$rpayment = $d->getall("payment", "transaction_id != ? and status != ? order by date DESC LIMIT 7", ["",""], fetch: "moredetails");

$pads = $d->getall("products", "userID = ? order by date DESC LIMIT 8", [$userID], fetch: "moredetails");
// var_dump($pads);

$Tstudents= $d->getall("students", fetch: "");
$Tadmins = $d->getall("admins", fetch: "");
$Tcontact = $d->getall("contact", fetch: "");


//default values
define("currency", $d->getcurrency($d->getsettings("default_currency")['meta_value']));
define("content", $d->getall("content", "ID = ?", ["1"], fetch: "details"));
define("website_name", content['website_name']);

?>

