

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
                <h3 class="card-title">User</h3>
              </div>
              <!-- ./card-header -->
              <!--<div class="card-body">-->
                  
              <!---->
              <?php if (isset($_GET['upload']) && htmlspecialchars($_GET['upload']) != "") {
    require_once "ads/upload.php";
} else { ?>
    <h4>Post Ads</h4>
    <hr>
    <form method="POST" id="foo">
        <?php
        $value             = array();
        $productcategories = $d->getall("categories", "ID", []);
        $subcategories     = $d->getall("sub_categories", "ID", []);

        if (is_array($productcategories)) {
            foreach ($productcategories as $row) {
                $id           = $row['ID'];
                $name         = $row['name'];
                $value[$name] = $id;
            }
        } else {
            // Handle the error, e.g., log the issue or display a message
            echo "No categories found or an error occurred.";
        }
        $c->create_form($cart = [
            "product name" => "text",
            "category" => $value,
            "sub category" => ["Select a category first" => ""],
            "type" => "input"
        ]);
        ?>
        <!-- <div class="form-group">
  <label for="">Select Related products</label>
<select class="js-example-basic-multiple form-co  ntrol" name="states[]" multiple="multiple">
    <?php
    if ($userproducts != "") {

        foreach ($userproducts as $row) {
            echo "<option value ='" . $row['ID'] . "'>" . $row['product_name'] . " </option>";
        }
    } else {
        echo "<option>No product available</option>";
    }
    ?>
</select>
</div> -->

        <div class="form-group">
            <label for="">Product Tags</label>
            <small>Seprate each tag with (,).</small>
            <input type="text" name="tags" id="tags" class="form-control" placeholder="tag1, tag2, tag3">
        </div>

        <div class="form-group">
            <label for="">Product Condition</label>
            <select class="form-control" name="product_condition" id="product_condition">
                <option value="new">New</option>
                <option value="used">Used</option>
            </select>
        </div>

        <label for="">Price</label>
        <div class="input-group form-inline">
            <!-- <small>Seprate each tag with (,).</small> -->
            <input type="number" name="price" id="price" class="form-control" placeholder="Product price">
            <div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i
                        class="icofont-dollar"></i></button></div>
        </div>
        <label for="">Last price</label>
        <small>leave last price to (0) if not negotiable.</small>
        <div class="input-group form-inline">

            <input type="number" name="last_price" id="last_price" class="form-control" value="0"
                placeholder="leave last price to (0) if not negotiable.">
            <div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i
                        class="icofont-dollar"></i></button></div>

        </div>

        <label for="">Product Description</label>
        <div class="form-group">
            <textarea name="description" id="description" cols="20" class="form-control"
                placeholder="Enter product description" rows="4"></textarea>
        </div>
        <input type="hidden" name="userID" value="<?= htmlspecialchars($_GET['id']); ?>">
        <input type="hidden" name="postads" id="postads">
        <div id="custommessage"></div>

        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block btn-lg">Save Product and procced</button>
        </div>

    </form>
<?php } ?>
              <!---->
              
              <!--</div>-->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
</section>


