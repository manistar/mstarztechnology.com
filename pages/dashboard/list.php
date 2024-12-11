<?php
// Check if user is logged in
// $loggedIn = isset($_SESSION['userSession']);  
// Adjust session key if needed
?>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #1a1a1a; /* Dark background */
    color: #ccc; /* Faded text color */
    margin: 0;
    padding: 0;
}

.status-container {
    display: flex;
    gap: 10px;
    overflow-x: auto;
    padding: 10px;
    background-color: #1a1a1a; /* Matches WhatsApp theme */
}

.profile-container {
    text-align: center;
    color: #fff;
    width: 70px;
}

.status-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: 2px solid #25D366; /* WhatsApp green color */
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #333; /* Fallback background */
}

.user-avatar {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.no-reels,
.login-message {
    text-align: center;
    font-size: 16px;
    color: #999;
    margin: 20px 0;
}

.no-reels {
    color: #ff6b6b; /* Slightly alerting color */
}

.login-message {
    color: #ffc107; /* Informative yellow color */
}
    /* Video feed */
    .video-feed {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: start;
        width: 100%;
        height: 100vh;
        overflow-y: scroll;
        scroll-snap-type: y mandatory;
        background: #000;
        /* Black background like TikTok */
    }

    .video-container {
        width: 100%;
        max-height: 500px;
        overflow: hidden;
        position: relative;
        margin: 20px 0;
    }

    .reel-video {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }


    /* Ebd of video */
    /* Hide Scrollbar for Horizontal Scrolling */
    .portfolio-items {
        overflow-x: scroll;
        /* Keep horizontal scrolling */
        scroll-behavior: smooth;
        /* Smooth scrolling */
        padding: 10px;
    }

    /* Hide scrollbar for most modern browsers */
    .portfolio-items::-webkit-scrollbar {
        display: none;
        /* Hide scrollbar for WebKit browsers */
    }

    .portfolio-items {
        -ms-overflow-style: none;
        /* Hide scrollbar for IE and Edge */
        scrollbar-width: none;
        /* Hide scrollbar for Firefox */
    }

    /* Portfolio Section Styles */
    .portfolio-scroll-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        overflow: hidden;
        /* Hide overflowing items */
        padding: 20px 0;
    }

    .portfolio-items {
        display: flex;
        gap: 20px;
        overflow-x: scroll;
        scroll-behavior: smooth;
        padding: 10px;
    }

    .portfolio-item {
        min-width: 300px;
        flex-shrink: 0;
    }

    /* Arrows */
    .scroll-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        font-size: 24px;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        z-index: 10;
        border-radius: 50%;
        user-select: none;
    }

    .left-arrow {
        left: 10px;
    }

    .right-arrow {
        right: 10px;
    }

    .scroll-arrow:hover {
        background: rgba(0, 0, 0, 0.8);
    }

    /* Portfolio Content */
    .thumbnail img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .content {
        padding: 15px;
    }

    @media (max-width: 768px) {
        .portfolio-item {
            min-width: 90%;
        }
    }
</style>


<main class="main-page-wrapper">

    <!-- Start Slider Area -->
    <div id="home" class="rn-slider-area">
        <div class="slide slider-style-1">
            <div class="container">
                <div class="row row--30 align-items-center">
                    <div class="order-2 order-lg-1 col-lg-7 mt_md--50 mt_sm--50 mt_lg--30">
                        <div class="content">
                            <div class="inner">
                                <span class="subtitle">Welcome to Mstarz Technology</span>
                                <h1 class="title">
                                    <!-- <span> <//?= $profiles["fname"]; ?> </span> -->
                                    <!-- <br> -->
                                    <span class="header-caption" id="page-top">
                                        <!-- type headline start-->
                                        <span class="cd-headline clip is-full-width">
                                            <!-- <span>a </span> -->
                                            <!-- ROTATING TEXT -->
                                            <span class="cd-words-wrapper">
                                                <b class="is-visible">Full-Stack Developer</b>
                                                <b class="is-hidden">Cyber Security</b>
                                                <b class="is-hidden">Back-end Developer</b>
                                                <b class="is-hidden">Graphics Designer</b>
                                                <b class="is-hidden">Video Editing</b>
                                            </span>
                                        </span>
                                        <!-- type headline end -->
                                    </span>
                                </h1>

                                <div>

                                    <p class="description"><?= $profiles["content"]; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                                    <div class="social-share-inner-left">
                                        <span class="title">find with me</span>
                                        <ul class="social-share d-flex liststyle">
                                            <li class="facebook"><a href="https://facebook.com/manistar1"><i
                                                        data-feather="facebook"></i></a>
                                            </li>
                                            <li class="instagram"><a href="https://www.instagram.com/mstarztechs"><i
                                                        data-feather="instagram"></i></a>
                                            </li>
                                            <li class="linkedin"><a
                                                    href="https://www.linkedin.com/in/ayokunle-ogunsakin-6808491b0/"><i
                                                        data-feather="linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12 mt_mobile--30">
                                    <div class="skill-share-inner">
                                        <span class="title">Reels</span>
                                        <ul class="skill-share d-flex liststyle">

                                            <!-- <li><img src="assets/images/icons/icons-01.png" alt="Icons Images"></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order-1 order-lg-2 col-lg-5">
                        <div class="thumbnail">
                            <div class="inner">
                                <img src="upload/<?= $profiles["upload_image"]; ?>" alt="Personal Portfolio Images">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start Service Area -->
    <div class="rn-service-area rn-section-gap section-separator" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100"
                        data-aos-once="true">
                        <span class="subtitle">Features</span>
                        <h2 class="title">What I Do</h2>
                    </div>
                </div>
            </div>
            <div class="row row--25 mt_md--10 mt_sm--10">
                <?php foreach ($what_i_do as $row) { ?>
                    <!-- Start Single Service -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true"
                        class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <?= $row['feather']; ?>

                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#"> <?= $row['title']; ?></a></h4>
                                    <p class="description"><?= $row['content']; ?></p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="#"></a>
                        </div>
                    </div>
                <?php } ?>
                <!-- End SIngle Service -->
                <!-- Start Single Service -->
                <!-- <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="book-open"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">App Development</a></h4>
                                    <p class="description"> It uses a dictionary of over 200 Latin words, combined with
                                        a handful of model sentence.</p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="#"></a>
                        </div>
                    </div> -->
                <!-- End SIngle Service -->
                <!-- Start Single Service -->
                <!-- <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="tv"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">App Development</a></h4>
                                    <p class="description">I throw myself down among the tall grass by the stream as I
                                        lie close to the earth.</p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="#"></a>
                        </div>
                    </div> -->
                <!-- End SIngle Service -->
                <!-- Start Single Service -->
                <!-- <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="twitch"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">Mobile App</a></h4>
                                    <p class="description">There are many variations of passages of Lorem Ipsum
                                        available, but the majority.
                                    </p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="#"></a>
                        </div>
                    </div> -->
                <!-- End SIngle Service -->
                <!-- Start Single Service -->
                <!-- <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="wifi"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">CEO Marketing</a></h4>
                                    <p class="description">always free from repetition,
                                        injected humour, or non-characteristic words etc.</p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="#"></a>
                        </div>
                    </div> -->
                <!-- End SIngle Service -->
                <!-- Start Single Service -->
                <!-- <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="slack"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">Personal Portfolio April</a></h4>
                                    <p class="description"> It uses a dictionary of over 200 Latin words, combined with
                                        a handful of model sentence.</p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="#"></a>
                        </div>
                    </div> -->
                <!-- End SIngle Service -->

            </div>
        </div>
    </div>
    <!-- End Service Area  -->

    <!-- Reels -->


    <?php
    // Check if the user session is set and not empty
    if (isset($_SESSION['userSession']) && !empty($_SESSION['userSession'])) {
        // Get the user's session ID
        $userID = htmlspecialchars($_SESSION['userSession']);

        echo '<div class="rn-portfolio-area rn-section-gap section-separator" id="portfolio">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title text-center">
                <span class="subtitle">Reels</span>
                <!-- <h2 class="title">My Portfolio</h2> -->
            </div>
        </div>
    </div>

    <!-- <div class="row row--25 mt--10 mt_md--10 mt_sm--10"> -->
    <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">';



        // Fetch the data
        if ($adminReels->rowCount() > 0) {
            foreach ($adminReels as $row) {
                // Convert the timestamp to seconds for each row
                $postTime = strtotime($row['created_at']);
                $timeAgo  = $d->ago($postTime); // Get the "time ago" message
    
                echo '
            <div style="width: 300px; background-color: #121212; border-radius: 10px; overflow: hidden; color: #fff; margin-bottom: 20px;">
                <!-- User Details -->
                <div style="display: flex; align-items: center; padding: 10px;">
                    <img src="assets/images/reels/reel.jpg" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                    <div>
                        <span style="font-weight: bold;">Mstarz Technology</span><br>
                        <span style="font-size: 12px; color: #888;">' . $timeAgo . '</span>
                    </div>
                </div>

                <!-- Post Text -->
                <div style="padding: 10px; font-size: 14px; line-height: 1.5;">
                    ' . htmlspecialchars($row['title']) . '
                </div>

                <!-- Video -->
                <video style="width: 100%; height: auto; max-height: 300px;" controls autoplay muted loop>
                    <source src="upload/reels/' . htmlspecialchars($row['upload_reels']) . '" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <!-- Actions -->
                <div style="padding: 10px; display: flex; justify-content: space-between; align-items: center; font-size: 14px;">
                    <div style="display: flex; gap: 20px;">
                        <span>27 <i class="fa fa-heart" style="color: red;"></i></span>
                        <span>25 <i class="fa fa-comment"></i></span>
                    </div>
                     
                    <button class="share-btn" data-url="http://localhost/mstarztech.com/upload/reels/' . htmlspecialchars($row['upload_reels']) . '" style="background: none; border: none; color: #00f; cursor: pointer;">
                        <i class="fa fa-share"></i> Share
                    </button>
                </div>
            </div>';
            }
        } else {
            echo "No videos found.";
        }
    } else {
        // Redirect to login page or display a message
        // echo "<div style='text-align: center; color: red; font-weight: bold; margin-top: 20px;'>
        //  You need to log in to view this content.
        // </div>";
    }
    '</div>';
    ?>

    



    </div>

    <?php
    // Check and display reels
    // if ($adminReels->rowCount() > 0) {
    //     foreach ($adminReels as $row) {
    
    //         echo '<span class="chat-logo"><img src="assets/images/reels/reel.jpg" class="user-avatar"></span>';
    

    //         // Check if the row contains a valid 'links' field
    //         if (isset($row['links']) && !empty($row['links'])) {
    //             $videoLink = htmlspecialchars($row['links']);
    
    //             // Check if the link is a TikTok URL
    //             if (strpos($videoLink, 'tiktok.com') !== false) {
    //                 // Resolve the shortened TikTok URL
    //                 $headers = get_headers($videoLink, 1);
    //                 if (isset($headers['Location'])) {
    //                     $resolvedLink = is_array($headers['Location']) ? end($headers['Location']) : $headers['Location'];
    
    //                     // Extract TikTok video ID from the resolved link
    //                     if (preg_match('/\/video\/(\d+)/', $resolvedLink, $matches)) {
    //                         $videoID = $matches[1];
    
    // Embed TikTok video
    //                         echo '<div class="video-container">';
    //                         echo '<blockquote class="tiktok-embed" cite="' . $resolvedLink . '" data-video-id="' . $videoID . '" style="max-width: 605px;min-width: 325px;">
    //                                 <section></section>
    //                               </blockquote>';
    //                         echo '<script async src="https://www.tiktok.com/embed.js"></script>';
    //                         echo '</div>';
    //                     } else {
    //                         echo '<div class="video-container">Unable to extract TikTok video ID from resolved URL.</div>';
    //                     }
    //                 } else {
    //                     echo '<div class="video-container">Unable to resolve TikTok URL.</div>';
    //                 }
    //             } else {
    //                 echo '<div class="video-container">Invalid TikTok link provided.</div>';
    //             }
    //         } else {
    //             echo '<div class="video-container">No video link found.</div>';
    //         }
    //     }
    // } else {
    //     // echo '<div>No reels found.</div>';
    // }
    
    ?>
    <div class="reels_spacing">
        <?php

         // Fetch reels posted by users
// $userReels = $d->getall("reels", "whois = ? AND status = ? AND label_status = ?", ['user', '1', '1'], fetch: "moredetails");
        
   
      
// Check if any reels exist
if ($userReels && $userReels->rowCount() > 0) {
    echo '<div class="status-container">';
    foreach ($userReels as $row) {
        // Get the user details of the reel's poster
        $posterDetails = $d->getall("users", "ID = ?", [$row['userID']], fetch: "details");

        if ($posterDetails) {
            $firstName = htmlspecialchars($posterDetails['first_name']);
            $lastName  = htmlspecialchars($posterDetails['last_name']);
            $profileImage = htmlspecialchars($posterDetails['upload_image']);
        } else {
            $firstName = 'Unknown';
            $lastName  = 'User';
            $profileImage = 'user2-160x160.png'; // Default image
        }

        // Display the user's profile image
        echo '<div class="profile-container">
            <a href="?p=reel&ID= '. $row['userID']. '">
                <div class="status-circle">
                    <img src="upload/profile/' . (!empty($profileImage) ? $profileImage : 'user2-160x160.png') . '" class="user-avatar">
                </div>
                <span style="font-weight: bold; color: grey; font-size: 10px;">' . $firstName . ' ' . $lastName . '</span><br>
            </a>
        </div>';
    }
    echo '</div>';
} else {
    echo '<div class="no-reels">No reels found.</div>';
}
      
        ?>
    </div>




    </div>
    <!-- Right Arrow -->
    <!-- <div class="scroll-arrow right-arrow" onclick="scrollPortfolio(1)">
                    <span>&gt;</span>
                </div> -->
    </div>
    </div>
    </div>

    <!-- Reels Ends -->


    <!-- Start Portfolio Area -->
    <div class="rn-portfolio-area rn-section-gap section-separator" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle">Visit my portfolio and keep your feedback</span>
                        <h2 class="title">My Portfolio</h2>
                    </div>
                </div>
            </div>

            <!-- <div class="row row--25 mt--10 mt_md--10 mt_sm--10"> -->

            <!-- Horizontal Scroll Wrapper -->
            <div class="portfolio-scroll-wrapper">
                <!-- Left Arrow -->
                <div class="scroll-arrow left-arrow" onclick="scrollPortfolio(-1)">
                    <span>&lt;</span>
                </div>

                <!-- Portfolio Items -->
                <div class="portfolio-items" id="portfolioItems">

                    <?php

                    foreach ($portfolio as $row) { ?>
                        <div data-aos="fade-up" data-aos-delay="100" data-aos-once="true"
                            class="col-lg-6 col-xl-4 col-md-6 col-12 mt--50 mt_md--30 mt_sm--30">
                            <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                <div href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#bs-example-modal-md"
                                    id="chat_user_<?= $row['ID'] ?>"
                                    data-url="modal?p=dashboard&action=view&pID=<?= $row['ID'] ?>"
                                    data-title="<?= $row['title'] ?>" data-user-id="<?= $row['ID'] ?>" class="inner">
                                    <div class="thumbnail">
                                        <a href="javascript:void(0)">
                                            <img src="upload/portfolio/<?= $row['img']; ?>" alt="Personal Portfolio Images">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="category-info">
                                            <div class="category-list">
                                                <a href="javascript:void(0)"><?= $row['professions']; ?></a>
                                            </div>
                                            <div class="meta">
                                                <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                                    600</span>
                                            </div>
                                        </div>
                                        <h4 class="title"><a href="javascript:void(0)"><?= $row['title']; ?><i
                                                    class="feather-arrow-up-right"></i></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    require_once 'content/modal.php';
                    ?>
                </div>
                <!-- Right Arrow -->
                <div class="scroll-arrow right-arrow" onclick="scrollPortfolio(1)">
                    <span>&gt;</span>
                </div>
            </div>
        </div>
    </div>



    <!-- End Portfolio Area -->

    <!-- End portfolio Area -->


    <!-- Purchase Script -->

    <div class="rn-service-area rn-section-gap section-separator" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center" data-aos="fade-up" data-aos-duration="500"
                        data-aos-delay="100" data-aos-once="true">
                        <span class="subtitle">Websites</span>
                        <h2 class="title">Purchase Script</h2>
                    </div>
                </div>
            </div>

            <div class="row row--25 mt_md--10 mt_sm--10">
                <?php if ($product_data->rowCount() > 0) {
                    $index = 0;
                    foreach ($product_data as $row) {
                        $likeCount = $d->getall('like_product', 'productID = ?', [$row['ID']], fetch: "");
                        ?>
                        <!-- Start Single Service -->
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true"
                            class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30 product-item"
                            data-index="<?= $index ?>">
                            <div class="rn-service">
                                <div class="inner">
                                    <!-- Product Image -->
                                    <div class="thumbnail">
                                        <a href="javascript:void(0)">
                                            <img src="upload/cart/<?= $row['upload_image']; ?>" alt="Product Image">
                                        </a>
                                    </div>

                                    <!-- Product Content -->
                                    <div class="content">
                                        <h4 class="title">
                                            <a href="#"><?= $row['title']; ?></a>
                                        </h4>

                                        <!-- Product Price -->
                                        <span class="product__price"><?= $row['amount']; ?></span>
                                        <hr />

                                        <div class="product-action-bottom bankbtn">

                                            <!-- <div class="button-group mt--20"> -->
                                            <form action="passer" method="post" id="foo">
                                                <input type="hidden" name="likeID" value="<?= $row['ID']; ?>">
                                                <div id="custommessage"></div>
                                                <button type="submit" class="rn-btn thumbs-icon like-btn"
                                                    data-id="<?= $row['ID']; ?>">
                                                    <span id="like-count-<?= $row['ID']; ?>">
                                                        <?= $likeCount; ?>
                                                    </span>
                                                    <i data-feather="thumbs-up"></i>
                                                </button>
                                            </form>

                                            <!-- <div id="custommessage"></div>
                                            <div class="rn-btn thumbs-icon like-btn" data-id="<?= $row['ID']; ?>">
                                                <span id="like-count-<?= $row['ID']; ?>">
                                                    <?= $likeCount; ?>
                                                </span>
                                                <i data-feather="thumbs-up"></i>
                                            </div> -->

                                            <!-- </div> -->

                                            <!-- Eye Icon Button -->

                                            <button type="button" class="product-action-btn action-btn-quick-view"
                                                data-toggle="modal" data-target="#bankModal">
                                                <a href="?p=product-details&ID=<?= $row['ID'] ?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </button>






                                            <!-- Add to Cart Button -->
                                            <form action="passer" method="post" class="add-to-cart-form" id="foo">
                                                <?php
                                                // session_start();
                                                $add_cart['input_data']['productID']  = $row['ID'];
                                                $add_cart['input_data']['no_product'] = $P->get_no_of_product_in_cart($userID, $row['ID']);
                                                echo $c->create_form($add_cart);
                                                ?>
                                                <input type="hidden" name="add_to_cart" value="1">
                                                <input type="hidden" name="page" value="shop">
                                                <div id="custommessage"></div>

                                                <button type="submit" class="add-to-cart" data-product-id="<?= $row['ID']; ?>"
                                                    title="Add To Cart" id="addToCartButton">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </div> <!-- End of content -->
                                </div> <!-- End of inner -->
                            </div> <!-- End of rn-service -->
                        </div> <!-- End of col -->
                        <?php
                        $index++;
                    }

                } else {
                    echo "No data found";
                } ?>
            </div>


            <!-- Modal -->

            <!-- Modal -->
            <!-- <div class="modal fade" id="bankModal" tabindex="-1" role="dialog" 
    aria-labelledby="bankModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
          
                <img src="upload/cart/<?= $row['upload_image']; ?>" alt="Product Image">
       

                <div class="sd-block-text-desc">
                    <p style="text-align: right;"></p>
                    <hr />
                    <p style="text-align: right;"><?= $row['description']; ?></p>
                    <hr />
                    <p style="text-align: right;">Available Credit Balance: <?= $row['amount']; ?></p>
                    <hr />
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

            <!-- Cart Modal -->
            <!-- <div id="cartModal" style="display: none;">
            <h2>Your Cart</h2>
            <ul id="cartItems"></ul>
            <button id="closeCart">Close</button>
        </div> -->
        </div>
    </div>

    <!-- End Purchase -->







    <!-- Start Testimonia Area  -->
    <div class="rn-testimonial-area rn-section-gap section-separator" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle">What Clients Say</span>
                        <h2 class="title">Testimonial</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-activation testimonial-pb mb--30">

                        <?php foreach ($testimonial as $row) { ?>
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="upload/testimonials/<?= $row['img']; ?>" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <!-- <span class="subtitle mt--10">Rainbow-Themes</span> -->
                                            <h3 class="title"><?= $row['fname']; ?></h3>
                                            <span class="designation"><?= $row['position']; ?></span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title"><?= $row['title']; ?></h3>
                                                <span class="date"> <?= $row['freelance']; ?></span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            <?= $row['content']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!--End Single testiminail -->

                        <!-- Start Single testiminail -->
                        <!-- <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/testimonial/final-home--2nd.png" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">Bound - Trolola</span>
                                            <h3 class="title">Jone Duone Joe</h3>
                                            <span class="designation">Operating Officer</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">Web App Development</h3>
                                                <span class="date">Upwork - Mar 4, 2016 - Aug 30, 2021</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            Important fact to nec sem ut imperdiet. Ut tincidunt est ac dolor aliquam
                                            sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris
                                            hendrerit ante. Ut tincidunt est ac dolor aliquam sodales phasellus smauris
                                            .
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                        <!--End Single testiminail -->
                        <!-- Start Single testiminail -->
                        <!-- <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/testimonial/final-home--3rd.png" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">Glassfisom</span>
                                            <h3 class="title">Nevine Dhawan</h3>
                                            <span class="designation">CEO Of Officer</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">Android App Design</h3>
                                                <span class="date">Fiver - Mar 4, 2015 - Aug 30, 2021</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            No more question for design. Ut tincidunt est ac dolor aliquam
                                            sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris
                                            hendrerit ante. Ut tincidunt est ac dolor aliquam sodales phasellus smauris
                                            .
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                        <!--End Single testiminail -->

                        <!-- Start Single testiminail -->
                        <!-- <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/testimonial/final-home--4th.png" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">NCD - Design</span>
                                            <h3 class="title">Mevine Thoda</h3>
                                            <span class="designation">Marketing Officer</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">CEO - Marketing</h3>
                                                <span class="date">Thoda Department - Mar 4, 2018 - Aug 30, 2021</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            Marcent Of Vanice and treatment. Ut tincidunt est ac dolor aliquam
                                            sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris
                                            hendrerit ante. Ut tincidunt est ac dolor aliquam sodales phasellus smauris
                                            .
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                        <!--End Single testiminail -->

                        <!-- Start Single testiminail -->
                        <!-- <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/testimonial/final-home--5th.png" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">Default name</span>
                                            <h3 class="title">Davei Luace</h3>
                                            <span class="designation">Chief Operating Manager</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">Android App Development</h3>
                                                <span class="date">via Upwork - Mar 4, 2015 - Aug 30, 2021</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            When managment is so important. Ut tincidunt est ac dolor aliquam
                                            sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris
                                            hendrerit ante. Ut tincidunt est ac dolor aliquam sodales phasellus smauris
                                            .
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                        <!--End Single testiminail -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonia Area  -->
    <!-- Start Client Area -->
    <div class="rn-client-area rn-section-gap section-separator" id="clients">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span class="subtitle">Popular Clients</span>
                        <h2 class="title">Awesome Clients</h2>
                    </div>
                </div>
            </div>

            <div class="row row--25 mt--50 mt_md--40 mt_sm--40">
                <div class="col-lg-4">
                    <div class="d-flex flex-wrap align-content-start h-100">
                        <div class="position-sticky clients-wrapper sticky-top rbt-sticky-top-adjust">
                            <ul class="nav tab-navigation-button flex-column nav-pills me-3" id="v-pills-tab"
                                role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link" id="v-pills-home-tab" data-bs-toggle="tab"
                                        href="#v-pills-Javascript" role="tab" aria-selected="true">JavaScript</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="tab"
                                        href="#v-pills-Design" role="tab" aria-selected="true">Product Design</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" id="v-pills-wordpress-tab" data-bs-toggle="tab"
                                        href="#v-pills-Wordpress" role="tab" aria-selected="true">Wordpress</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="v-pills-settings-tabs" data-bs-toggle="tab"
                                        href="#v-pills-settings" role="tab" aria-selected="true">HTML to React</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="v-pills-laravel-tabs" data-bs-toggle="tab"
                                        href="#v-pills-laravel" role="tab" aria-selected="true">React
                                        To Laravel</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="v-pills-python-tabs" data-bs-toggle="tab"
                                        href="#v-pills-python" role="tab" aria-selected="true">Python</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="tab-area">
                        <div class="d-flex align-items-start">
                            <div class="tab-content" id="v-pills-tabContent">

                                <div class="tab-pane fade" id="v-pills-Javascript" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Add Dev</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client4.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Adon Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>

                                <div class="tab-pane fade show active" id="v-pills-Design" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Add Dev</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client4.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Adon Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-Wordpress" role="tabpanel"
                                    aria-labelledby="v-pills-wordpress-tab">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Add Dev</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client4.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Adon Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tabs">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Add Dev</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client4.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Adon Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-laravel" role="tabpanel"
                                    aria-labelledby="v-pills-laravel-tabs">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Add Dev</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client4.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Adon Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-python" role="tabpanel"
                                    aria-labelledby="v-pills-python-tabs">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Add Dev</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client4.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Adon Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client2.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client5.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client1.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/png/client3.png"
                                                            alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End client section -->
    <!-- Pricing Area -->

    <!-- pricing area -->



    <!-- Start News Area -->

    <!-- ENd Mews Area -->


    <!-- Contact Head -->

    <!-- Contact End -->

    <!-- Modal Portfolio Body area Start -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">

                        <div class="col-lg-6">
                            <div class="portfolio-popup-thumbnail">
                                <div class="image">
                                    <img class="w-100" src="assets/images/portfolio/portfolio-04.jpg" alt="slide">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="text-content">
                                <h3>
                                    <span>Featured - Design</span> App Design Development.
                                </h3>
                                <p class="mb--30">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate
                                    distinctio assumenda explicabo veniam temporibus eligendi.</p>
                                <p>Consectetur adipisicing elit. Cupiditate distinctio assumenda. dolorum alias suscipit
                                    rerum maiores aliquam earum odit, nihil culpa quas iusto hic minus!</p>
                                <div class="button-group mt--20">
                                    <a href="#" class="rn-btn thumbs-icon">
                                        <span>LIKE THIS</span>
                                        <i data-feather="thumbs-up"></i>
                                    </a>
                                    <a href="#" class="rn-btn">
                                        <span>VIEW PROJECT</span>
                                        <i data-feather="chevron-right"></i>
                                    </a>
                                </div>

                            </div>
                            <!-- End of .text-content -->
                        </div>
                    </div>
                    <!-- End of .row Body-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Portfolio area -->
    <!-- Modal Blog Body area Start -->
    <div class="modal fade" id="exampleModalCenters" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-news" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>

                <!-- End of .modal-header -->

                <div class="modal-body">
                    <img src="assets/images/blog/blog-big-01.jpg" alt="news modal" class="img-fluid modal-feat-img">
                    <div class="news-details">
                        <span class="date">2 May, 2021</span>
                        <h2 class="title">Digital Marketo to Their New Office.</h2>
                        <p>Nobis eleifend option congue nihil imperdiet doming id quod mazim placerat
                            facer
                            possim assum.
                            Typi non
                            habent claritatem insitam; est usus legentis in iis qui facit eorum
                            claritatem.
                            Investigationes
                            demonstraverunt
                            lectores legere me lius quod ii legunt saepius. Claritas est etiam processus
                            dynamicus, qui
                            sequitur
                            mutationem consuetudium lectorum.</p>
                        <h4>Nobis eleifend option conguenes.</h4>
                        <p>Mauris tempor, orci id pellentesque convallis, massa mi congue eros, sed
                            posuere
                            massa nunc quis
                            dui.
                            Integer ornare varius mi, in vehicula orci scelerisque sed. Fusce a massa
                            nisi.
                            Curabitur sit
                            amet
                            suscipit nisl. Sed eget nisl laoreet, suscipit enim nec, viverra eros. Nunc
                            imperdiet risus
                            leo,
                            in rutrum erat dignissim id.</p>
                        <p>Ut rhoncus vestibulum facilisis. Duis et lorem vitae ligula cursus venenatis.
                            Class aptent
                            taciti sociosqu
                            ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc vitae
                            nisi
                            tortor. Morbi
                            leo
                            nulla, posuere vel lectus a, egestas posuere lacus. Fusce eleifend hendrerit
                            bibendum. Morbi
                            nec
                            efficitur ex.</p>
                        <h4>Mauris tempor, orci id pellentesque.</h4>
                        <p>Nulla non ligula vel nisi blandit egestas vel eget leo. Praesent fringilla
                            dapibus dignissim.
                            Pellentesque
                            quis quam enim. Vestibulum ultrices, leo id suscipit efficitur, odio lorem
                            rhoncus dolor, a
                            facilisis
                            neque mi ut ex. Quisque tempor urna a nisi pretium, a pretium massa
                            tristique.
                            Nullam in
                            aliquam
                            diam. Maecenas at nibh gravida, ornare eros non, commodo ligula. Sed
                            efficitur
                            sollicitudin
                            auctor.
                            Quisque nec imperdiet purus, in ornare odio. Quisque odio felis, vestibulum
                            et.</p>
                    </div>

                    <!-- Comment Section Area Start -->
                    <div class="comment-inner">
                        <h3 class="title mb--40 mt--50">Leave a Reply</h3>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="rnform-group"><input type="text" placeholder="Name">
                                    </div>
                                    <div class="rnform-group"><input type="email" placeholder="Email">
                                    </div>
                                    <div class="rnform-group"><input type="text" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="rnform-group">
                                        <textarea placeholder="Comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <a class="rn-btn" href="#"><span>SUBMIT NOW</span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Section End -->
                </div>
                <!-- End of .modal-body -->
            </div>
        </div>
    </div>
    <!-- End Modal Blog area -->


    <!-- Back to  top Start -->
    <!-- <div class="backto-top">
        <div>
            <i data-feather="arrow-up"></i>
        </div>
    </div> -->

    <div class="backto-top">
        <div id="chat-icon">
            <span>💬</span>
        </div>
    </div>
    <!-- Back to top end -->




    <!-- Start Right Demo  -->
    <!-- <div class="rn-right-demo">
            <button class="demo-button">
                <span class="text">Demos</span>
            </button>
        </div> -->
    <!-- End Right Demo  -->

    <!-- Start Modal Area  -->
    <div class="demo-modal-area">
        <div class="wrapper">
            <div class="close-icon">
                <button class="demo-close-btn"><span class="feather-x"></span></button>
            </div>
            <div class="rn-modal-inner">
                <div class="demo-top text-center">
                    <h4 class="title">Mstarz Technology</h4>
                    <p class="subtitle">Its a personal portfolio template. You can built any personal website easily.
                    </p>
                </div>
                <ul class="popuptab-area nav nav-tabs" id="popuptab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active demo-dark" id="demodark-tab" data-bs-toggle="tab" href="#demodark"
                            role="tab" aria-controls="demodark" aria-selected="true">Dark Demo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link demo-light" id="demolight-tab" data-bs-toggle="tab" href="#demolight"
                            role="tab" aria-controls="demolight" aria-selected="false">Light Demo</a>
                    </li>
                </ul>
                <div class="tab-content" id="popuptabContent">
                    <div class="tab-pane show active" id="demodark" role="tabpanel" aria-labelledby="demodark-tab">
                        <div class="content">
                            <div class="row">

                                <!-- Start Single Content  -->
                                <!-- <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index.php">
                                                        <img class="w-100" src="assets/images/demo/main-demo.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index.php">Main Demo</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner badge-2">
                                            <div class="thumbnail">
                                                <a href="index-technician.php">
                                                    <img class="w-100" src="assets/images/demo/index-technician.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="index-technician.php">Technician</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner badge-2">
                                            <div class="thumbnail">
                                                <a href="index-model.php">
                                                    <img class="w-100" src="assets/images/demo/home-model-v2.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="index-model.php">Model</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner badge-1">
                                            <div class="thumbnail">
                                                <a href="home-consulting.php">
                                                    <img class="w-100" src="assets/images/demo/home-consulting.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="home-consulting.php">Consulting</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner badge-1">
                                            <div class="thumbnail">
                                                <a href="fashion-designer.php">
                                                    <img class="w-100" src="assets/images/demo/fashion-designer.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="fashion-designer.php">Fashion Designer</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="index-developer.php">
                                                    <img class="w-100" src="assets/images/demo/developer.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="index-developer.php">Developer</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="instructor-fitness.php">
                                                    <img class="w-100" src="assets/images/demo/instructor-fitness.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="instructor-fitness.php">Fitness
                                                        Instructor</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->
                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner badge-1">
                                            <div class="thumbnail">
                                                <a href="home-web-Developer.php">
                                                    <img class="w-100" src="assets/images/demo/home-model.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="home-web-Developer.php">Web Developer</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="home-designer.php">
                                                    <img class="w-100" src="assets/images/demo/home-video.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="home-designer.php">Designer</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="home-content-writer.php">
                                                    <img class="w-100" src="assets/images/demo/text-rotet.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="home-content-writer.php">Content Writter</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="home-instructor.php">
                                                    <img class="w-100" src="assets/images/demo/index-boxed.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="home-instructor.php">Instructor</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="home-freelancer.php">
                                                    <img class="w-100" src="assets/images/demo/home-sticky.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="home-freelancer.php">Freelancer</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="home-photographer.php">
                                                    <img class="w-100" src="assets/images/demo/index-bg-image.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="home-photographer.php">Photographer</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="index-politician.php">
                                                    <img class="w-100" src="assets/images/demo/front-end.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="index-politician.php">Politician</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo coming-soon">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img class="w-100" src="assets/images/demo/coming-soon.png"
                                                        alt="Personal Portfolio">
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="#">Accountant</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane" id="demolight" role="tabpanel" aria-labelledby="demolight-tab">
                        <div class="content">
                            <div class="row">

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="index-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/main-demo-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="index-white-version.php">Main Demo</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner badge-2">
                                            <div class="thumbnail">
                                                <a href="index-technician-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/index-technician-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a
                                                        href="index-technician-white-version.php">Technician</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner badge-2">
                                            <div class="thumbnail">
                                                <a href="index-model-white-version.php">
                                                    <img class="w-100" src="assets/images/demo/home-model-v2-white.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="index-model-white-version.php">Model</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner badge-1">
                                            <div class="thumbnail">
                                                <a href="home-consulting-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/home-consulting-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a
                                                        href="home-consulting-white-version.php">Consulting</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner badge-1">
                                            <div class="thumbnail">
                                                <a href="fashion-designer-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/fashion-designer-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="fashion-designer-white-version.php">Fashion
                                                        Designer</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="index-developer-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/developer-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a
                                                        href="index-developer-white-version.php">Developer</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->
                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="instructor-fitness-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/instructor-fitness-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="instructor-fitness-white-version.php">Fitness
                                                        Instructor</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->
                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner badge-1">
                                            <div class="thumbnail">
                                                <a href="home-web-developer-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/home-model-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="home-web-developer-white-version.php">Web
                                                        Developer</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="home-designer-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/home-video-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="home-designer-white-version.php">Designer</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="home-content-writer-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/text-rotet-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a
                                                        href="home-content-writer-white-version.php">Content
                                                        Writter</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="home-instructor-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/index-boxed-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a
                                                        href="home-instructor-white-version.php">Instructor</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="home-freelancer-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/home-sticky-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a
                                                        href="home-freelancer-white-version.php">Freelancer</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="home-photographer-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/index-bg-image-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a
                                                        href="home-photographer-white-version.php">Photographer</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="index-politician-white-version.php">
                                                    <img class="w-100"
                                                        src="assets/images/demo/front-end-white-version.png"
                                                        alt="Personal Portfolio">
                                                    <span class="overlay-content">
                                                        <span class="overlay-text">View Demo <i
                                                                class="feather-external-link"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a
                                                        href="index-politician-white-version.php">Politician</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                                <!-- Start Single Content  -->
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-demo coming-soon">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img class="w-100" src="assets/images/demo/coming-soon.png"
                                                        alt="Personal Portfolio">
                                                </a>
                                            </div>
                                            <div class="inner">
                                                <h3 class="title"><a href="#">Accountant</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content  -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Area  -->

</main>

<script>
    function scrollPortfolio(direction) {
        const container = document.getElementById('portfolioItems');
        const scrollAmount = 300; // Adjust the amount to scroll
        container.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth',
        });
    }

    //     document.addEventListener('DOMContentLoaded', () => {
    //     const shareButtons = document.querySelectorAll('.share-btn');

    //     shareButtons.forEach(button => {
    //         button.addEventListener('click', async () => {
    //             const url = button.dataset.url;
    //             if (!navigator.share) {
    //                 alert('Sharing is not supported in this browser.');
    //                 return;
    //             }

    //             try {
    //                 console.log('Sharing URL:', url);
    //                 await navigator.share({
    //                     title: 'Check out this video!',
    //                     text: 'Here is a video you might like.',
    //                     url: url,
    //                 });
    //                 alert('Content shared successfully!');
    //             } catch (error) {
    //                 if (error.name === 'AbortError') {
    //                     console.log('User canceled the share.');
    //                 } else {
    //                     console.error('Error sharing content:', error.message);
    //                     alert('Error sharing content. Please try again.');
    //                 }
    //             }
    //         });
    //     });
    // });





    // Video play
    document.addEventListener("DOMContentLoaded", function () {
        const shareButtons = document.querySelectorAll(".share-btn");

        shareButtons.forEach(button => {
            button.addEventListener("click", async function () {
                const shareUrl = button.getAttribute("data-url");

                // Disable the button temporarily to prevent multiple clicks
                button.disabled = true;

                // Show a loading spinner (optional)
                const originalInnerHTML = button.innerHTML;
                button.innerHTML = "<i class='fa fa-spinner fa-spin'></i> Sharing...";

                try {
                    if (navigator.share) {
                        await navigator.share({
                            title: "Check out this video!",
                            url: shareUrl
                        });
                        // alert("Content shared successfully!");
                    } else {
                        alert("Sharing is not supported on this device. Copy this URL: " + shareUrl);
                    }
                } catch (error) {
                    console.error("Error sharing content:", error);
                    if (error.name === "AbortError") {
                        alert("Sharing was aborted. Please try again.");
                    } else {
                        alert("An error occurred while sharing the content. Please try again.");
                    }
                } finally {
                    // Re-enable the button and restore its innerHTML
                    button.disabled = false;
                    button.innerHTML = originalInnerHTML; // Restore the original text
                }
            });
        });
    });

</script>