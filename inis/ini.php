<?php
session_start();

// error_reporting(0);
error_reporting(E_ALL);
ini_set('display_errors', 1);

define("Regex", []);
require_once "include/session.php";
require_once "include/phpmailer/PHPMailerAutoload.php";
require_once "include/database.php";
require_once "content/content.php";
require_once "consts/user.php";
require_once "consts/shop.php";
require_once "consts/checkout.php";
require_once "function/server.php";
require_once 'function/payment.php';
require_once "function/reply.php";
$d = new database;
$c = new content;
$P = new Project;
$p = new payment;
$R = new Reply;

$data = "";
$script = [];
$meta_tag = 'Music Platform';

$page = "dashboard";
if(isset($_GET['p'])) {
    $page = htmlspecialchars($_GET['p']);
}

if(isset($_GET['pID'])){
    $product_id = $_GET['pID'];
    $delete_products = $d->delete("cart", "productID = ?", [$product_id]);
}

if(isset($_SESSION['userSession'])){
    $userID = htmlspecialchars($_SESSION['userSession'] ?? "");
    $data = $d->getall("users", "ID = ?", [$userID], fetch:"details");
}else{
    $userID = "";
}

if (isset($_GET['ID'])) {
    $product_id = $_GET['ID'];
    $single_data = $d->getall("products", "ID = ?", [$product_id], fetch: "details");

    if ($single_data && is_array($single_data)) {
    } else {
        echo "Product not found or query failed.";
    }
}

if(isset($_GET['pID'])){
    $product_id = $_GET['pID'];
    $portfolio_single = $d->getall("user_details", "ID = ?", [$product_id]);
}

if(isset($_GET['pID'])){
    $product_id = $_GET['pID'];
    $blog_single = $d->getall("user_details", "ID = ?", [$product_id]);
}

    $news = $d->getall("user_details", "label = ?", ["blog"], fetch: "moredetails");
    $portfolio = $d->getall("user_details", "label = ?", ["portfolios"], fetch: "moredetails");
    $testimonial = $d->getall("user_details", "label = ?", ["testimonials"], fetch: "moredetails");
    $what_i_do = $d->getall("user_details", "label = ?", ["what_i_do"], fetch:  "moredetails");
    $edu = $d->getall("user_details", "label = ?", ["edu"], fetch:  "moredetails");
    $job = $d->getall("user_details", "label = ?", ["job"], fetch: "moredetails");
    $profiles = $d->getall("profile", "ID =?", ["63447143698e4"], fetch:  "details");
    //  $cart_data = $d->getall("cart", "productID = ?", [$userID], fetch: 'moredetails');
    $cart_data = $d->getall("cart", fetch: "moredetails");
    $product_data = $d->getall("products", fetch: "moredetails");
?>