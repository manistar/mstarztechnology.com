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
            Blog
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_Blog.php"><i class="fa fa-book"></i> Blog</a></li>
            <li class="active"> Add Blog</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <?php include('include/isset.php');
            if(isset($_GET['pID'])){
    
                $id = $_GET['pID'];
                $data = $d->fastgetwhere("user_details", "ID = ?", $id, "details");
            }
        ?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Blog</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="formid" role="form" method="POST" action="edit_blog.php" enctype='multipart/form-data'>
                <div class="box-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Uploader Name</label>
                      <input type="text" name="fname" class="form-control" id="" value="<?= $data['fname']; ?>" placeholder="Uploaded By: e.g Benard Hilton" required/>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Blog Title</label>
                      <input type="text" name="title" class="form-control" id="" value="<?= $data['title']; ?>" placeholder="Enter Title" required/>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Topic</label>
                      <input type="text" name="topic" class="form-control" id="" value="<?= $data['topic']; ?>" placeholder="Enter Topic" required/>
                      
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

                    <div class="form-group">
                    <label for="exampleInputEmail1">Blog Content</label>
                    <textarea id="custtomtextarea" type="text" name="content" cols="30" rows="10"><?= $data['content']; ?></textarea>
                    </div>

                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Blog Content</label>
                      <textarea class="form-control" style="height:100px;" name="des" id="" cols="30" rows="10"></textarea>
                    </div> -->

                    <div class="form-group">
                      <select class="form-control" name="position">
                          <option value="">Uploader Position</option>
                          <option value="Admin">Admin</option>
                          <option value="staff">Staff</option>
                      </select>
                    </div>


                    <div class="form-group">
                      <select class="form-control" name="service">
                          <option value="">Select Service Type</option>
                          <option value="Services">Services</option>
                          <option value="advert">Advert</option>
                      </select>
                    </div>

                      <img src="../upload/blog/<?php echo $data['img']?>" style="height:100px; width:100px;"  alt="" srcset="">
                    <div class="form-group">
                    
                      <label for="exampleInputFile">Upload Blog Image </label>
                      <input type="file" name="uploaded_file"/>
                    
                    </div>
                    <!-- <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type" value="ads"> Advert
                      </label>
                    </div> -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="update_blogging" class="btn btn-primary">Add Blog</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>