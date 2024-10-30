<?php 
include('header.php');
 ?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Slider
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_slider.php"><i class="fa fa-book"></i> Slider</a></li>
            <li class="active"> Add slider</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php include('isset.php');?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Slider</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="add_slider.php" enctype='multipart/form-data'>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Slider Title</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Enter Slider Title" required/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">SliderBody</label>
                      <textarea class="form-control" style="height:100px;" name="body" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Slider Image </label>
                      <input type="file" name="file"  required/>
                      
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type" value="ads"> Advert
                      </label>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="add_slider" class="btn btn-primary">Add Slider</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>