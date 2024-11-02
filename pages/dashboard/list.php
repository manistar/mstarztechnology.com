<?php
// Check if user is logged in
// $loggedIn = isset($_SESSION['userSession']);  
// Adjust session key if needed
?>
<main class="main-page-wrapper">

    <!-- Start Slider Area -->
    <div id="home" class="rn-slider-area">
        <div class="slide slider-style-1">
            <div class="container">
                <div class="row row--30 align-items-center">
                    <div class="order-2 order-lg-1 col-lg-7 mt_md--50 mt_sm--50 mt_lg--30">
                        <div class="content">
                            <div class="inner">
                                <span class="subtitle">Welcome to my world</span>
                                <h1 class="title">Hi, I’m <span> <?= $profiles["fname"]; ?> </span><br>
                                    <span class="header-caption" id="page-top">
                                        <!-- type headline start-->
                                        <span class="cd-headline clip is-full-width">
                                            <span>a </span>
                                            <!-- ROTATING TEXT -->
                                            <span class="cd-words-wrapper">
                                                <b class="is-visible">Front-end Developer</b>
                                                <b class="is-hidden">Back-end Developer</b>
                                                <b class="is-hidden">Graphics Designer</b>
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
                                        <span class="title">best skill on</span>
                                        <ul class="skill-share d-flex liststyle">
                                            <li><img src="assets/images/icons/icons-01.png" alt="Icons Images"></li>
                                            <li><img src="assets/images/icons/icons-02.png" alt="Icons Images"></li>
                                            <li><img src="assets/images/icons/icons-03.png" alt="Icons Images"></li>
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

            <div class="row row--25 mt--10 mt_md--10 mt_sm--10">


                <!-- Start Single Portfolio -->
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
                <!-- End Single Portfolio -->

                <!-- Start Single Portfolio -->
                <!-- <div data-aos="fade-up" data-aos-delay="300" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/portfolio/portfolio-02.jpg" alt="Personal Portfolio Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)">Application</a>
                                        </div>
                                        <div class="meta">
                                            <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                        750</span>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="javascript:void(0)">Mobile app landing design & app
                                            maintain<i class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- End Single Portfolio -->

                <!-- Start Single Portfolio -->
                <!-- <div data-aos="fade-up" data-aos-delay="500" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/portfolio/portfolio-03.jpg" alt="Personal Portfolio Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)">Photoshop</a>
                                        </div>
                                        <div class="meta">
                                            <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                        630</span>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="javascript:void(0)">Logo design creativity & Application
                                            <i class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- End Single Portfolio -->

                <!-- Start Single Portfolio -->
                <!-- <div data-aos="fade-up" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/portfolio/portfolio-04.jpg" alt="Personal Portfolio Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)">Figma</a>
                                        </div>
                                        <div class="meta">
                                            <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                        360</span>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="javascript:void(0)">Mobile app landing design &
                                            Services<i class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- End Single Portfolio -->

                <!-- Start Single Portfolio -->
                <!-- <div data-aos="fade-up" data-aos-delay="300" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/portfolio/portfolio-05.jpg" alt="Personal Portfolio Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)">Web Design</a>
                                        </div>
                                        <div class="meta">
                                            <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                        280</span>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="javascript:void(0)">Design for tecnology & services<i
                                        class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- End Single Portfolio -->

                <!-- Start Single Portfolio -->
                <!-- <div data-aos="fade-up" data-aos-delay="500" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/portfolio/portfolio-06.jpg" alt="Personal Portfolio Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)">Web Design</a>
                                        </div>
                                        <div class="meta">
                                            <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                        690</span>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="javascript:void(0)">App for tecnology & services<i
                                        class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- End Single Portfolio -->
            </div>
        </div>
    </div>
    <!-- End portfolio Area -->


    <!-- Purchase Script -->

    <div class="rn-service-area rn-section-gap section-separator" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100"
                        data-aos-once="true">
                        <span class="subtitle">Features</span>
                        <h2 class="title">Purchase Script</h2>
                    </div>
                </div>
            </div>

            <div class="row row--25 mt_md--10 mt_sm--10">
                <?php if ($product_data->rowCount() > 0) {
                    foreach ($product_data as $row) { 
                        $likeCount = $d->getall('like_product', 'productID = ?', [$row['ID']], fetch: "");
                        ?>
                        <!-- Start Single Service -->
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true"
                            class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
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
                                                <button type="submit" class="rn-btn thumbs-icon like-btn" data-id="<?= $row['ID']; ?>">
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
                    <?php }
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




    <!-- Start Resume Area -->
    <div class="rn-resume-area rn-section-gap section-separator" id="resume">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle">7+ Years of Experience</span>
                        <h2 class="title">My Resume</h2>
                    </div>
                </div>
            </div>
            <div class="row mt--45">
                <div class="col-lg-12">
                    <ul class="rn-nav-list nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="education-tab" data-bs-toggle="tab" href="#education"
                                role="tab" aria-controls="education" aria-selected="true">education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="professional-tab" data-bs-toggle="tab" href="#professional"
                                role="tab" aria-controls="professional" aria-selected="false">professional
                                Skills</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="experience-tab" data-bs-toggle="tab" href="#experience" role="tab"
                                aria-controls="experience" aria-selected="false">experience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="interview-tab" data-bs-toggle="tab" href="#interview" role="tab"
                                aria-controls="interview" aria-selected="false">interview</a>
                        </li>
                    </ul>

                    <!-- Start Tab Content Wrapper  -->
                    <div class="rn-nav-content tab-content" id="myTabContents">
                        <!-- Start Single Tab  -->
                        <div class="tab-pane show active fade single-tab-area" id="education" role="tabpanel"
                            aria-labelledby="education-tab">
                            <div class="personal-experience-inner mt--40">
                                <div class="row">
                                    <!-- Start Skill List Area  -->

                                    <?php foreach ($edu as $row) { ?>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="content">
                                                <span class="subtitle">2007 - 2010</span>
                                                <h4 class="maintitle">Education Quality</h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4><?= $row['course']; ?></h4>
                                                                    <span><?= $row['institute']; ?></span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>4.30/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description"><?= $row['content']; ?></p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <!-- <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>PHP, Phython 3, JavaScript, jQuery</h4>
                                                                    <span>Sololearn (2000 - 2002)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>4.50/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description">Certificate of  Proficiency in PHP, Phython 3 &  HTML fundamental course.</p>
                                                        </div>
                                                    </div> -->
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <!-- <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>PDO</h4>
                                                                    <span>Segmadesigns Ltd (2017 - 2021)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>4.80/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description"> Certificate of  Proficiency in PHP (PDO).</p>
                                                        </div>
                                                    </div> -->
                                                    <!-- End Single List  -->


                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <!-- End Skill List Area  -->


                                    <!-- Start Skill List Area 2nd  -->
                                    <?php foreach ($job as $row) { ?>
                                        <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                            <div class="content">
                                                <span class="subtitle">2007 - 2010</span>
                                                <h4 class="maintitle">Job Experience</h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4><?= $row['course']; ?></h4>
                                                                    <span><?= $row['institute']; ?></span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>4.70/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description"><?= $row['content']; ?></p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->

                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <!-- <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>Diploma in Computer Science</h4>
                                                                    <span>Works at Plugin Development (2016 -
                                                                2020)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>5.00/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description">Maecenas finibus nec sem ut
                                                                imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p>
                                                        </div>
                                                    </div> -->
                                                    <!-- End Single List  -->

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- End Skill List Area  -->
                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab  -->

                        <!-- Start Single Tab  -->
                        <div class="tab-pane fade " id="professional" role="tabpanel"
                            aria-labelledby="professional-tab">
                            <div class="personal-experience-inner mt--40">
                                <div class="row row--40">

                                    <!-- Start Single Progressbar  -->
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="progress-wrapper">
                                            <div class="content">
                                                <span class="subtitle">Features</span>
                                                <h4 class="maintitle">Design Skill</h4>
                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">PHOTOSHOT</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft"
                                                            data-wow-duration="0.5s" data-wow-delay=".3s"
                                                            role="progressbar" style="width: 100%" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100"><span
                                                                class="percent-label">100%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">FIGMA</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft"
                                                            data-wow-duration="0.6s" data-wow-delay=".4s"
                                                            role="progressbar" style="width: 95%" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100"><span
                                                                class="percent-label">95%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">ADOBE XD</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft"
                                                            data-wow-duration="0.7s" data-wow-delay=".5s"
                                                            role="progressbar" style="width: 60%" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100"><span
                                                                class="percent-label">60%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">ADOBE ILLUSTRATOR</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft"
                                                            data-wow-duration="0.8s" data-wow-delay=".6s"
                                                            role="progressbar" style="width: 70%" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100"><span
                                                                class="percent-label">70%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">DESIGN</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft"
                                                            data-wow-duration="0.9s" data-wow-delay=".7s"
                                                            role="progressbar" style="width: 90%" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100"><span
                                                                class="percent-label">90%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progressbar  -->

                                    <!-- Start Single Progressbar  -->
                                    <div class="col-lg-6 col-md-6 col-12 mt_sm--60">
                                        <div class="progress-wrapper">
                                            <div class="content">
                                                <span class="subtitle">Features</span>
                                                <h4 class="maintitle">Development Skill</h4>
                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">HTML</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft"
                                                            data-wow-duration="0.5s" data-wow-delay=".3s"
                                                            role="progressbar" style="width: 85%" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100"><span
                                                                class="percent-label">85%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">CSS</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft"
                                                            data-wow-duration="0.6s" data-wow-delay=".4s"
                                                            role="progressbar" style="width: 80%" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100"><span
                                                                class="percent-label">80%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">JAVASCRIPT</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft"
                                                            data-wow-duration="0.7s" data-wow-delay=".5s"
                                                            role="progressbar" style="width: 90%" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100"><span
                                                                class="percent-label">90%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">SOFTWARE</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft"
                                                            data-wow-duration="0.8s" data-wow-delay=".6s"
                                                            role="progressbar" style="width: 75%" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100"><span
                                                                class="percent-label">75%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">PLUGIN</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft"
                                                            data-wow-duration="0.9s" data-wow-delay=".7s"
                                                            role="progressbar" style="width: 70%" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100"><span
                                                                class="percent-label">70%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progressbar  -->

                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab  -->

                        <!-- Start Single Tab  -->
                        <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                            <div class="personal-experience-inner mt--40">
                                <div class="row">
                                    <!-- Start Skill List Area  -->
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="content">
                                            <span class="subtitle">2007 - 2010</span>
                                            <h4 class="maintitle">Education Quality</h4>
                                            <div class="experience-list">

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Personal Portfolio April Fools</h4>
                                                                <span>University of DVI (1997 - 2001)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.30/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">The education should be very
                                                            interactual. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4> Examples Of Personal Portfolio</h4>
                                                                <span>College of Studies (2000 - 2002)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.50/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Maecenas finibus nec sem ut
                                                            imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Tips For Personal Portfolio</h4>
                                                                <span>University of Studies (1997 - 2001)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.80/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description"> If you are going to use a passage.
                                                            Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->

                                    <!-- Start Skill List Area 2nd  -->
                                    <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                        <div class="content">
                                            <span class="subtitle">2007 - 2010</span>
                                            <h4 class="maintitle">Job Experience</h4>
                                            <div class="experience-list">

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Diploma in Web Development</h4>
                                                                <span>BSE In CSE (2004 - 2008)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.70/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Contrary to popular belief. Ut
                                                            tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>The Personal Portfolio Mystery</h4>
                                                                <span>Job at Rainbow-Themes (2008 - 2016)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.95/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Generate Lorem Ipsum which looks. Ut
                                                            tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Diploma in Computer Science</h4>
                                                                <span>Works at Plugin Development (2016 -
                                                                    2020)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>5.00/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Maecenas finibus nec sem ut
                                                            imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->
                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab  -->

                        <!-- Start Single Tab  -->
                        <div class="tab-pane fade" id="interview" role="tabpanel" aria-labelledby="interview-tab">
                            <div class="personal-experience-inner mt--40">
                                <div class="row">
                                    <!-- Start Skill List Area  -->
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="content">
                                            <span class="subtitle">2007 - 2010</span>
                                            <h4 class="maintitle">Company Experience</h4>
                                            <div class="experience-list">

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="300"
                                                    data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Personal Portfolio April Fools</h4>
                                                                <span>University of DVI (1997 - 2001)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.30/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">The education should be very
                                                            interactual. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500"
                                                    data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4> Examples Of Personal Portfolio</h4>
                                                                <span>College of Studies (2000 - 2002)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.50/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Maecenas finibus nec sem ut
                                                            imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="700"
                                                    data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Tips For Personal Portfolio</h4>
                                                                <span>University of Studies (1997 - 2001)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.80/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description"> If you are going to use a passage.
                                                            Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->

                                    <!-- Start Skill List Area 2nd  -->
                                    <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                        <div class="content">
                                            <span class="subtitle">2007 - 2010</span>
                                            <h4 class="maintitle">Job Experience</h4>
                                            <div class="experience-list">

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500"
                                                    data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Diploma in Web Development</h4>
                                                                <span>BSE In CSE (2004 - 2008)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.70/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Contrary to popular belief. Ut
                                                            tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="700"
                                                    data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>The Personal Portfolio Mystery</h4>
                                                                <span>Job at Rainbow-Themes (2008 - 2016)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.95/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Generate Lorem Ipsum which looks. Ut
                                                            tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="900"
                                                    data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Diploma in Computer Science</h4>
                                                                <span>Works at Plugin Development (2016 -
                                                                    2020)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>5.00/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Maecenas finibus nec sem ut
                                                            imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->
                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Resume Area -->


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
    <div class="backto-top">
        <div>
            <i data-feather="arrow-up"></i>
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
    // document.getElementById('addToCartButton').addEventListener('click', function (event) {
    //     <?php if (!$loggedIn): ?>  // If user not logged in, prevent submission
    //         event.preventDefault();
    //         // Redirect to login page (rewritten URL)
    //         window.location.href = "login";
    //     <?php endif; ?>
    // });
</script>