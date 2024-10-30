<?php 
include('header.php');
$notarray= database::getInstance()->fastget($what_to_get="slider",$order_by="type",$limit=";");
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Slider
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">slider</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <center class="box-body">
            
            <p>
            <a title="Add New Slider" href="add_slider.php"><i style="color: rgba(0, 0, 0, 0.171);font-size:50px;" class="fa fa-plus"></i></a>  
            </p>
</center>
<?php include('isset.php');?>

<?php foreach($notarray as $row){ ?>



              <div style="width:80%; margin-left:10%;" class="col-md-4">
              <!-- Default box -->
              <div class="box box-solid box-default">
                <div class="box-header" title="<?php echo $row['title'];?>">
                  <h3 class="box-title"><?php echo $row['title'];?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button title="Edit News" class="btn btn-default btn-sm" data-widget=""><i  class="fa fa-pencil-square-o"></i></button>
                    <button name="delete" class="btn btn-primary btn-xs"><a style="color:white;" title="Delete Slider" href="manage_slider.php?sID=<?php echo $row['sliderID'];?>"><i class="fa fa-times"></i> </a></button>
                  </div>
                </div>
                <div class="box-body">
                <p>
                  <img style="width:330px;" src="../upload/<?php echo $row['image'];?>" alt="">
                  </p>
                  Date: <code><?php echo $row['date'];?></code>
                  <p>
                  <p><?php echo $row['body'];?></p>
                  <code><?php echo $row['type'];?></code>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
           
<?php }?>
               
    

           

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include('footer.php'); ?>