<?php include('header.php');
$notarray= database::getInstance()->fastget($what_to_get="cmd",$order_by="ID",$limit=";"); 
?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            CMD
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> CMD</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php include('isset.php');?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">CMD Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php foreach($notarray as $row){ ?>
                <form role="form" method="POST" action="cmd.php" enctype='multipart/form-data'>
                <center> <img style="width:100px;  height: 100px; border-radius:50%;" src="../upload/<?php echo $row['image'];?>" alt="EKSUTH CMD <?php echo $row['name'];?>"> </center>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">CMD Name</label>
                      <input type="text" name="name" class="form-control" id="" value="<?php echo $row['name'];?>" placeholder="Enter CMD Name" required/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">CMD Name</label>
                      <input type="text" name="title" class="form-control" id="" value="<?php echo $row['title'];?>" placeholder="Enter CMD Title" required/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">CMD details</label>
                      <textarea  id="email_message" class="form-control" style="height:300px;" name="details" id="" cols="30" rows="10" required="" ><?php echo $row['details'];?></textarea>
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputFile">Upload CMD Picture</label>
                      <input type="file" name="file" >
                    </div>
                    <input  type="hidden" name="table_name" value="cmd">                   
                    <input  type="hidden" name="image" value="<?php echo $row['image'];?>">
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="cmd" class="btn btn-primary">Update</button>
                  </div>
                <?php } ?>
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
