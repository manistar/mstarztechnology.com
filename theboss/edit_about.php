<?php include('header.php'); 

//  $dep= database::getInstance()->fastgetwhere($what_to_get="about_hospital",$where="ID=?", $what="1",$limit="LIMIT 1", $status="details");
?>

<!-- DATA TABLES -->
<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Leanbay Details </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Leanbay Details</li>
          </ol>
        </section>
        <!-- Main content -->
      

        <section class="content">
          <div class="row">
         
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
    
          <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
                <?php include('include/isset.php');
                $dep = $d->fastgetwhere("about", "ID = ?", "1", "details");
                ?>
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Contact Address</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  </form>
                <form role="form" action="edit_about.php" method="post" enctype='multipart/form-data'>
                  <div class="box-body">
                 

                   <div class="form-group">
                      <label for="exampleInputEmail1">Windsor Email</label>
                      <input type="text" name="email"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['email'])){echo $dep['email'];} ?>" placeholder="<?php echo $dep['email']?>" required/>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Windsor Phone Number</label>
                      <input type="phone" name="phone_number"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['phone_number'])){echo $dep['phone'];} ?>" placeholder="<?php echo $dep['phone']?>" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Windsor Address</label>
                     <textarea style="height:100px;" name="office_address" class="form-control" id="" placeholder="Enter Address" cols="30" rows="10"><?php if(!empty($dep['office_address'])){echo $dep['office_address'];} ?></textarea>
                    </div>
                    <div class="box-header">
                  <h3 class="box-title">Social Media links</h3><hr>
                </div><!-- /.box-header -->
                <!-- social Links -->
                <div class="form-group social-link">
                      <label for="exampleInputEmail1"> <i style="background-color:#002561!important;" class="btn fa fa-facebook"></i></label>
                      <input type="link" name="facebook"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['facebook'])){echo $dep['facebook'];} ?>" placeholder="<?php echo $dep['facebook']?>" >
                    </div>

                       <div class="form-group social-link">
                      <label for="exampleInputEmail1"> <i style="background-color:rgb(255, 132, 0)!important; " class="btn fa fa-instagram"></i> </label>
                      <input type="link" name="instagram"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['instagram'])){echo $dep['instagram'];} ?>" placeholder="<?php echo $dep['instagram']?>" >
                    </div>

                          <div class="form-group social-link">
                      <label for="exampleInputEmail1"> <i style="background-color:#498fff!important; " class="btn fa fa-twitter"></i> </label>
                      <input type="link" name="twitter"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['twitter'])){echo $dep['twitter'];} ?>" placeholder="<?php echo $dep['twitter']?>" >
                    </div>

                               <div class="form-group social-link">
                      <label for="exampleInputEmail1"> <i style="background-color:#022154!important; " class="btn fa fa-linkedin"></i> </label>
                      <input type="link" name="linkedin"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['linkedin'])){echo $dep['linkedin'];} ?>" placeholder="" >
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->

            <!-- left column -->
          <!-- left column -->
          <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
          
                  <h3 class="box-title">Windsor Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Windsor Name</label>
                      <input value="<?php if(!empty($dep['name'])){echo $dep['name'];} ?>" type="text" name="Hosname"class="form-control" id="exampleInputEmail1" placeholder="<?=$dep['name']?>" >
                    </div>
                    
                    <div class="modal-body">
                     <div class="form-group">
                      <label for="exampleInputEmail1">About Windsor</label>
                      <textarea id="email_message" type="text" style="height:310px; width:100%" name="details" class="form-control" placeholder="<?php echo $dep['details']?>" /></textarea>
                    </div>
                    <div class="form-group">
                    <img style="width:100px;" src="../upload/<?php if(!empty($dep['picture'])){echo $dep['picture'];} ?>" alt="">
                      <label for="exampleInputEmail1">Upload Windsor Entrance Picture <br>
                      <b style="color:red"> NB: Please don't save your image with special characters like *-/</b>
                      </label>
                      <input type="file" accept="image/*" name="uploaded_file">
                      <input style="display:none" type="text" name="hospitalpic" value="<?php if(!empty($dep['image'])){echo $dep['image'];} ?>">
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="box-footer">
                    <input  style="width:30%; float:right;" type="submit" name="upload_about" value="Update Windsor" class="btn btn-primary">
                  </div>
          
                </form>
        </section>
      </div><!-- /.content-wrapper -->
<?php include('footer.php');?>
 <!-- DATA TABES SCRIPT -->
 
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js" type="text/javascript"></script>
      <?php if(isset($_GET['detailsid']) || isset($_GET['link']) || isset($_GET['add']) ){
        echo "<script>
        $(window).on('load', function(){
          $('#compose-modal').modal('show');
        });
        </script>";
      }
      ?>
