<?php 
include('header.php');
// under isset 
 ?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            FAQ Database
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_slider.php"><i class="fa fa-book"></i> EDIT FAQ Database</a></li>
            <li class="active"> Add FAQ Database</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <?php include('include/isset.php');
            if(isset($_GET['fID'])){
    
                $id = $_GET['fID'];
                $data = $d->fastgetwhere("faq", "ID = ?", $id, "details");
            }
        ?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Edit FAQ Utility</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="edit_faq-utility.php?fID=<?= $_GET['fID']; ?>" enctype='multipart/form-data'>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">FAQ Title</label>
                      <input type="text" name="title" class="form-control" value="<?= $data['title']; ?>" id="" placeholder="Enter App Title" required/>
                    </div>

                

                         <div class="modal-body">
                            <!--mytextarea-->
                     <div class="form-group">
                      <label for="exampleInputEmail1">FAQ Utility Details</label>
                      <textarea id="custtomtextarea" type="text" name="content" cols="30" rows="10" placeholder="Enter details here" /><?=$data['content'];?></textarea>
                      <!--<textarea id="email_message" type="text" style="height:310px; width:100%" name="content" class="form-control" placeholder="Enter details here" /><?php //if(!empty($data['content'])){echo $data['content'];} ?></textarea>-->
                    </div>

                  
                    <div class="checkbox">
                      <label>
                        <!--<input type="checkbox" name="type" value="ads"> Advert-->
                      </label>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="edit_faq-database" class="btn btn-primary">Update FAQ Database</button>
                  </div>
                </form>
              </div>
  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>