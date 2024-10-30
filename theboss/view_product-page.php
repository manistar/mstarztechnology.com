<?php include('header.php'); 
// $faqs= database::getInstance()->fastget($what_to_get="faq",$order_by="date",$limit=";");
$faqs= database::getInstance()->fastgetwhere($what_to_get="products", "label = ?", "software", "moredetails");
?>
<style>
.pro{
    width:80%;
    margin-left:10%;
    background-color:white;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 0px rgba(141, 141, 141, 0.76);
  -o-box-shadow: 0px 0px 10px 0px rgba(141, 141, 141, 0.76);
  padding:20px 20px;
  margin-top:20px;
}
.pro h3{
    color:#68be00dc;
    margin:0;
}
.feedback b{
    margin:0;
}
</style>
<!-- DATA TABLES -->
<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> View Uploaded App </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
            <li class="active">View Uploaded App</li>
          </ol>
        </section>
        <!-- Main content -->
        <?php include('isset.php');?>
        <section class="content">
          <div class="row">
          <?php foreach ($faqs as $row ) { ?>
                        <div class="pro">
                        <div style="float:right">
                       <?php if($row['status'] == 'deploy'){ ?><a title="Remove <?php echo $row['title'];?> From Product App Page" style="background-color:transparent!important; color:red!important" href="view_product-page.php?uncheck=<?php echo $row['ID'];?>&what=products&url=view_product-page" class="btn fa fa-ban" ></a> <?php } else{?><a title="Deploy <?php echo $row['title'];?> From this Page?" style="background-color:transparent!important; color:green!important" href="view_product-page.php?check=<?php echo $row['ID'];?>&what=products&url=view_product-page" class="btn fa fa-check" ></a> <?php } ?>
     
                       
                        <a title=" Edit <?php echo $row['title'];?> Product App" style="background-color:transparent!important; color:blue!important" href="edit_product.php?pID=<?php echo $row['ID'];?>" class="btn fa fa-edit" >
                        </a>
                       
                        <a title=" Delete <?php echo $row['title'];?> Product App" style="background-color:transparent!important; color:red!important" href="view_product-page.php?did=<?php echo $row['ID'];?>&what=products&url=view_product-page" class="btn fa fa-trash" >
                        </a>
                       </div>
                            <h3><?php echo $row['ID'];?></h3>
                            <b><?php echo $row['title'];?></b> <hr>
                       <p><?php echo $row['content'];?></p>
                      
                       </div>
          <?php } ?>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
      </div><!-- /.content-wrapper -->
<?php include('footer.php');?>
 <!-- DATA TABES SCRIPT -->
 
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js" type="text/javascript"></script>
      <?php if(isset($_GET['detailsid']) || isset($_GET['link']) || isset($_GET['add']) ){
        echo "<script>
        $(window).on('load', function(){
          $('#compose-modal').modal('show');
        });
        </script>";
      }
      ?>