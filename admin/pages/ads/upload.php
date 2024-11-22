<?php 
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $ads = $d->getall("products", "ID = ?", [$id], fetch: "details");

    if (is_array($ads)) {
        $images = $d->getall("products", "ID = ?", [$id], fetch: "moredetails"); 
        ?>
        
        <link rel="stylesheet" type="text/css" href="../css2/dropzone.css" />
        <link rel="stylesheet" type="text/css" href="../css2/style.css" />
        <script type="text/javascript" src="../upload/files/js/dropzone.js"></script>

        <div class="container">
            <h5>Upload image for <?= htmlspecialchars($ads['product_name']); ?></h5>
            <hr>
            
            <!-- Image upload form -->
            <div class="file_upload">
                <form action="file_upload.php?transid=<?= $id ?>&userID=<?= htmlspecialchars($_GET['id']); ?>" 
                      method="post" class="dropzone" style="background-color:transparent!important; border: 1px solid white;">
                    <div class="dz-message needsclick">
                        <strong>Drop files here or click to upload.</strong><br />
                        <span class="note needsclick">You can also drop a folder.</span> <br>
                    </div>
                </form>
                <br>
                <a href="<?= htmlspecialchars($d->geturl()); ?>" class="btn btn-primary">Refresh</a>
            </div>

            <!-- Image slider for uploaded images -->
            <?php if (!empty($images)) { ?>
                <div class="fresh-vegan pb-2">
                    <div class="trending-slider row" id="imageslider">
                        <?php foreach ($images as $img) { ?>
                            <div class="osahan-slider-item m-2 col-4" id="image<?= htmlspecialchars($img['ID']); ?>">
                                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                    <div class="list-card-osahan-2 p-3 w-30">
                                        <div class="member-plan position-absolute">
                                            <a class="badge badge-danger" style="background-color:red; color:white;" 
                                               onclick="removeimage('<?= htmlspecialchars($img['ID']); ?>')">
                                                <b class="fa fa-times"></b>
                                            </a>
                                        </div>
                                        <span class="text-decoration-none text-dark">
                                            <img src="../upload/products/<?= htmlspecialchars($img['name']); ?>" 
                                                 class="img" style="width:200px">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <p>No images uploaded for this product yet.</p>
            <?php } ?>
        </div>

        <div class="insert-post-ads1" style="margin-top:20px;"></div>

        <?php
    } else {
        echo "Product not found";
    }
} else {
    echo "No product or ads selected";
} 
?>
