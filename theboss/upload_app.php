<?php 
include('header.php');
$data= database::getInstance()->fastgetwhere($what_to_get="products",$where="ID=?", $what="62d4cb2377666",$limit="LIMIT 1", $status="details");
 ?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Application
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_slider.php"><i class="fa fa-book"></i> Product Upload</a></li>
            <li class="active"> Add App</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <?php include('include/isset.php');?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Upload New Application</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="upload_app.php" enctype='multipart/form-data'>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">App Title</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Enter App Title" required/>
                    </div>

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">Uploader Name</label>-->
                    <!--  <input type="text" name="name" class="form-control" id="" placeholder="Enter Upload Name" required/>-->
                    <!--</div>-->

                    <div class="form-group">
                      <label for="exampleInputEmail1"> Amount</label>
                      <input type="text" name="amount" class="form-control" id="" placeholder="Enter App Price" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">YouTube Video Link</label>
                      <input type="text" name="youtube" class="form-control" id="" placeholder="Kindly Upload YouTube Embeded Link e.g https://www.youtube.com/embed/Ohe_JzKksvA" required/>
                    </div>


                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputPassword1">App Details</label>-->
                    <!--  <textarea class="form-control" style="height:100px;" name="title_content" id="" cols="30" rows="10"></textarea>-->
                    <!--</div>-->

                        <div class="modal-body">
                            <!--mytextarea-->
                     <div class="form-group">
                      <label for="exampleInputEmail1">App Details</label>
                       <textarea id="custtomtextarea" type="text" name="content" cols="30" rows="10" placeholder="Enter details here" /><?php if(!empty($data['content'])){echo $data['content'];} ?></textarea>
                      <!--<textarea id="email_message" type="text" style="height:310px; width:100%" name="content" class="form-control" placeholder="Enter details here" /><?php if(!empty($data['content'])){echo $data['content'];} ?></textarea>-->
                    </div>

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputPassword1">App Details</label>-->
                    <!--  <textarea class="form-control" style="height:100px;" name="content" id="" cols="30" rows="10"></textarea>-->
                    <!--</div>-->

                    <div class="form-group">
                      <label for="exampleInputFile">Upload App Image </label>
                      <input type="file" name="img"  required/>
                  <hr />
                      <label for="exampleInputFile">Upload .exe File </label>
                      <input type="file" name="uploaded_file"  required/>       

                      
                    </div>
                    <div class="checkbox">
                      <!--<label>-->
                      <!--  <input type="checkbox" name="type" value="ads"> Advert-->
                      <!--</label>-->
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="upload_apps" class="btn btn-primary">Add APP</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>