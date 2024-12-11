<?php
if (isset($_GET['id'])) {
    $id  = htmlspecialchars($_GET['id']);
    $ads = $d->getall("products", "ID = ?", [$id], fetch: "details");

    if (is_array($ads)) {
        $images = $d->getall("image_upload", "forID = ?", [$ads['ID']], fetch: "moredetails");

        ?>

        <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

        <link rel="stylesheet" type="text/css" href="../css2/dropzone.css" />
        <link rel="stylesheet" type="text/css" href="../css2/style.css" />
        <!-- <script src="js/customDropzone.js"></script> -->

        <script type="text/javascript" src="../upload/files/js/dropzone.js"></script>



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <!-- START ACCORDION & CAROUSEL-->
                <!-- <h5 class="mt-4 mb-2">Your Templates</h5> -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Users | </h3> <button id="adduser" data-url="users/add" data-id="adduser"
                                    data-title="New Plan" onclick="modalcontent(this.id)" data-toggle="modal"
                                    data-target="#modal-lg" class="btn btn-primary">Add new user</button>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body"></div>

                            <div class="container">
                                <h5>Upload image for <?= htmlspecialchars($ads['title']); ?></h5>
                                <hr>

                                <!-- Image upload form -->
                                <div class="file_upload">
                                    <form
                                        action="index?p=file_upload&transid=<?= $id ?>&userID=<?= isset($_GET['userID']) ? htmlspecialchars($_GET['userID']) : ''; ?>"
                                        method="POST" class="dropzone" id="customDropzone"
                                        style="background-color:transparent!important; border: 1px soild white"
                                        enctype="multipart/form-data">
                                        <!-- <form action="?p=file_upload?transid=<?= $id ?>&userID=<?= htmlspecialchars($_GET['id']); ?>"  -->
                                        <!-- method="post" class="dropzone" style="background-color:transparent!important; border: 1px solid white;"> -->
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
                                                <div class="osahan-slider-item m-2 col-4"
                                                    id="image<?= htmlspecialchars($img['ID']); ?>">
                                                    <div
                                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                                        <div class="list-card-osahan-2 p-3 w-30">
                                                            <div class="member-plan position-absolute">
                                                                <a class="badge badge-danger" style="background-color:red; color:white;"
                                                                    onclick="removeimage('<?= htmlspecialchars($img['ID']); ?>')">
                                                                    <b class="fa fa-times"></b>
                                                                </a>
                                                            </div>
                                                            <span class="text-decoration-none text-dark">
                                                                <img src="../upload/cart/<?= htmlspecialchars($img['upload_image']); ?>"
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
                    <!-- /.invoice -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </section>
