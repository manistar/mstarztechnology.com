<?php 
require_once "inis/ini.php";
// echo $_GET['pID']; 

?>

<!-- <div class="modal fade" id="exampleModalCenters" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-news" role="document">
            <div class="modal-content"> -->

                <!-- <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div> -->

                <!-- End of .modal-header -->
                    <?php
                    // Convert the timestamp to seconds
                    $postTime = strtotime($blog_single['created_at']);  
                    $timeAgo = $d->ago($postTime);  // Get the "time ago" message
                    ?>
                <div class="modal-body">
                
                    <img src="upload/blog/<?= htmlspecialchars($blog_single['img']); ?>" alt="news modal" class="img-fluid modal-feat-img">
                    <div class="news-details">
                        <span class="date"><?= $timeAgo; ?></span>
                        <h2 class="title"><?=$blog_single['title'];?></h2>
                        <p><?=$blog_single['content'];?></p>
                       
                        
                        
                    </div>

                    <!-- Comment Section Area Start -->
                   

                        <div class="comment-inner">
                        <h3 class="title mb--40 mt--50">Leave a Reply</h3>
                        <form action="passer" id="foo">
                                            <div class="row">
                                            <?= $c->create_form($reply_blog);?>
                                                <!-- First row -->
                                            </div>

                                            <input type="hidden" name="submit_reply" value="">
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

                        
                     

                    </div>
                    <!-- Comment Section End -->
                </div>
                <!-- End of .modal-body -->
            <!-- </div>
        </div>
    </div> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../../js/my.js"></script>