<?php 
include('header.php');
// $notarray= database::getInstance()->fastget($what_to_get="products",$order_by="date",$limit=";");
    $notarray= database::getInstance()->fastgetwhere($what_to_get="products", "label = ?", "software", "moredetails");
// $notarray= $d->fastget($what_to_get="products",$order_by="date",$limit=";");
// $p = new product;
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Upload Product
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Upload Product</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <center class="box-body">
            
            <p>
            <a title="Add New Slider" href="upload_app.php"><i style="color: rgba(0, 0, 0, 0.171);font-size:50px;" class="fa fa-plus"></i></a>  
            </p>
</center>
<?php include('include/isset.php');?>

<?php foreach($notarray as $row){ ?>



              <div style="width:80%; margin-left:10%;" class="col-md-4">
              <!-- Default box -->
              <div class="box box-solid box-default">
                <div class="box-header" title="<?php echo $row['title'];?>">
                  <h3 class="box-title"><?php echo $row['title'];?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button title="Edit Product" class="btn btn-default btn-sm" data-widget=""><a href='edit_product.php?pID=<?php echo $row['ID'];?>'><i class="fa fa-pencil-square-o"></i></a></button>
                    <button name="delete" class="btn btn-primary btn-xs"><a style="color:white;" title="Delete Upload" href="product_upload.php?sID=<?php echo $row['userID'];?>"><i class="fa fa-times"></i> </a></button>
                  </div>
                </div>
                <div class="box-body">
                <p>
                  <img style="width:330px;" src="../download-project/upload/<?php echo $row['img'];?>" alt="">
                  </p>
                  Date: <code><?php echo $row['date'];?></code>
                  <p>
                  <p><?php echo $row['content'];?></p>
                  <code><?php echo $row['software'];?></code>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
           
<?php }?>
               
    

           

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include('footer.php'); ?>