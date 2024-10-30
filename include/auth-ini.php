<?php
session_start();
require_once 'consts/Regex.php';
require_once 'include/database.php';
$d = new database;
require_once 'content/content.php';
$c = new content;
require_once 'consts/user.php';
require_once 'consts/shop.php';
require_once 'consts/checkout.php';
// require_once 'function/autorize.php';
// $u = new users;
require_once 'function/payment.php';
$p = new payment;
require 'include/ini-payment.php';
require_once "function/server.php";
$P = new Project; 
// $product_cart = $d->getall("cart", "productID = ?", [$ID], fetch: 'moredetails');
$script = [];
?>