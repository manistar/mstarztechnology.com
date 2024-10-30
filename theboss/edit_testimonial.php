<?php 
include('header.php');
 ?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Testimonial
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_Testimonial.php"><i class="fa fa-book"></i> Testimonial</a></li>
            <li class="active"> Add Testimonial</li>
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
                  <h3 class="box-title">Add New Testimonial</h3>
                </div><!-- /.box-header -->

                <!-- form start -->
                <form id="formid" role="form" method="POST" action="edit_testimonial.php?pID=<?=$data['ID'];?>" enctype='multipart/form-data'>
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                      <input type="text" name="fname" class="form-control" id="" value="<?= $data['fname']; ?>" placeholder="Enter Fullname" required/>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                      <input type="text" name="position" class="form-control" id="" value="<?= $data['position']; ?>"  placeholder="Enter Status" required/>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                      <input type="text" name="title" class="form-control" id="" value="<?= $data['title']; ?>" placeholder="Enter Title" required/>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Freelancing</label>
                      <input type="text" name="freelance" class="form-control" id="" value="<?= $data['freelance']; ?>" placeholder="Where in Freelancing did you met?" required/>
                  </div>

                  <div class="form-group">
                      <label for="exampleInputPassword1">Testimonial Content</label>
                      <textarea class="form-control" style="height:100px;" name="content" id="" cols="30" rows="10"><?= $data['content']; ?></textarea>
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

                    

                    
                    

                  
                    <img src="../upload/testimonials/<?php echo $data['img']?>" style="height:100px; width:100px;"  alt="" srcset="">
                    <div class="form-group">
                      <label for="exampleInputFile">Testimonial Image Background </label>
                      <input type="file" name="uploaded_file"/>
                    </div>

                    <!-- <div class="form-group">
                      <label for="exampleInputFile">Upload Testimonial Image Profile </label>
                      <input type="file" name="uploaded_file"  required/>
                    </div> -->

                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type" value="ads"> Advert
                      </label>
                    </div> 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="update_testimonials" class="btn btn-primary">Add Testimonial</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>