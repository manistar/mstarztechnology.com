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
          Banner
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_banner.php"><i class="fa fa-book"></i> Banner</a></li>
            <li class="active"> Add Banner</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php require_once('include/isset.php');?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New banner</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="formid" role="form" method="POST" action="banner.php" enctype='multipart/form-data'>
                <div class="box-body">
                  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">BannerTitle</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Enter BannerTitle" required/>
                  </div> -->

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
                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">bannerBody</label>
                      <textarea class="form-control" style="height:100px;" name="body" id="" cols="30" rows="10"></textarea>
                    </div> -->
                    
                    <div class="form-group">
                      <label for="exampleInputFile">BannerImage</label>
                      <input type="file" name="uploaded_file">
                    </div>
                    
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type" value="ads"> Advert
                      </label>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="add_banner" class="btn btn-primary">Add banner</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>