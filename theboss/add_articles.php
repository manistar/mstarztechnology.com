<?php 
include('header.php');
 ?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Articles
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="add_articles.php"><i class="fa fa-book"></i> Articles</a></li>
            <li class="active"> Add Articles</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php include('include/isset.php');?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add Articles</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="add_articles.php" enctype='multipart/form-data'>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Article Title</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Enter Article Title" required/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Short Article Content for Readmore</label>
                      <textarea class="form-control" style="height:50px;" name="content_brief" id="" cols="30" rows="10" required="" ></textarea>
                    </div>
                    
                     <div class="modal-body">
                            <!--mytextarea-->
                     <div class="form-group">
                      <label for="exampleInputEmail1">Article Content</label>
                      <textarea id="email_message" type="text" style="height:310px; width:100%" name="content" class="form-control" placeholder="Enter details here" /><?php if(!empty($data['content'])){echo $data['content'];} ?></textarea>
                    </div>
                    
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputPassword1">Main Content</label>-->
                    <!--  <textarea class="form-control" style="height:100px;" name="content" id="" cols="30" rows="10" required="" ></textarea>-->
                    <!--</div>-->
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Image</label>
                      <input type="file" name="uploaded_file" >
                    </div>

                    <!-- <div class="form-group"> -->
                      <!-- <label for="exampleInputFile">Upload Image</label> -->
                      <!-- <input type="hidden" name="uploaded_file" > -->
                    <!-- </div> -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="blogpost" class="btn btn-primary">Add News</button>
                  </div>
                </form>
              </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include('footer.php'); ?>