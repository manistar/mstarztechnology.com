<?php 
include('header.php');

 ?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Update Spreedsheet
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_slider.php"><i class="fa fa-book"></i> Article</a></li>
            <li class="active"> Update c</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <?php include('include/isset.php');
            if(isset($_GET['pID'])){
    
                $id = $_GET['pID'];
                $news = $d->fastgetwhere("products", "ID = ?", $id, "details");
            }
        ?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Update Spreedsheet Page</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="edit_articles.php?pID=<?= $_GET['pID']; ?>" enctype='multipart/form-data'>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Article Title</label>
                      <input type="text" name="title" class="form-control" value="<?= $news['title']; ?>" id="" placeholder="Enter Article Title" required/>
                    </div>

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">Uploader Name</label>-->
                    <!--  <input type="text" name="name" class="form-control" id="" value="<?= $data['name']; ?>" placeholder="Enter Upload Name" required/>-->
                    <!--</div>-->

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1"> Amount</label>-->
                    <!--  <input type="text" name="amount" class="form-control" id="" value="<?= $data['amount']; ?>" placeholder="Enter App Price"/>-->
                    <!--</div>-->

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">YouTube Video Link</label>-->
                    <!--  <input type="text" name="youtube" class="form-control" id="" value="<?= $data['youtube']; ?>" placeholder="Kindly Upload YouTube Embeded Link e.g https://www.youtube.com/embed/Ohe_JzKksvA"/>-->
                    <!--</div>-->

                    <div class="form-group">
                      <label for="exampleInputPassword1">Short Article Content for Readmore</label>
                      <textarea class="form-control" style="height:100px;" name="content_brief" value="" id="" cols="30" rows="10"><?= $news['title_content']; ?></textarea>
                    </div>

                         <div class="modal-body">
                            <!--mytextarea-->
                     <div class="form-group">
                      <label for="exampleInputEmail1">Article Content</label>
                      <textarea id="custtomtextarea" type="text" name="content" cols="30" rows="10" placeholder="Enter details here" /><?php if(!empty($news['content'])){echo $news['content'];} ?></textarea>
                      
                      <!--<textarea id="email_message" type="text" style="height:310px; width:100%" name="content" class="form-control" placeholder="Enter details here" /><?php if(!empty($data['content'])){echo $data['content'];} ?></textarea>-->
                    </div>

                    <div><img style="width:100px;  height: 100px;" src="../downloads/upload/image/<?php echo $news['img'];?>"></div>
                    
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
                      <input type="file" name="uploaded_file" />
                  <!--<hr />-->
                  
                     <!--<p><?= $data['img'];?></p>-->
                      <!--<label for="exampleInputFile">Upload .exe File </label>-->
                      <!--<input type="file" name="uploaded_file" />       -->

                      
                    </div>
                    <!--<div class="checkbox">-->
                    <!--  <label>-->
                        <!--<input type="checkbox" name="type" value="ads"> Advert-->
                    <!--  </label>-->
                    <!--</div>-->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="update_article" class="btn btn-primary">Update Spreedsheet</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>