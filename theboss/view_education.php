<?php include('header.php'); 
// $faqs= database::getInstance()->fastget($what_to_get="faq",$order_by="date",$limit=";");
// $faqs= database::getInstance()->fastgetwhere($what_to_get="faq", "label = ?", "utility", "moredetails");

// $post= database::getInstance()->fastget($what_to_get="product", "label = ?", "pdf" $limit="details");
    $post = $d->fastgetwhere($what_to_get="user_details", "label = ?", "edu", "moredetails");
?>
<style>
.feedback{
    width:80%;
    margin-left:10%;
    background-color:white;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 0px rgba(141, 141, 141, 0.76);
  -o-box-shadow: 0px 0px 10px 0px rgba(141, 141, 141, 0.76);
  padding:20px 20px;
  margin-top:20px;
}
.feedback h3{
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
          <h1> View Education </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
            <li class="active">View Education</li>
          </ol>
        </section>
        <!-- Main content -->
        <?php include('isset.php');?>
        <section class="content">
          <div class="row">
          <?php foreach ($post as $row ) { ?>
                        <div class="feedback">
                        <div style="float:right">
                       <?php if($row['title'] == 'deploy'){ ?><a title="Remove <?php echo $row['content'];?> EDU Editor" style="background-color:transparent!important; color:red!important" href="view_education.php?uncheck=<?php echo $row['ID'];?>&what=user_details&url=view_education" class="btn fa fa-ban" ></a> <?php } else{?><a title="Deploy <?php echo $row['title'];?> blog" style="background-color:transparent!important; color:green!important" href="view_pdf.php?check=<?php echo $row['ID'];?>&what=products&url=view_pdf" class="btn fa fa-check" ></a> <?php } ?>
                        <a title=" Edit <?php echo $row['title'];?> EDU" style="background-color:transparent!important; color:blue!important" href="edit_blog.php?pID=<?php echo $row['ID'];?>" class="btn fa fa-edit" ></a>
                        <a title=" Delete <?php echo $row['title'];?> EDU" style="background-color:transparent!important; color:red!important" href="view_education.php?did=<?php echo $row['ID'];?>&what=user_details&url=view_education" class="btn fa fa-trash" ></a>
                       </div>
                       
                            <h3><?php echo $row['ID'];?></h3>
                            <b><?php echo $row['title'];?></b> <hr>
                            <b><?php echo $row['course'];?></b> <hr>
                            <b><?php echo $row['institute'];?></b> <hr>
                            <!-- <img style="width: 320px; height: 240px;  cursor: default;" src="../upload/<?php echo $row['img'];?>" alt=""> -->
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