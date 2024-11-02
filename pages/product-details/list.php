
<style>
    .container{
        padding: 45px;
        border-radius: 10px;
        overflow: hidden;
        border: none;
        z-index: 1;
        background: var(--background-color-1);
        box-shadow: var(--shadow-1); 
    }
</style>

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


                <!-- <div class="modal fade" id="exampleModalCenters" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-news" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i data-feather="x"></i></span>
                                </button>
                            </div> -->

            <!-- End of .modal-header -->

            <div class="modal-body">
                <img src="upload/cart/<?= $single_data['upload_image']; ?>" alt="Product-Image">
                <div class="news-details">
                    <span class="date"><?= $single_data['date']; ?></span>
                    <h2 class="title"><?= $single_data['title']; ?></h2>
                    <div class="title-area">
                        <h4 class="title"><?= $single_data['amount']; ?></h4>
                    </div>
                    <p><?= $single_data['description']; ?></p>
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
                <br/>
                <br/>
                <br/>
                <hr />

                <!-- Comment Section Area Start -->
                <div class="comment-inner">
                    <h3 class="title mb--40 mt--50">Leave a Reply</h3>


                    <!-- <form action="passer" id="foo" onsubmit="return false">
                            <div class="row">
                                    <?= $c->create_form($products_reply);?>
                                    
                                    <input type="hidden" name="product_reply" value="">
                                    <div id="custommessage"></div>
                                <div class="col-lg-12">
                                    <input type="submit" class="rn-btn" value="SEND MESSAGE">
                                   
                                </div>
                            </div>
                        </form> -->

                        <form action="passer" id="foo">
                                            <div class="row">
                                            <?= $c->create_form($products_reply);?>
                                                <!-- First row -->
                                            </div>

                                            <input type="hidden" name="product_reply" value="">
                                            <div id="custommessage"></div>
                                            <div class="submit-row">
                                                <center>
                                                    <div class="col-md-12">
                                                        <div class="form-group " style ="padding-left: 15px">
                                                            <input type="submit" class="btn btn-success"
                                                                value="SEND MESSAGE">
                                                                <!-- <i data-feather="arrow-right"></i> -->
                                                        </div>
                                                    </div>
                                                </center>
                                            </div>

                                        </form>

                    <!-- <form action="#">
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
                    </form> -->
                </div>
                <!-- Comment Section End -->
            </div>
            <!-- End of .modal-body -->
        <!-- </div> -->
    </div>
</div>
<!-- End Modal Blog area -->