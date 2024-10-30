<?php 
include('header.php');
 ?>
<style>
.Up-load {
  color: brown;
  font-size: 20px;
}
</style>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Wheel
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_wheel.php"><i class="fa fa-book"></i> Wheel</a></li>
            <li class="active"> Add Wheel</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php require_once 'include/isset.php';?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Wheels Part Slider</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="formid" role="form" method="POST" action="part.php" enctype='multipart/form-data'>
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Wheels Title</label>
                      <input type="text" name="partty" class="form-control" id="" placeholder="Enter Part Name" required/>
                  </div>

                    <div class="form-group">
                      <select id="selected" class="form-control" name="badge">
                          <option value="">Choose Badge</option>
                          <option value="New">NEW</option>
                          <option value="Hot">HOT</option>
                      </select>
                    </div> 

                    <p class="Up-load">Choose location to upload at the Client Area Side</p>
                    <div class="form-group">
                      <select id="selectid" class="form-control" onchange="check()">
                          <option value="">Select</option>
                          <option value="part.php">Our Products</option>
                          <option value="car-advert.php">Cars Ads</option>
                          <option value="banner.php">Banner Ads</option>
                          <option value="YouTube.php">YouTube Ads</option>
                          <option value="testimonial.php">Testonials Ads</option>
                          <option value="blog.php">Blog Ads</option>
                          <option value="add_cars.php">Add Vehicles</option>
                          <option value="contact.php">Contact Ads</option>
                      </select>
                    </div> 

                    <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                      <input type="number" name="price" class="form-control" id="" placeholder="Input Amount" required/>
                  </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Discount Price</label>
                      <input type="number" name="discount" class="form-control" id="" placeholder="Discount Amount" required/>
                  </div>
 
                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Wheel Content</label>
                      <textarea class="form-control" style="height:100px;" name="body" id="" cols="30" rows="10"></textarea>
                    </div> -->


                    <div class="form-group">
                      <label for="exampleInputFile">Upload Wheel Image</label>
                      <input type="file" name="uploaded_file" >
                    </div>


                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type" value="ads"> Advert
                      </label>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="add_wheel" class="btn btn-primary">Add wheel</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>