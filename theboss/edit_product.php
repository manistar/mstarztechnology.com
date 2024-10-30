<?php 
include('header.php');

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
        <?php include('include/isset.php');
            if(isset($_GET['pID'])){
    
                $id = $_GET['pID'];
                $data = $d->fastgetwhere("products", "ID = ?", $id, "details");
            }
        ?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Upload New Application</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="edit_product.php?pID=<?= $_GET['pID']; ?>" enctype='multipart/form-data'>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">App Title</label>
                      <input type="text" name="title" class="form-control" value="<?= $data['title']; ?>" id="" placeholder="Enter App Title" required/>
                    </div>

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">Uploader Name</label>-->
                    <!--  <input type="text" name="name" class="form-control" id="" value="<?= $data['name']; ?>" placeholder="Enter Upload Name" required/>-->
                    <!--</div>-->

                    <div class="form-group">
                      <label for="exampleInputEmail1"> Amount</label>
                      <input type="text" name="amount" class="form-control" id="" value="<?= $data['amount']; ?>" placeholder="Enter App Price"/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">YouTube Video Link</label>
                      <input type="text" name="youtube" class="form-control" id="" value="<?= $data['youtube']; ?>" placeholder="Kindly Upload YouTube Embeded Link e.g https://www.youtube.com/embed/Ohe_JzKksvA"/>
                    </div>

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputPassword1">App Details</label>-->
                    <!--  <textarea class="form-control" style="height:100px;" name="title_content" value="" id="" cols="30" rows="10"><?= $data['title_content']; ?></textarea>-->
                    <!--</div>-->

                         <div class="modal-body">
                            <!--mytextarea-->
                     <div class="form-group">
                      <label for="exampleInputEmail1">App Details</label>
                      <textarea id="custtomtextarea" type="text" name="content" cols="30" rows="10" placeholder="Enter details here" /><?php if(!empty($data['content'])){echo $data['content'];} ?></textarea>
                      
                      <!--<textarea id="email_message" type="text" style="height:310px; width:100%" name="content" class="form-control" placeholder="Enter details here" /><?php if(!empty($data['content'])){echo $data['content'];} ?></textarea>-->
                    </div>

                    <div><img style="width:100px;  height: 100px;" src="../downloads/upload/<?php echo $data['img'];?>"></div>
                    
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputPassword1">App Details</label>-->
                    <!--  <textarea class="form-control" style="height:100px;" name="content" id="" cols="30" rows="10"><?= $data['content']; ?></textarea>-->
                    <!--</div>-->
                    <!--Image upload-->
                    <!--<p><img src="upload/<?=$data['img']?>" alt="image" width="60px" height="60px" /></p>-->
                <!--echo "<img src="upload/<?=$data['img'];?> alt='img'">-->
                  
                    <!--<img style="width:100px;" scr="upload/<?=$data['img'];?> <?=$data['img'];?>" alt="">-->
                    <!--<img style="width:100px;" src="upload/<?php if(!empty($data['img'])){echo $data['img'];} ?>" alt="">-->
                    
                    <div class="form-group">
                      <label for="exampleInputFile">Upload App Image </label>
                      <input type="file" name="img" />
                  <hr />
                  
                     <p><?= $data['software'];?></p>
                      <label for="exampleInputFile">Upload .exe File </label>
                      <input type="file" name="uploaded_file" />       

                      
                    </div>
                    <div class="checkbox">
                      <label>
                        <!--<input type="checkbox" name="type" value="ads"> Advert-->
                      </label>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="update_apps" class="btn btn-primary">Update APP</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>