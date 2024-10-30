<?php 
include('header.php');
// under isset 
 ?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit PDF
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_slider.php"><i class="fa fa-book"></i> EDIT PDF</a></li>
            <li class="active"> Add PDF</li>
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
                  <h3 class="box-title">EDIT PDF</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="edit_pdf.php?pID=<?= $_GET['pID']; ?>" enctype='multipart/form-data'>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">PDF Title</label>
                      <input type="text" name="title" class="form-control" value="<?= $data['title']; ?>" id="" placeholder="Enter App Title" required/>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">PDF Details (Short Title)</label>
                      <input type="text" name="title_content" class="form-control" id="" value="<?= $data['title_content']; ?>" placeholder=""/>
                    </div>

                    


                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">Uploader Name</label>-->
                    <!--  <input type="text" name="name" class="form-control" id="" value="<?= $data['name']; ?>" placeholder="Enter Upload Name" required/>-->
                    <!--</div>-->

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1"> Amount</label>-->
                    <!--  <input type="text" name="amount" class="form-control" id="" value="<?= $data['amount']; ?>" placeholder="Enter App Price"/>-->
                    <!--</div>-->

                    <div class="form-group">
                      <label for="exampleInputEmail1">YouTube Video Link</label>
                      <input type="text" name="youtube" class="form-control" id="" value="<?= $data['youtube']; ?>" placeholder="Kindly Upload YouTube Embeded Link e.g https://www.youtube.com/embed/Ohe_JzKksvA"/>
                    </div>

                    
                         <div class="modal-body">
                            <!--mytextarea-->
                     <div class="form-group">
                      <label for="exampleInputEmail1">PDF Details</label>
                      <textarea id="email_message" type="text" style="height:310px; width:100%" name="content" class="form-control" placeholder="Enter details here" /><?php if(!empty($data['content'])){echo $data['content'];} ?></textarea>
                    </div>

                    <div><img style="width:100px;  height: 100px;" src="../downloads/upload/image/<?php echo $data['img'];?>"></div>
                    
                    
                    <div class="form-group">
                      <label for="exampleInputFile">Upload PDF Image </label>
                      <input type="file" name="img" />
                  <hr />
                  
                     <p><?= $data['software'];?></p>
                      <label for="exampleInputFile">Upload .PDF File </label>
                      <input type="file" name="uploaded_file" />       

                      
                    </div>
                    <div class="checkbox">
                      <label>
                        <!--<input type="checkbox" name="type" value="ads"> Advert-->
                      </label>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="edit_pdf" class="btn btn-primary">Update PDF</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>