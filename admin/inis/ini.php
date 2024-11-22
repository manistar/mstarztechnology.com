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
require_once '../function/payment.php';
$pay = new payment;
// require_once "include/ini-products.php";

// require_once "function/store.php";
// $i = new input;
// $a = new ads; 
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
// $plan = new plans;
$content = new web_content;
// $u = new fontusers;
// $u = new fontusers;
// $userID = "";
$date = date('Y-m-d');

if(isset($_GET['lockscreen'])){
    $_SESSION['lockscreen'] = $dat['password'];
    header("Location:lock");
}

$page = "dashboard";
        if(isset($_GET['p'])) {
            $page = htmlspecialchars($_GET['p']);
        }

 // Delete Function
if(isset($_GET['pID'])){
    $contact_id = $_GET['pID'];
    $delete_contact = $d->delete("contact", "userID = ?", [$contact_id]);
}

// if(isset($_GET['datefrom']) && isset($_GET['dateto']) && !empty($_GET['datefrom']) && !empty($_GET['dateto'])){
//     $datefrom =  date("Y-m-d", strtotime($_POST['datefrom']))." 12:00:00"; 
//     $dateto = date("Y-m-d", strtotime($_POST['dateto']))." 12:00:00"; 
// }else{
//     $datefrom = "";
//     $dateto = $dateto = date("Y-m-d h:i:s");
// }

if (isset($_GET['datefrom']) && isset($_GET['dateto']) && !empty($_GET['datefrom']) && !empty($_GET['dateto'])) {
    $datefrom = date("Y-m-d H:i:s", strtotime($_GET['datefrom']));
    $dateto   = date("Y-m-d H:i:s", strtotime($_GET['dateto']));
} else {
    $datefrom = "1970-01-01 00:00:00"; // Default earliest date
    $dateto   = date("Y-m-d H:i:s");  // Current date and time
}


// if (isset($_GET['datefrom']) && isset($_GET['dateto']) && !empty($_GET['datefrom']) && !empty($_GET['dateto'])) {
//     // Parse GET input to match DATETIME format in the database
//     $datefrom = date("Y-m-d H:i:s", strtotime($_GET['datefrom'] . " 00:00:00")); 
//     $dateto = date("Y-m-d H:i:s", strtotime($_GET['dateto'] . " 23:59:59")); 
// } else {
//     // Default values if no input is provided
//     $datefrom = date("Y-m-01 00:00:00"); // Start of the current month
//     $dateto = date("Y-m-d H:i:s");       // Current date and time
// }

// Debugging to check values
// var_dump($datefrom, $dateto);




if(isset($_GET['id']) && isset($_GET['userads'])){
    $id = htmlspecialchars($_GET['id']);
    $ads = $d->getall("products", "userID = ?", [$id,], fetch: "moredetails");
}else{
    $ads = $d->getall("products", "date", []);
}

// $ads = $d->getall("products", "ID = ?", [$userID], fetch: "moredetails");
// Get admin Info
$userID = htmlspecialchars($_SESSION['adminSession']);
$adminID = $userID; 
$data = $d->getall("admins", "ID = ?", [$adminID], fetch: "details");
$cart_data = $d->getall("cart", fetch: "moredetails");

//var_dump($data); // Check the type and content of $user
// $ID = $userID; 
// $pro = $d->getall("profile", "ID = ?", ['userID'], fetch: "details");



// Debugging to ensure results are correct
// var_dump($Tsucessp);



$Tsucessp = $d->getall("payment", "date >= ? and date <= ? and status = ?", [$datefrom, $dateto, "success"], fetch: "");
$Terrorp =  $d->getall("payment", "date >= ? and date <= ? and status != ?", [$datefrom, $dateto, "success"], fetch: "");
$activeADS = $d->getall("products", "status = ?", ["1"], fetch: "");
$soldoutADS = $d->getall("products", "status = ?", ["2"], fetch: "");
$draftADS = $d->getall("products", "status = ?", ["3"], fetch: "");
$blockedADS = $d->getall("products", "status = ?", ["0"], fetch: "");


$start = 0;
if(isset($_GET['s'])) {
  $start = (int)htmlspecialchars($_GET['s']);
}

$student_data = $d->getall("students", "agreement = ?", ["1"], fetch: "moredetails");
// $contact = $d->getall("contact", fetch: "moredetails");

$passengers = $d->getall("contact", "date != ? order by date desc LIMIT $start, 5", [""], fetch: "moredetails");
$student = $d->getall("students", "agreement = ?", ["1"], fetch: "moredetails");

$payments = $d->getall("payment", "transaction_id != ? and status != ? order by date DESC LIMIT 8", ["",""], fetch: "moredetails");

// recent tabs 
// $rpayment = $d->getall(
//     "payment", 
//     "transaction_id IS NOT NULL AND transaction_id != '' AND status != 'pending' ORDER BY date DESC LIMIT 7", 
//     [], 
//     "*", fetch: 
//     "moredetails"
// );

// $rpayment = $d->getall("payment", "transaction_id != ? and status != ? order by date DESC LIMIT $start, 7", ["",""], fetch: "moredetails");
$rpayment = $d->getall("payment", "transaction_id != ? and status != ? order by date DESC LIMIT 7", ["",""], fetch: "moredetails");
// $rpayment = $d->getall("payment", "transaction_id != ? and status != ? order by date DESC LIMIT 7", ["", ""], fetch: "moredetails")->fetchAll();

// $rpayment = $d->getall("payment", "1 ORDER BY date DESC LIMIT 7", [], fetch: "moredetails");

$pads = $d->getall("products", "userID = ? order by date DESC LIMIT 8", [$userID], fetch: "moredetails");
// var_dump($pads);

$Tstudents= $d->getall("students", fetch: "");
$Tadmins = $d->getall("admins", fetch: "");
$Tcontact = $d->getall("contact", fetch: "");
$Tproducts = $d->getall("products", fetch: "");

// Fetch unread messages for the notification count
// $unreadNotifications = $d->getall("chat", "userID = ? AND isRead = 0", [$userID], fetch: "details");
$chats = $d->getall("chat", "status = ?", ['0'], fetch: "moredetails"); 
// $allusers = $d->getall("chat", "userID = ?", ["$userID"], fetch:"moredetails");
// $chats  = $d->getall("chat", "userID = ?", [$userID], fetch: "moredetails");
$allusers = $d->getall("users", "addedby = ?", [$userID], fetch: "moredetails");
// $allusers = $d->fastgetwhere($what_to_get="account", $where="addedby = ?", "$userID", $status="moredetails");
// $news = $d->getall("user_details", "label = ?", ["blog"], fetch: "moredetails");

// Safely count the results

// var_dump($unreadNotifications);

//default values
define("currency", $d->getcurrency($d->getsettings("default_currency")['meta_value']));
define("content", $d->getall("content", "ID = ?", ["1"], fetch: "details"));
define("website_name", content['website_name']);

?>


