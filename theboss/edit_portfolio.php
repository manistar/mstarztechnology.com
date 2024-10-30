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
           Upload Professions
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_Landscape Part Ads Slider.php"><i class="fa fa-book"></i> Professions</a></li>
            <li class="active">Professions Upload</li>
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
                  <h3 class="box-title">Professions </h3>
                </div><!-- /.box-header -->


                <!-- form start -->
                <form id="formid" role="form" method="POST" action="edit_portfolio.php?pID=<?=$data['ID'];?>" enctype='multipart/form-data'>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" name="title" class="form-control" id="" value="<?= $data['title']; ?>"  placeholder="Enter Title" required/>
                    </div>

                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Professions</label>
                      <input type="text" name="professions" class="form-control" id="" value="<?= $data['professions']; ?>" placeholder="Enter Professions .eg Developement or Photoshop or Web Desgin" required/>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputPassword1">Message</label>
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


                      <!-- <select id="selectid" class="form-control" onchange="check()"> -->
                          <!-- <option value="">Select</option> -->
                          <!-- <option value="home-client.php">Welcome Page</option> -->
                          <!-- <option value="education.php">Education</option> -->
                          <!-- <option value="job-exp.php">Job Experience</option> -->
                          <!-- <option value="YouTube.php">Portfolio</option> -->
                          <!-- <option value="testimonial.php">Testonials Ads</option>
                          <option value="blog.php">Blog Ads</option>
                          <option value="portfolio.php">My Portfolio</option>
                          <option value="what-i-do.php">What I Do</option> -->
                          <!-- <option value="contact.php">Contact Ads</option> -->
                      <!-- </select> -->
                    </div>



                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" name="email" class="form-control" id="" placeholder="Enter Email" required/>
                    </div>
                     -->

         
                    <!-- <div class="form-group"> 
                      <label for="exampleInputPassword1">Landscape Part Ads SliderBody</label>
                      <textarea class="form-control" style="height:100px;" name="body" id="" cols="30" rows="10"></textarea>
                    </div> -->
                    <img src="../upload/portfolio/<?php echo $data['img']?>" style="height:100px; width:100px;"  alt="" srcset="">
                    <div class="form-group">
                      <label for="exampleInputFile">Profession Image</label>
                      <input type="file" name="uploaded_file"/>
                    </div>

                    <!-- <div class="form-group">
                      <label for="exampleInputFile">Image Profile Button</label>
                      <input type="file" name="uploaded_file"  required/>
                    </div> -->


                 

                    <!-- <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type" value="ads"> Advert
                      </label>
                    </div> -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="update_portfolios" class="btn btn-primary">Add Data</button>
                  </div>
                </form> 
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>