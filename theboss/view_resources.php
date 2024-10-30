<?php include('header.php');
// $res= database::getInstance()->fastget($what_to_get="products",$order_by="userID",$limit=";");
?>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Resources
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Resources</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <center class="box-body">
            
            <!-- <p>
            <a title="Add New Resources" href="add_articles.php"><i style="color: rgba(0, 0, 0, 0.171);font-size:50px;" class="fa fa-plus"></i></a>  
            </p> -->
</center>
<?php include('include/isset.php');
require_once "../downloads/include/getall.php";
?>
<?php foreach($epdf as $row){ ?>
<div class="col-md-4">
              <!-- Default box -->
              <div class="box box-solid box-default">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $row['title'];?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button title="Edit PDF" class="btn btn-default btn-sm" data-widget=""><a href='edit_pdf.php?pID=<?php echo $row['ID'];?>'><i class="fa fa-pencil-square-o"></i></a></button>
                    <!--<button title="Edit Resources" class="btn btn-default btn-sm" data-widget=""><i  class="fa fa-pencil-square-o"></i></button>-->
                    <button name="delete" class="btn btn-primary btn-xs"><a style="color:white;" title="Delete PDF" href="view_resources.php?rID=<?php echo $row['userID'];?>"><i class="fa fa-times"></i> </a></button>
                  </div>
                </div>
                <div class="box-body">
                <p>
                  <img style="width:330px; height:200px;" src="../downloads/upload/image/<?php echo $row['img'];?>" alt="">
                  </p>
                  Date: <code><?php echo $row['date'];?></code>
                  <p>
              
                  <?php echo $row['title_content'];?>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php } ?>

<?php foreach($doc as $row){ ?>
<div class="col-md-4">
              <!-- Default box -->
              <div class="box box-solid box-default">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $row['title'];?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                     <button title="Edit DOC" class="btn btn-default btn-sm" data-widget=""><a href='edit_doc.php?pID=<?php echo $row['ID'];?>'><i class="fa fa-pencil-square-o"></i></a></button>
                    <!--<button title="Edit Resources" class="btn btn-default btn-sm" data-widget=""><i  class="fa fa-pencil-square-o"></i></button>-->
                    <button name="delete" class="btn btn-primary btn-xs"><a style="color:white;" title="Delete Doc" href="view_resources.php?ddID=<?php echo $row['userID'];?>"><i class="fa fa-times"></i> </a></button>
                  </div>
                </div>
                <div class="box-body">
                <p>
                  <img style="width:330px; height:200px;" src="../downloads/upload/image/<?php echo $row['img'];?>" alt="">
                  </p>
                  Date: <code><?php echo $row['date'];?></code>
                  <p>
              
                  <?php echo $row['title_content'];?>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php } ?>
<!-- Video -->
<?php foreach($video as $row){ ?>
<div class="col-md-4">
              <!-- Default box -->
              <div class="box box-solid box-default">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $row['title'];?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                     <button title="Edit VIDEO" class="btn btn-default btn-sm" data-widget=""><a href='edit_video.php?pID=<?php echo $row['ID'];?>'><i class="fa fa-pencil-square-o"></i></a></button>
                    <!--<button title="Edit Resources" class="btn btn-default btn-sm" data-widget=""><i  class="fa fa-pencil-square-o"></i></button>-->
                    <button name="delete" class="btn btn-primary btn-xs"><a style="color:white;" title="Delete Video" href="view_resources.php?vID=<?php echo $row['userID'];?>"><i class="fa fa-times"></i> </a></button>
                  </div>
                </div>
                <div class="box-body">
                <p>
                  <img style="width:330px; height:200px;" src="../downloads/upload/image/<?=$row['img'];?>" alt="">
                  </p>
                  Date: <code><?php echo $row['date'];?></code>
                  <p>
              
                  <?php echo $row['title_content'];?>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php } ?>

<?php foreach($dwg as $row){ ?>
<div class="col-md-4">
              <!-- Default box -->
              <div class="box box-solid box-default">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $row['title'];?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                     <button title="Edit DWG" class="btn btn-default btn-sm" data-widget=""><a href='edit_dwg.php?pID=<?php echo $row['ID'];?>'><i class="fa fa-pencil-square-o"></i></a></button>
                    <!--<button title="Edit Resources" class="btn btn-default btn-sm" data-widget=""><i  class="fa fa-pencil-square-o"></i></button>-->
                    <button name="delete" class="btn btn-primary btn-xs"><a style="color:white;" title="Delete Dwg" href="view_resources.php?dID=<?php echo $row['userID'];?>"><i class="fa fa-times"></i> </a></button>
                  </div>
                </div>
                <div class="box-body">
                <p>
                  <img style="width:330px; height:200px;" src="../downloads/upload/image/<?php echo $row['img'];?>" alt="">
                  </p>
                  Date: <code><?php echo $row['date'];?></code>
                  <p>
              
                  <?php echo $row['title'];?>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php } ?>

<?php foreach($app as $row){ ?>
<div class="col-md-4">
              <!-- Default box -->
              <div class="box box-solid box-default">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $row['title'];?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                     <button title="Edit Product" class="btn btn-default btn-sm" data-widget=""><a href='edit_product.php?pID=<?php echo $row['ID'];?>'><i class="fa fa-pencil-square-o"></i></a></button>
                    <!--<button title="Edit Resources" class="btn btn-default btn-sm" data-widget=""><i  class="fa fa-pencil-square-o"></i></button>-->
                    <button name="delete" class="btn btn-primary btn-xs"><a style="color:white;" title="Delete Dwg" href="view_resources.php?dID=<?php echo $row['userID'];?>"><i class="fa fa-times"></i> </a></button>
                  </div>
                </div>
                <div class="box-body">
                <p>
                  <img style="width:330px; height:200px;" src="../downloads/upload/<?php echo $row['img'];?>" alt="">
                  </p>
                  Date: <code><?php echo $row['date'];?></code>
                  <p>
              
                  <?php echo $row['title'];?>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php } ?>

<?php foreach($excel as $row){ ?>
<div class="col-md-4">
              <!-- Default box -->
              <div class="box box-solid box-default">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $row['title'];?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button title="Edit Excel" class="btn btn-default btn-sm" data-widget=""><a href='edit_excel.php?pID=<?php echo $row['ID'];?>'><i class="fa fa-pencil-square-o"></i></a></button>
                    <!--<button title="Edit Resources" class="btn btn-default btn-sm" data-widget=""><i  class="fa fa-pencil-square-o"></i></button>-->
                    <button name="delete" class="btn btn-primary btn-xs"><a style="color:white;" title="Delete Dwg" href="view_resources.php?dID=<?php echo $row['userID'];?>"><i class="fa fa-times"></i> </a></button>
                  </div>
                </div>
                <div class="box-body">
                <p>
                  <img style="width:330px; height:200px;" src="../downloads/upload/image/<?php echo $row['img'];?>" alt="">
                  </p>
                  Date: <code><?php echo $row['date'];?></code>
                  <p>
              
                  <?php echo $row['title_content'];?>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php } ?>

            </div>
<?php include('footer.php');?>
