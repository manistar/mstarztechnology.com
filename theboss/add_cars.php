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
            Vehicles
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_slider.php"><i class="fa fa-book"></i> Vehicles</a></li>
            <li class="active"> Add Vehicles</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
<?php
        if(isset($_POST['add_cars'])){
        $p->upload_vehicles();
        }
?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Vehicles</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="formid" role="form" method="POST" action="add_cars.php" enctype='multipart/form-data'>
                <div class="box-body">
                    
                    
                     <div class="col-12">
                        <div style="display: flex;">
                            <select name="make" id="make" class="form-control m-5">
                                <option value="">Select Make</option>
                                <?php 
                                     foreach($make as $row){
                                        echo "<option value='".$row['ID']."'>".$row['name']."</option>";
                                   }
                                ?>

                            </select>

                <select name="model" id="model" class="form-control m-5">
                    <option value="">Select model</option>
                </select>

                <select name="year" id="year" class="form-control m-5">
                    <option value="">Select year</option>
                </select>

            </div>
    </div>
    
    <br>
    
       
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Price</label>
                      <input type="text" name="price" class="form-control" id="" placeholder="Enter Vehicle price" required/>
                  </div>
                  
                     
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Discount</label>
                      <input type="text" name="discount" class="form-control" id="" placeholder="Enter Vehicle Discount" required/>
                  </div>
                  
                  
                
                  <div class="form-group">
                      <label for="exampleInputFile">Upload Vehicle Image </label>
                      <input type="file" name="uploaded_file"  required/>
                      
                    </div>
                    
                    
                    
                  <!--<div class="form-group">-->
                  <!--  <label for="exampleInputEmail1">Vehicle Make</label>-->
                  <!--    <input type="text" name="make" class="form-control" id="" placeholder="Enter Vehicle Make" required/>-->
                  <!--</div>-->
                  
                  <!--<div class="form-group">-->
                  <!--  <label for="exampleInputEmail1">Vehicle Model</label>-->
                  <!--    <input type="text" name="model" class="form-control" id="" placeholder="Enter Vehicle Model" required/>-->
                  <!--</div>-->
                  
                  <!--<div class="form-group">-->
                  <!--  <label for="exampleInputEmail1">Vehicle Year</label>-->
                  <!--    <input type="number" name="year" class="form-control" id="" placeholder="Enter Vehicle Year" required/>-->
                  <!--</div>-->

                    <p class="Up-load">Choose location to upload at the Client Area Side</p>
                    <div class="form-group">
                      <select id="selectid" class="form-control" onchange="check()">
                          <option value="">choose</option>
                          <option value="part.php">Parts Ads</option>
                          <option value="car-advert.php">Cars Ads</option>
                          <option value="banner.php">Banner Ads</option>
                          <option value="YouTube.php">YouTube Ads</option>
                          <option value="testimonial.php">Testonials Ads</option>
                          <option value="blog.php">Blog Ads</option>
                          <option value="contact.php">Contact Ads</option>
                      </select>
                    </div>
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputPassword1">SliderBody</label>-->
                    <!--  <textarea class="form-control" style="height:100px;" name="body" id="" cols="30" rows="10"></textarea>-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputFile">Upload WheelImage </label>-->
                    <!--  <input type="file" name="file"  required/>-->
                      
                    <!--</div>-->
                    <!--<div class="checkbox">-->
                    <!--  <label>-->
                    <!--    <input type="checkbox" name="type" value="ads"> Advert-->
                    <!--  </label>-->
                    <!--</div>-->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="add_cars" class="btn btn-primary">Add Vehicle</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>