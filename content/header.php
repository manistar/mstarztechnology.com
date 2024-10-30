<?php
$title = "MSTARZ TECH";
?>
<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MSTARZ TECHNOLOGY HUB</title>
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
        <!-- CSS 
    ============================================ -->
        <!-- Cart icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!--  -->
        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/slick.css">
        <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
        <link rel="stylesheet" href="assets/css/vendor/aos.css">
        <link rel="stylesheet" href="assets/css/plugins/feature.css">
        <!-- Style css -->
        <link rel="stylesheet" href="assets/css/style.css">
        <style>
            /* Avatar */
            .user-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                border: 2px solid green;
                object-fit: cover;
            }

            /* End of Avatar */

            .header__action-btn img {
                border-radius: 50%;
                width: 40px;
                height: 40px;
                object-fit: cover;
            }

            .header-right {
                display: flex;
                align-items: center;
                gap: 5px;
            }



            /* Align profile image and dropdown */
            .header-right {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            /* Ensuring the logo, nav, and profile/cart sections align in a row */
            .header-wrapper {
                display: flex;
                align-items: center;
                justify-content: space-between;
                /* padding: 10px 15px; */
                /* Mute this later if avatar us shrinked */
            }

            .profile-dropdown {
                position: relative;
            }


            /* Add to Cart */
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

            /* Cart Icon Here*/
            /* General Styles for Cart Icon */
            .header__action--cart {
                position: relative;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-right: 15px;
                /* Adjust spacing if needed */
            }

            .header__action-btn {
                position: relative;
                display: inline-flex;
                text-decoration: none;
            }

            .cart-icon {
                font-size: 24px;
                color: #61dafb;
                cursor: pointer;
                position: relative;

            }

            /* Product Count Badge */
            .cart-count {
                position: absolute;
                top: -5px;
                right: -8px;
                background-color: #ff4d4d;
                color: white;
                font-size: 12px;
                font-weight: bold;
                border-radius: 50%;
                padding: 4px 6px;
                min-width: 20px;
                text-align: center;
                line-height: 1;
            }

            /* Hover Effects */
            .header__action-btn:hover .cart-icon {
                color: #4da7d5;
            }

            /* Responsive Adjustments */
            @media (max-width: 768px) {
                .header__action--cart {
                    margin-right: 10px;
                }

                .cart-icon {
                    font-size: 25px !important;
                }

                .cart-count {
                    top: -2px;
                    right: -8px;
                    font-size: 10px;
                    padding: 3px 5px;
                }
            }

            /* Profile DropDown */
            /* Profile Dropdown Container */
            .header__action.profile-dropdown {
                position: relative;
                /* So the dropdown is positioned relative to this container */
            }

            /* Dropdown Styling */
            .header__drop {
                position: absolute;
                top: 100%;
                /* Places the dropdown just below the profile image */
                right: 0;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 200px;
                padding: 15px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                display: none;
                /* Hidden initially */
                z-index: 10;
            }

            /* Align Dropdown Items Vertically */
            .header__drop a {
                display: flex;
                align-items: center;
                gap: 8px;
                /* Space between icon and text */
                padding: 8px 0;
                color: #333;
                text-decoration: none;
                font-size: 14px;
                transition: background 0.3s ease;
            }

            /* Hover effect for links */
            .header__drop a:hover {
                background-color: #f1f1f1;
                border-radius: 3px;
            }

            /* Profile Image Styling */
            .user-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                /* Makes the image circular */
                object-fit: cover;
                cursor: pointer;
            }

            /* Show dropdown on hover */
            .profile-dropdown:hover .header__drop {
                display: block;
            }

            /* Mobile Adjustments */
            @media (max-width: 768px) {
                .header__drop {
                    width: 160px;
                    /* Narrower on smaller screens */
                }
            }
        </style>
    </head>

    <body class="template-color-1 spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="70">

        <!-- Start Header -->
        <header class="rn-header haeder-default black-logo-version header--fixed header--sticky">
            <div class="header-wrapper rn-popup-mobile-menu m--0 row align-items-center">
                <!-- Start Header Left -->
                <div class="col-lg-2 col-6">
                    <div class="header-left">
                        <div class="logo">
                            <a href="/">
                                <!-- width:30%; -->
                                <img src="assets/images/logo/logo.png" alt="">
                                <!-- <img src="assets/images/logo/logo.png" alt="logo"> -->
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Header Left -->
                <!-- Start Header Center -->
                <div class="col-lg-10 col-6">
                    <div class="header-center">
                        <nav id="sideNav" class="mainmenu-nav navbar-example2 d-none d-xl-block onepagenav">
                            <!-- Start Mainmanu Nav -->
                            <ul class="primary-menu nav nav-pills">
                                <li class="nav-item"><a class="nav-link" href="index">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                                <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                                <li class="nav-item"><a class="nav-link" href="#resume">Resume</a></li>
                                <!-- <li class="nav-item current"><a class="nav-link" href="http://localhost:3000/#clients">Clients</a></li> -->
                                <!-- <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li> -->
                                <li class="nav-item"><a class="nav-link" href="#blog">blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="?p=contact">Contact</a></li>
                            </ul>
                            <!-- End Mainmanu Nav -->
                        </nav>
                        <!--  -->

                        <!-- Profile and Cart Section -->
                        <div class="header-right d-flex align-items-center">
                            <div class="header__action profile-dropdown">
                                <?php if (is_array($data)): ?>
                                    <!-- Profile Image -->
                                    <a class="header__action-btn" href="#">
                                        <img src="upload/profile/<?= $data['upload_image'] ?>" alt="User Avatar"
                                            class="user-avatar">
                                    </a>
                                    <!-- Dropdown -->
                                    <div class="header__drop">
                                        <a href="#">Welcome <?= $data['first_name'] ?>!</a>
                                        <a href="?p=profile.php"><i class="fas fa-user"></i> My Profile</a>
                                        <a href="?p=profile-settings"><i class="fas fa-cog"></i> Profile Settings</a>
                                        <a href="?p=favourites.php"><i class="fas fa-heart"></i> My Favourites</a>
                                        <a href="?p=cart"><i class="fas fa-shopping-cart"></i> My Orders</a>
                                        <a href="index?logout"><i class="fas fa-lock"></i> Logout</a>
                                    </div>
                                <?php else: ?>
                                    <!-- Guest Avatar -->
                                    <a class="header__action-btn" href="#">
                                        <img src="assets/images/profile/avatar2.png" alt="Guest Avatar" class="user-avatar">
                                    </a>
                                    <!-- Dropdown for Guests -->
                                    <div class="header__drop">
                                        <a href="login">Please Login to Continue!</a>
                                        <a href="login"><i class="far fa-lock"></i> Login</a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Cart Icon -->
                            <div class="header__action header__action--cart">
                                <a class="header__action-btn" href="?p=cart">
                                    <i class="fas fa-shopping-cart cart-icon"></i>
                                </a>
                                <span id="cat_no">
                                    <?= $P->no_products($userID) ?>
                                </span>
                            </div>

                            <!-- Hamburger Menu -->
                            <div class="hamberger-menu d-block d-xl-none">
                                <i id="menuBtn" class="feather-menu humberger-menu"></i>
                            </div>
                            <div class="close-menu d-block">
                                <span class="closeTrigger">
                                    <i data-feather="x"></i>
                                </span>
                            </div>
                        </div>


                        <!--  -->


                    </div>
                </div>
                <!-- End Header Center -->

                <!-- Start Header Right -->


            </div>
        </header>
        <!-- End Header Area -->

        <!-- Start Popup Mobile Menu  -->
<div class="popup-mobile-menu">
    <div class="inner">
        <div class="menu-top">
            <div class="menu-header">
                <a class="logo" href="index.php">
                    <img src="upload/<?= $profiles["upload_image"]; ?>" alt="Personal Portfolio">
                </a>
                <div class="close-button">
                    <button class="close-menu-activation close"><i data-feather="x"></i></button>
                </div>
            </div>
            <p class="discription"><?= $title ?></p>
        </div>
        <div class="content">
            <ul class="primary-menu nav nav-pills onepagenav">
                <li class="nav-item current"><a class="nav-link smoth-animation active" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">Resume</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#clients">Clients</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#blog">blog</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <!-- social sharea area -->
            <div class="social-share-style-1 mt--40">
                <span class="title">find with me</span>
                <ul class="social-share d-flex liststyle">
                    <li class="facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg></a>
                    </li>
                    <li class="instagram"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg></a>
                    </li>
                    <li class="linkedin"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                                <path
                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                </path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg></a>
                    </li>
                </ul>
            </div>
            <!-- end -->
        </div>
    </div>
</div>
<!-- End Popup Mobile Menu  -->