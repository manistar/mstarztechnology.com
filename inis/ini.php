<?php
// session_start();

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
require_once "function/FingerprintAuth.php";
$d = new database;
$c = new content;
$P = new Project;
$p = new payment;
$R = new Reply;
$F = new FingerprintAuth;

$data     = "";
$script   = [];
$meta_tag = 'Music Platform';

$page = "dashboard";
if (isset($_GET['p'])) {
    $page = htmlspecialchars($_GET['p']);
}

if (isset($_GET['pID'])) {
    $product_id      = $_GET['pID'];
    $delete_products = $d->delete("cart", "productID = ?", [$product_id]);
}

if (isset($_SESSION['userSession'])) {
    $userID = htmlspecialchars($_SESSION['userSession'] ?? "");
    $data   = $d->getall("users", "ID = ?", [$userID], fetch: "details");
} else {
    $userID = "";
}


// if (isset($_GET['ID'])) {
//     $product_id = $_GET['ID'];
//     $single_data = $d->getall("products", "ID = ?", [$product_id], fetch: "details");


//     if ($single_data && is_array($single_data)) {
//     } else {
//         echo "Product not found or query failed.";
//     }
// }




// if (isset($_GET['ID'])) {
//     $user_id = htmlspecialchars($_GET['ID']);
//     // $link_data  = $d->getall("reels", "ID = ? AND status = ? AND label_status = ?", [$user_id, '1', '1'], fetch: "moredetails");
//     $link_data = $d->getall("reels", "whois = ?", [$user_id], fetch: "details");


//     if ($link_data && is_array($link_data)) {
//     } else {
//         echo "Reels not found or query failed.";
//     }
// }


if (isset($_GET['ID'])) {
    $product_id = htmlspecialchars($_GET['ID']); // Sanitize the input

    // Fetch product details
    $single_data = $d->getall("products", "ID = ?", [$product_id], fetch: "details");

    if (is_array($single_data) && !empty($single_data)) {
        // Fetch all images associated with the product
        $images = $d->getall("image_upload", "forID = ?", [$single_data['ID']], fetch: "moredetails");

        // Now fetch all rows manually from the PDOStatement object returned in 'moredetails' case
        $image_data = $images->fetchAll(PDO::FETCH_ASSOC); // Fetch all the images

        if (is_array($image_data) && !empty($images)) {
            // Images found; proceed with logic
        } else {
            echo "No images found for this product.";
        }
    } else {
        // echo "Product not found or query failed.";
    }
} 


if (isset($_GET['pID'])) {
    $product_id       = $_GET['pID'];
    $portfolio_single = $d->getall("user_details", "ID = ?", [$product_id]);
}

if (isset($_GET['pID'])) {
    $product_id  = $_GET['pID'];
    $blog_single = $d->getall("user_details", "ID = ?", [$product_id]);
}

$adminReels = $d->getall("reels", "whois = ? AND status = ? AND label_status = ?", ['admin', '0', '1'], fetch: "moredetails");
// print_r($adminReels);
$userReels = $d->getall("reels", "whois = ? AND status = ? AND label_status = ?", ['user', '1', '1'], fetch: "moredetails");
$news        = $d->getall("user_details", "label = ?", ["blog"], fetch: "moredetails");
$portfolio   = $d->getall("user_details", "label = ?", ["portfolios"], fetch: "moredetails");
$testimonial = $d->getall("user_details", "label = ?", ["testimonials"], fetch: "moredetails");
$what_i_do   = $d->getall("user_details", "label = ?", ["what_i_do"], fetch: "moredetails");
$edu         = $d->getall("user_details", "label = ?", ["edu"], fetch: "moredetails");
$job         = $d->getall("user_details", "label = ?", ["job"], fetch: "moredetails");
$profiles    = $d->getall("profile", "ID =?", ["63447143698e4"], fetch: "details");
//  $cart_data = $d->getall("cart", "productID = ?", [$userID], fetch: 'moredetails');
$cart_data    = $d->getall("cart", fetch: "moredetails");
$product_data = $d->getall("products", fetch: "moredetails");
$chats        = $d->getall("chat", "userID = ? ORDER by date asc", [$userID], fetch: "moredetails");

// $acct = $d->fastgetwhere($what_to_get="account", $where="userID = ?", $userID, $status="details");
?>