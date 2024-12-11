<?php
// session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
define("Regex", []);
require_once "include/session.php";
require "include/phpmailer/PHPMailerAutoload.php";
require_once "include/database.php";
require_once 'consts/home.php';
require_once "consts/resuming.php";
require_once "consts/store.php";
require_once 'consts/user.php';
require_once 'consts/checkout.php';
require_once "function/shop.php";
require_once "content/content.php";
require_once "content/display.php";
require_once "function/autorize.php";
require_once 'function/staffs.php';
require_once "function/store.php";
require_once "function/home.php";
require_once "function/products.php";
require 'function/ads.php';
require 'function/content.php';
require_once "function/users.php";
require_once 'consts/edit.php';
require_once 'consts/reels.php';
require_once '../function/payment.php';
$pay = new payment;

$d = new database; 
$v = new validate;
$s = new shop;
$i = new input;
$c = new content;
$d = new display;
$b = new bar;
$p = new products;
$u = new users;
$staff = new staffs;
$a = new ads;
require "include/ini-users.php";
$fu = new users;

$content = new web_content;

$date = date('Y-m-d');
// Lock screen
if(isset($_GET['lockscreen'])){
    $_SESSION['lockscreen'] = $dat['password'];
    header("Location: lock");
}
// Call for page e.g ?p= 
$page = "dashboard";
        if(isset($_GET['p'])) {
            $page = htmlspecialchars($_GET['p']);
        }
 // Delete Function
if(isset($_GET['pID'])){
    $contact_id = $_GET['pID'];
    $delete_contact = $d->delete("contact", "userID = ?", [$contact_id]);
}
// Tsuccess fetch from payment
if(isset($_GET['datefrom']) && isset($_GET['dateto']) && !empty($_GET['datefrom']) && !empty($_GET['dateto'])){
    $datefrom =  date("Y-m-d", strtotime($_POST['datefrom']))." 12:00:00"; 
    $dateto = date("Y-m-d", strtotime($_POST['dateto']))." 12:00:00"; 
}else{
    $datefrom = "";
    $dateto = $dateto = date("Y-m-d h:i:s");
}

// 
if(isset($_GET['id']) && isset($_GET['userads'])){
    $id = htmlspecialchars($_GET['id']);
    $ads = $d->getall("products", "userID = ?", [$id,], fetch: "moredetails");
}else{
    $ads = $d->getall("products", "date", []);
}

// Get admin Info
$userID = htmlspecialchars($_SESSION['adminSession']);
$adminID = $userID; 
$data = $d->getall("admins", "ID = ?", [$adminID], fetch: "details");
$cart_data = $d->getall("cart", fetch: "moredetails");

// charts info
$Tsucessp =  $d->getall("payment", "date >= ? and date <= ? and status = ?", [$datefrom, $dateto, "success"], fetch: "");
$Terrorp =  $d->getall("payment", "date >= ? and date <= ? and status != ?", [$datefrom, $dateto, "success"], fetch: "");
$activeADS = $d->getall("products", "status = ?", ["1"], fetch: "");
$soldoutADS = $d->getall("products", "status = ?", ["2"], fetch: "");
$draftADS = $d->getall("products", "status = ?", ["3"], fetch: "");
$blockedADS = $d->getall("products", "status = ?", ["0"], fetch: "");

// Get Next and previous function
$start = 0;
if(isset($_GET['s'])) {
  $start = (int)htmlspecialchars($_GET['s']);
}

// fetch Data
$student_data = $d->getall("students", "agreement = ?", ["1"], fetch: "moredetails");
$passengers = $d->getall("contact", "date != ? order by date desc LIMIT $start, 5", [""], fetch: "moredetails");
$student = $d->getall("students", "agreement = ?", ["1"], fetch: "moredetails");
$payments = $d->getall("payment", "transaction_id != ? and status != ? order by date DESC LIMIT 8", ["",""], fetch: "moredetails");
$rpayment = $d->getall("payment", "transaction_id != ? and status != ? order by date DESC LIMIT 7", ["",""], fetch: "moredetails");
$pads = $d->getall("products", "userID = ? order by date DESC LIMIT 8", [$userID], fetch: "moredetails");

// Table Count
$Tstudents= $d->getall("students", fetch: "");
$Tadmins = $d->getall("admins", fetch: "");
$Tcontact = $d->getall("contact", fetch: "");
$Tproducts = $d->getall("products", fetch: "");

// Fetch all chat
$chats = $d->getall("chat", "status = ?", ['0'], fetch: "moredetails"); 
// Get allusers 
$allusers = $d->getall("users", "addedby = ?", [$userID], fetch: "moredetails");

//default values
define("currency", $d->getcurrency($d->getsettings("default_currency")['meta_value']));
define("content", $d->getall("content", "ID = ?", ["1"], fetch: "details"));
define("website_name", content['website_name']);
?>


