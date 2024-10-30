<!-- Start Contact section -->
<div class="rn-contact-area rn-section-gap section-separator" id="contacts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle">View Website Script</span>
                    <h2 class="title">View Website</h2>
                </div>
            </div>
        </div>


        <div class="row mt--50 mt_md--40 mt_sm--40 mt-contact-sm">
            <div class="col-lg-5">
                <div class="contact-about-area">
                    <div class="thumbnail">
                        <img src="upload/cart/<?= $single_data['upload_image']; ?>" alt="Product-Image">
                        <!-- <img src="assets/images/contact/contact1.png" alt="contact-img"> -->
                    </div>
                    <div class="title-area">
                        <h4 class="title"><?= $single_data['title']; ?></h4>
                    </div>
                    <div class="title-area">
                        <h4 class="title"><?= $single_data['amount']; ?></h4>
                    </div>

                    <div class="social-area">
                        <!-- <div class="name">FIND WITH ME</div> -->
                        <div class="social-icone">
                        <form action="passer" method="post" class="add-to-cart-form" style="float: right;" id="foo">
                                                <?php
                                                $add_cart['input_data']['productID']  = $single_data['ID'];
                                                $add_cart['input_data']['no_product'] = $P->get_no_of_product_in_cart($userID, $single_data['ID']);
                                                echo $c->create_form($add_cart);
                                                ?>
                                                <input type="hidden" name="add_to_cart" value="1">
                                                <input type="hidden" name="page" value="shop">
                                                <div id="custommessage"></div>

                                                <button type="submit" class="add-to-cart" data-product-id="<?= $row['ID']; ?>"
                                                    title="Add To Cart">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </button>
                                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos-delay="600" class="col-lg-7 contact-input">

                <div class="contact-form-wrapper">

                    <br>
                    <div class="introduce">
                        <div class="description" style="font-size: 16px; line-height: 1.5; text-align: center;">
                            <?= $single_data['description']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contuct section -->


<!--         -->