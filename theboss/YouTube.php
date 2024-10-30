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
            YouTube
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_YouTube.php"><i class="fa fa-book"></i> YouTube</a></li>
            <li class="active"> Add YouTube</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php require_once('include/isset.php');?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New YouTube</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="formid" role="form" method="POST" action="YouTube.php" enctype='multipart/form-data'>
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">YouYube URL (Embeded)</label>
                      <input type="youtube" name="youtube" class="form-control" id="" placeholder="Input Embeded Youyube URL e.g https://www.youtube.com/embed/1KDbCmJjXbA" required/>
                  </div>

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
                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">YouTubeBody</label>
                      <textarea class="form-control" style="height:100px;" name="body" id="" cols="30" rows="10"></textarea>
                    </div> -->

                    <!-- <div class="form-group">
                      <label for="exampleInputFile">Upload YouTube Image </label>
                      <input type="file" name="file"  required/>
                    </div> -->

                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type" value="ads"> Advert
                      </label>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="add_YouTube" class="btn btn-primary">Add YouTube</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>