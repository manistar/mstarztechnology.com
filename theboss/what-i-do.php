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
           What I Do
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_Blog.php"><i class="fa fa-book"></i>Professions</a></li>
            <li class="active"> Add Professions</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php require_once('include/isset.php');?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Professions</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="formid" role="form" method="POST" action="what-i-do.php" enctype='multipart/form-data'>
                <div class="box-body">

                <div class="form-group">
                      <select class="form-control" name="feather">
                          <option value="">SELECT</option>
                          <option value="<i data-feather='menu'></i>">Menu svg</option>
                          <option value="<i data-feather='book-open'></i>">Book Open svg</option>
                          <option value="<i data-feather='tv'></i>">TV svg</option>
                          <option value="<i data-feather='twitch'></i>">Twitch svg</option>
                          <option value="<i data-feather='wifi'></i>">WIFI svg</option>
                          <option value="<i data-feather='slack'></i>">Slack svg</option>
                      </select>
                    </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Enter Title" required/>
                  </div>

                  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Details</label>
                      <input type="text" name="content" class="form-control" id="" placeholder="Enter Title" required/>
                  </div> -->

                  <div class="form-group">
                      <label for="exampleInputPassword1">Message</label>
                      <textarea class="form-control" style="height:100px;" name="content" id="" cols="30" rows="10"></textarea>
                    </div>

                    <p class="Up-load">Choose location to upload at the Client Area Side</p>
                    <div class="form-group">
                    <select id="selectid" class="form-control" onchange="check()">
                          <option value="">Select</option>
                          <option value="what-i-do.php">What I Do</option>
                          <option value="portfolio.php">My Portfolio</option>
                          <option value="education.php">Education</option>
                          <option value="job-exp.php">Job Experience</option>
                          <option value="testimonial.php">Testonials Ads</option>
                          <option value="blog.php">Blog Ads</option>
                      </select>
                    </div>
                    

                    


                    <!-- <div class="form-group">
                      <select class="form-control" name="service">
                          <option value="">Select Service Type</option>
                          <option value="Services">Services</option>
                          <option value="advert">Advert</option>
                      </select>
                    </div> -->

                    <!-- <div class="form-group">
                      <label for="exampleInputFile">Upload Blog Image </label>
                      <input type="file" name="uploaded_file"  required/>
                      
                    </div> -->
                    <!-- <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type" value="ads"> Advert
                      </label>
                    </div> -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="add_what_to" class="btn btn-primary">Add Data</button>
                  </div>
                </form> 
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>