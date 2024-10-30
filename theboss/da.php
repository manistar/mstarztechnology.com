<?php include('header.php');
 $notarray= database::getInstance()->fastget($what_to_get="DA",$order_by="ID",$limit=";"); 
?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Director
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Director</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php include('isset.php');?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Director Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php //foreach($notarray as $row){ ?>
                <form role="form" method="POST" action="DA.php" enctype='multipart/form-data'>
                <center> <img style="width:100px;  height: 100px; border-radius:50%;" src="upload/<?php echo $row['profile_img'];?>" alt="LEANBAY DIRECTOR <?php echo $row['name'];?>"> </center>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Director Name</label>
                      <input type="text" name="name" class="form-control" id="" value="<?php echo $row['name'];?>" placeholder="Enter DA Name" required/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status in Company</label>
                      <input type="text" name="title" class="form-control" id="" value="<?php echo $row['status'];?>" placeholder="Enter Position" required/>
                    </div>
                    
                    <div class="modal-body">
                            <!--mytextarea-->
                     <div class="form-group">
                      <label for="exampleInputEmail1">Director Details</label>
                      <textarea id="email_message" type="text" style="height:310px; width:100%" name="details" class="form-control" placeholder="Enter details here" /><?php if(!empty($data['content'])){echo $data['content'];} ?></textarea>
                 </div>
                    
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputPassword1">Director Details</label>-->
                    <!--  <textarea  id="email_message" class="form-control" style="height:300px;" name="content" id="" cols="30" rows="10" required="" ><?php echo $row['content'];?></textarea>-->
                    <!--</div>-->
                    <div class="form-group">
                      <label for="exampleInputFile">Upload DA Picture</label>
                      <input type="file" name="file" >
                    </div>
                    <input  type="hidden" name="table_name" value="DA">                  
                    <input  type="hidden" name="image" value="<?php echo $row['image'];?>">
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="dir" class="btn btn-primary">Update</button>
                  </div>
                <?php //} ?>
              </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Page Script -->
    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
    </script>
<?php include('footer.php'); ?>
