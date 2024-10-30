<?php
require_once 'inis/ini.php';
require_once 'include/database.php';
$d = new database;
require_once 'function/server.php';
$p = new project;
require_once "include/getall.php";
$title = "MSTARZ TECH";
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MSTARZ TECHNOLOGY HUB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="assets/css/vendor/slick.css">
        <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
        <link rel="stylesheet" href="assets/css/vendor/aos.css">
        <link rel="stylesheet" href="assets/css/plugins/feature.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <style>
            .action-btn-quick-view {
                border: none;
                /* Remove unwanted border */
                background: none;
                /* Ensure no background color */
                padding: 0;
                /* Remove extra padding */
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .add-to-cart-form {
                display: flex;
                /* Align items horizontally */
                gap: 8px;
                /* Add spacing between icons */
                align-items: center;
                /* Vertically align items */
            }

            .add-to-cart {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
                border: none;
                /* Remove unwanted borders */
                background-color: white;
                /* Adjust background to match design */
                border-radius: 8px;
                box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
                /* Optional shadow */
            }

            .product__cart i {
                font-size: 18px;
                /* Adjust icon size */
                color: #25a56a;
                /* Cart icon color */
            }

            .product-action-bottom {
                display: flex;
                justify-content: space-around;
                align-items: center;
                margin-top: 10px;
            }

            .product-action-btn,
            .add-to-cart {
                border: none;
                background: none;
                cursor: pointer;
                padding: 0;
            }

            .product-action-btn i,
            .add-to-cart i {
                display: inline-block;
                font-size: 18px;
                padding: 10px;
                border: 2px solid #ffffff;
                border-radius: 50%;
                background-color: #f5f5f5;
                color: #333;
            }

            .bankbtn {
                display: flex;
                justify-content: space-between;
            }

            .add-to-cart i {
                background-color: #fff;
                color: #28a745;
                /* Green for the cart icon */
            }

            .product-action-btn i:hover,
            .add-to-cart i:hover {
                background-color: #e1e1e1;
            }

            .product-action-btn {
                margin-right: 10px;
            }

            .add-to-cart {
                margin-left: 10px;
            }




            .read-more-button {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
                border-radius: 3px;
                margin-top: 10px;
            }

            .read-more-button:hover {
                background-color: #0056b3;
            }

            .more-text {
                display: none;
            }

            /* .product__cart {
                font-size: 14px;
                color: #25a56a;
                position: absolute;
                bottom: 16px;
                right: 12px;
                font-weight: 600;
                background: #fff;
                border-radius: 8px;
                padding: 8px 10px;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.5);
                transition: all 0.5s ease-in-out;
            } */

            .product__cart:hover {
                background: #f05050;
                color: #fff;
            }

            .header__action-btn img {
                border-radius: 50%;
                width: 40px;
                height: 40px;
                object-fit: cover;
            }

            .header-right {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .header__drop {
                position: absolute;
                background: white;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                display: none;
            }

            .header__action:hover .header__drop {
                display: block;
            }

            /* Align profile image and dropdown */
            .header-right {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .profile-dropdown {
                position: relative;
            }

            .user-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
            }

            /* Ensuring the logo, nav, and profile/cart sections align in a row */
            .header-wrapper {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 10px 15px;
            }

            .logo img {
                max-height: 50px;
                /* Ensure the logo has a max height to align well with nav and profile */
            }

            .mainmenu-nav {
                flex-grow: 1;
                /* This makes the nav take up available space */
            }

            .header-right {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            /* Profile dropdown styling remains the same */
            .profile-dropdown {
                position: relative;
            }

            .user-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
            }

            .header__drop {
                position: absolute;
                top: 100%;
                right: 0;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 200px;
                display: none;
                z-index: 10;
                padding: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .profile-dropdown:hover .header__drop {
                display: block;
            }

            /* Adjust the size of favicons in the dropdown */
            .header__drop i {
                font-size: 10px;
                /* Smaller icon size */
                margin-right: 8px;
                /* Space between the icon and text */
                vertical-align: middle;
                /* Align icon with text */
            }

            .header__drop a {
                display: flex;
                /* Aligns icon and text horizontally */
                align-items: center;
                /* Ensures vertical alignment */
                padding: 8px 10px;
                color: #333;
                text-decoration: none;
                transition: background-color 0.3s ease;
            }

            .header__drop a:hover {
                background-color: #f4f4f4;
            }

            .cart-icon {
                font-size: 10px;
                /* Adjust the size as needed */
                color: #333;
                /* Optional: Change icon color */
            }

            /*  */
            .icon-container {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .notification-icon,
            .cart-icon {
                position: relative;
                font-size: 24px;
                color: #fff;
            }

            .notification-count,
            .cart-count {
                position: absolute;
                top: -10px;
                right: -10px;
                background-color: red;
                color: white;
                font-size: 12px;
                border-radius: 50%;
                width: 18px;
                height: 18px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-weight: bold;
            }

            .user-avatar img {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                border: 2px solid green;
                object-fit: cover;
            }
        </style>
    </head>

    <body class="template-color-1 spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="70">
        <header class="rn-header header--fixed header--sticky">
            <div class="header-wrapper row align-items-center">
                <!-- Logo Section -->
                <div class="col-lg-2 col-6 d-flex align-items-center">
                    <div class="logo">
                        <a href="index.php">

                            <img src="assets/images/logo/logo.png" alt="MSTARZ TECH">
                        </a>
                    </div>
                </div>

                <!-- Main Navigation & Profile Section (wrapped in flex container) -->
                <div class="col-lg-10 col-6 d-flex align-items-center justify-content-between">
                    <!-- Navigation Section -->
                    <nav class="mainmenu-nav navbar-example2 d-none d-xl-block">
                        <ul class="primary-menu nav nav-pills">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                            <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link" href="#resume">Resume</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li> -->
                            <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="?p=contact">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        </ul>
                    </nav>

                    <!-- Profile and Cart Section -->
                    <div class="header-right d-flex align-items-center">
                        <div class="header__action profile-dropdown">
                            <?php if (is_array($data)): ?>
                                <a class="header__action-btn" href="#">
                                        <img src=" upload/profile/<?= $data['upload_image'] ?>" alt="User Avatar"
                                    class="user-avatar">
                                </a>
                                <div class="header__drop">
                                    <a href="#">Welcome
                                        <?= $data['first_name'] ?>!
                                    </a>
                                    <a href="?p=profile.php"><i class="fas fa-user"></i> My Profile</a>
                                            <a href="?p=profile-settings"><i class="fas fa-cog"></i> Profile Settings</a>
                                    <a href="?p=favourites.php"><i class="fas fa-heart"></i> My Favourites</a>
                                    <a href="?p=cart.php"><i class="fas fa-shopping-cart"></i> My Orders</a>
                                    <a href="index.php?logout"><i class="fas fa-lock"></i> Logout</a>
                                </div>
                            <?php else: ?>
                                <a class="header__action-btn" href="#">
                                    <img src="assets/images/profile/avatar2.png" alt="Guest Avatar" class="user-avatar">
                                        </a>
                                    <div class="header__drop">
                                        <a href="login">Please Login to Continue!</a>
                                        <a href="login"><i class="far fa-lock"></i> Login</a>
                                    </div>
                                <?php endif; ?>
                        </div>

                        <div class="header__action header__action--cart">
                            <span id="cat_no">
                                <?= $P->no_products($userID) ?>
                            </span>
                            <a class="header__action-btn" href="?p=cart">
                                <i class="fas fa-shopping-cart cart-icon"></i>
                            </a>
                        </div>

                        <div class="hamberger-menu d-block d-xl-none">
                            <i id="menuBtn" class="feather-menu humberger-menu"></i>
                        </div>
                        <div class="close-menu d-block">
                            <span class="closeTrigger">
                                <i data-feather="x"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    </body>

</html>