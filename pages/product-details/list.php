
<?php
// $images = [];

// // Fetch product images only if a valid product ID is provided
// if (isset($_GET['id'])) {
//     $id = htmlspecialchars($_GET['id']);

//     // Fetch the product details
//     $ads = $d->getall("products", "ID = ?", [$id], fetch: "details");

//     if (is_array($ads)) {
//         // Fetch all images associated with the product
//         $images = $d->getall("image_upload", "forID = ?", [$ads['ID']], fetch: "moredetails");
//     }
// }
// $images = [
//     'products_674dd5fc24b42.png',
//     'products_672cce0011c33.jpg',
//     'products_674dd7d10797c.png' // Add more image filenames as needed
// ];

?>
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

    /* styles.css */
/* Modal container styling */
.modal {
  display: none; /* Hidden by default */
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto; /* Enable scroll if content is larger than the screen */
  background-color: rgba(0, 0, 0, 0.8); /* Black with transparency */
  justify-content: center;
  align-items: center;
}

/* Modal content container */
.modal-content {
  position: relative;
  margin: auto;
  padding: 0;
  width: 90%; /* Full width on small screens */
  max-width: 600px; /* Maximum width on larger screens */
}

/* Modal image styling */
.modal-image {
  width: 100%;
  max-height: 80vh; /* Restrict height for smaller screens */
  object-fit: contain; /* Maintain aspect ratio */
}

/* Close button styling */
.close {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 24px;
  font-weight: bold;
  cursor: pointer;
}

/* Navigation buttons styling */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  color: white;
  font-size: 30px;
  font-weight: bold;
  padding: 10px;
  background: rgba(0, 0, 0, 0.5);
  border-radius: 50%;
}

.prev {
  left: 10px;
}

.next {
  right: 10px;
}

/* Modal image styling */
.modal-image {
  width: 100%;
  max-height: 80vh; /* Restrict height for smaller screens */
  object-fit: contain; /* Maintain aspect ratio */
  transition: transform 0.3s ease-in-out; /* Smooth zoom effect */
}

/* Zoom effect when hovered or displayed */
.modal-image:hover {
  transform: scale(1.1); /* Slight zoom effect */
}

/* Adjustments for smaller screens */
@media (max-width: 768px) {
  .modal-image {
    max-width: 90%; /* Slightly larger width on mobile */
    max-height: 90vh; /* Increase height limit */
  }

  .modal-image:hover {
    transform: scale(1.15); /* Larger zoom on hover for mobile */
  }
}


.product-image {
  width: 100px;
  height: 100px;
  object-fit: cover;
  cursor: pointer;
  transition: transform 0.3s ease-in-out;
}

.product-image:hover {
  transform: scale(1.1); /* Slight zoom on hover */
}

/* Adjustments for smaller screens */
@media (max-width: 768px) {
  .product-image {
    width: calc(50% - 10px); /* Two-column layout on smaller screens */
  }

  .prev, .next {
    font-size: 24px; /* Adjust button size */
  }
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


<!-- Modal Structure -->
<div id="imageModal" class="modal">
  <div class="modal-content">
    <!-- Previous Button -->
    <span class="prev" onclick="changeImage(-1)">&#10094;</span>
    
    <!-- Image Display Area -->
    <img id="modalImage" class="modal-image" src="" alt="Image Gallery">
    
    <!-- Next Button -->
    <span class="next" onclick="changeImage(1)">&#10095;</span>
    
    <!-- Close Button -->
    <span class="close" onclick="closeModal()">&times;</span>
  </div>
</div>

<!-- Image Thumbnails to open modal -->
<div class="image-gallery">
  <?php foreach ($image_data as $image): ?>
      <img 
          src="upload/cart/<?= htmlspecialchars($image['upload_image']); ?>" 
          alt="Product-Image" 
          class="product-image" 
          onclick='openModal(<?= json_encode(array_column($image_data, "upload_image"), JSON_HEX_APOS | JSON_HEX_QUOT); ?>, "<?= htmlspecialchars($image['upload_image']); ?>")'>
  <?php endforeach; ?>
</div>






                <!-- Comment Section Area Start -->
                <div class="comment-inner">
                    <h3 class="title mb--40 mt--50">Leave a Reply</h3>


                                    
                                    
                         
      
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
                </div>
                <!-- Comment Section End -->
            </div>
            <!-- End of .modal-body -->
        <!-- </div> -->
    </div>
</div>
<!-- End Modal Blog area -->
<script>
// script.js
let currentIndex = 0;
let images = [];

function openModal(imageList, selectedImage) {
  images = imageList;
  currentIndex = images.indexOf(selectedImage);
  document.getElementById("modalImage").src = `upload/cart/${selectedImage}`;
  document.getElementById("imageModal").style.display = "flex";
}

function closeModal() {
  document.getElementById("imageModal").style.display = "none";
}

function changeImage(step) {
  currentIndex = (currentIndex + step + images.length) % images.length;
  document.getElementById("modalImage").src = `upload/cart/${images[currentIndex]}`;
}


</script>
