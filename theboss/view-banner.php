<?php include('header.php'); 
// $faqs= database::getInstance()->fastget($what_to_get="faq",$order_by="date",$limit=";");
// $faqs= database::getInstance()->fastgetwhere($what_to_get="faq", "label = ?", "utility", "moredetails");

// $post= database::getInstance()->fastget($what_to_get="user_page",$order_by="userID",$limit=";");

$banners = $d->fastgetwhere("user_page", "label = ?", "banner", "moredetails");
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
.bbu {
    color: red;
    font-size: 20px;
}
</style>
<!-- DATA TABLES -->
<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> EDIT BANNERS </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
            <li class="active">Wheels</li>
          </ol>
        </section>
        <!-- Main content -->
        <?php include('isset.php');?>
        <section class="content">
          <div class="row">
          <?php foreach ($banners as $row ) { ?>
                        <div class="feedback">
                        <div style="float:right">
                       <?php if($row['img'] == 'deploy'){ ?><a title="Remove <?php echo $row['userID'];?> Banner Editor" style="background-color:transparent!important; color:red!important" href="view_banner.php?uncheck=<?php echo $row['ID'];?>&what=user_page&url=view-banner" class="btn fa fa-ban" ></a> <?php } else{?><a title="Deploy <?php echo $row['partty'];?> user_page" style="background-color:transparent!important; color:green!important" href="view-banner.php?check=<?php echo $row['ID'];?>&what=user_page&url=view-banner" class="btn fa fa-check" ></a> <?php } ?>
                        <a title=" Edit <?php echo $row['img'];?> WHEEL" style="background-color:transparent!important; color:blue!important" href="edit-banner.php?pID=<?php echo $row['ID'];?>" class="btn fa fa-edit" ></a>
                        <a title=" Delete <?php echo $row['img'];?> WHEEL" style="background-color:transparent!important; color:red!important" href="view-banner.php?did=<?php echo $row['ID'];?>&what=user_page&url=view-banner" class="btn fa fa-trash" ></a>
                       </div>
                       
                            <h3><?php echo $row['userID'];?></h3>
                            <h4><?php echo $row['partty'];?></h4>
                            <p class="bbu"><?php echo $row['badge'];?></p>
                            <hr>
                            <img style="width: 320px; height: 240px;  cursor: default;" src="../upload/banner/<?=$row['img'];?>" alt="">
                       <p><?php echo $row['des'];?></p>
                      
                       </div>
          <?php } ?>
            </div>
          </div>
        </section>
      </div>

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