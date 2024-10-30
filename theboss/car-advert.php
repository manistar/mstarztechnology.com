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
            Car Ads
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_Car Ads.php"><i class="fa fa-book"></i> Car Ads</a></li>
            <li class="active"> Add Car Ads</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php require_once 'include/isset.php';?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Car Ads</h3>
                </div><!-- /.box-header -->


                <!-- form start -->
                <form id="formid" role="form" method="POST" action="car-advert.php" enctype='multipart/form-data'>
                <div class="box-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Car Model</label>
                      <input type="text" name="carm" class="form-control" id="" placeholder="Enter Car Model" required/>
                  </div>

                    <p class="Up-load">Choose location to upload at the Client Area Side</p>
                    <div class="form-group">
                      <select id="selectid" class="form-control" onchange="check()">
                          <option value="">Choose</option>
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
                      <label for="exampleInputPassword1">Price</label>
                      <input type="text" name="price" class="form-control" id="" placeholder="Input Price" required/>
                    </div>
 
                    <div class="form-group">
                      <label for="exampleInputPassword1">Amount Discounted</label>
                      <input type="text" name="discount" class="form-control" id="" placeholder="Discount" required/>
                    </div>

                      <div class="form-group">
                      <select id="selected" class="form-control" name="badge">
                          <option value="">Choose Badge</option>
                          <option value="New">NEW</option>
                          <option value="Hot">HOT</option>
                      </select>
                    </div> 

                    <div class="form-group">
                      <select class="form-control" name="auto">
                          <option value="">Select Gear</option>
                          <option value="Auto">Auto</option>
                          <option value="Manual">Manual</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Distance</label>
                      <input type="text" name="kph" class="form-control" id="" placeholder="Distance" required/>
                    </div>

                    <div class="form-group">
                      <select class="form-control" name="year">
                          <option value="">Select Year</option>
                          <option value="2005">2005</option>
                          <option value="2006">2006</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputFile">Upload Wheel Image</label>
                      <input type="file" name="uploaded_file">
                    </div>
                      
                    <!-- </div> -->
                    <!-- <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type" value="ads"> Advert
                      </label>
                    </div> -->

                  <!-- </div> -->
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="add_cars" class="btn btn-primary">Add Car Ads</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>