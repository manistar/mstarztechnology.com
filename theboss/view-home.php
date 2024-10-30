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
           Home Control
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_Landscape Part Ads Slider.php"><i class="fa fa-book"></i> Control Panel</a></li>
            <li class="active">Select Control Panel Action</li>
          </ol>
        </section>

        <!-- Main content --> 
        <section class="content">
<?php require_once 'include/isset.php';?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">View Home Control Panel</h3>
                </div><!-- /.box-header -->


                <!-- form start -->
                <form id="formid" role="form" method="POST" action="home-client.php" enctype='multipart/form-data'>
                  <div class="box-body">
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">Car Type</label>-->
                    <!--  <input type="text" name="cart" class="form-control" id="" placeholder="Enter Car Type" required/>-->
                    <!--</div>-->

                    <p class="Up-load">Choose location to upload at the Client Area Side</p>
                    <div class="form-group">
                      <select id="selectid" class="form-control" onchange="check()">
                          <option value="">Select Page to Control</option>
                          <option value="view_what-i-do.php">View What I Do</option>
                          <option value="view_portfolio.php">View My Portfolio</option>
                          <option value="view_education.php">View Education</option>
                          <option value="view_job-exp.php">View Job Experience</option>
                          <option value="view_testimonial.php">View Testonials Ads</option>
                          <option value="view_blog.php">View Blog Ads</option>
                      </select>
                    </div> 

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">Add Model</label>-->
                    <!--  <input type="text" name="carm" class="form-control" id="" placeholder="Car Model" required/>-->
                    <!--</div>-->
                    
                    <!-- <div class="form-group"> 
                      <label for="exampleInputPassword1">Landscape Part Ads SliderBody</label>
                      <textarea class="form-control" style="height:100px;" name="body" id="" cols="30" rows="10"></textarea>
                    </div> -->
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputFile">Upload Image</label>-->
                    <!--  <input type="file" name="uploaded_file" >-->
                    <!--</div>-->


                 

                    <!-- <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type" value="ads"> Advert
                      </label>
                    </div> -->
                  <!--</div>-->
                  <!-- /.box-body -->
                  <!--<div class="box-footer">-->
                  <!--  <button type="submit" name="add_Landscape" class="btn btn-primary">Add Ads</button>-->
                  <!--</div>-->
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>