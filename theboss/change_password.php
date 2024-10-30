<?php 
include('header.php');
// include('server.php');
?>
        
          <!-- Right side column. Contains the navbar and content of the page -->
       <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          <?php echo $row['name'];?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="Profile.php">profile</a></li>
            <li class="active">Change Password</li>
          </ol>
        </section>
 <section class="content">
          <div class="row">
     
            <!-- left column -->
            <div style="width:80%; margin-left:10%;" class="col-md-6">
              <!-- general form elements -->
             <a href="profile.php"> <center style="margin-left:45%;" class="lockscreen-image">
                  <?php if($row['profile_img'] != ''){ ?>
          <img style="width:80px; height: 80px;" src="upload/<?php echo $row['profile_img'];?>" alt="user image"/>
                  <?php }elseif($row['name'] == 'Male'){?>
                    <img style="width:80px; height: 80px;" src="dist/img/avatar.png" alt="user image"/>
                    No image
                  <?php }else{ ?>
                    <img style="width:80px; height: 80px;" src="upload/user.png" alt="user image"/><br>
                   <span style="Z-index:10; position:relative;"> No image </span> 
                  <?php } ?>
</center></a>

              <div  class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Change Password</h3>
                  <?php //include('errors.php')
                  ;?>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="change_password.php" method="post">
                    <?php include "include/isset.php";?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Current Password</label>
                      <input type="password" name="current_password"class="form-control"  placeholder="Enter Current Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">New Password</label>
                      <input type="password" name="password"class="form-control"  placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Confirm Password</label>
                      <input type="password" name="confirm_password"class="form-control"  placeholder="Confirm Password">
                    </div>
                   
              
                    
                    <!-- <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block">Example block-level help text here.</p>
                    </div> -->
                    <!-- <div class="checkbox">
                      <label>
                        <input  type="checkbox"> Check me out
                      </label>
                    </div> -->
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="changepass" class="btn btn-primary">Change Password</button>
                  </div>
                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include('footer.php');?>