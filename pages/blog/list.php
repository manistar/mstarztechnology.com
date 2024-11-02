<div class="rn-blog-area rn-section-gap section-separator" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true"
                    class="section-title text-center">
                    <span class="subtitle">Visit my blog and keep your feedback</span>
                    <h2 class="title">My Blog</h2>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-4">
            <?php foreach ($news as $row) { 
                // Convert the timestamp to seconds
                $postTime = strtotime($row['created_at']);  
                $timeAgo = $d->ago($postTime);  // Get the "time ago" message
                ?>
                <!-- Start Single Blog -->
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" 
                    class="col">
                    <div class="rn-blog" data-bs-toggle="modal" data-bs-target="#exampleModalCenters">
                        <div class="inner">
                            <div href="javascript:void(0)" data-bs-toggle="modal" 
                                data-bs-target="#bs-example-modal-md"
                                id="chat_user_<?= $row['ID'] ?>" 
                                data-url="modal?p=blog&action=view&pID=<?= $row['ID'] ?>"
                                data-title="<?= $row['title'] ?>" 
                                data-user-id="<?= $row['ID'] ?>" class="inner">
                                
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="upload/blog/<?= $row['img']; ?>" alt="Personal Portfolio Images">
                                    </a>
                                </div>

                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)"><?= $row['topic']; ?></a>
                                        </div>
                                        <div class="meta">
                                            <span><i class="feather-clock"></i><?= $timeAgo; ?></span>
                                        </div>
                                    </div>
                                    <h4 class="title">
                                        <a href="javascript:void(0)"><?= $row['title']; ?>
                                            <i class="feather-arrow-up-right"></i>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            <?php } ?>

            <?php require_once 'content/modal.php'; ?>
        </div>
    </div>
</div>
