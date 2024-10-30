<?php include('header.php'); 
    $data = database::getInstance()->fastget($what_to_get="contact",$order_by="date",$limit=";");
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
.type_service{
    color: red;
}
.tycv {
    color: black;
}
.type_ser{
    color: blue;
}
.typed {
    color: brown;
}

</style>
<!-- DATA TABLES -->
<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Contact </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
            <li class="active">Contact</li>
          </ol>
        </section>
        <!-- Main content -->
        <?php include('isset.php');?>
        <section class="feedback">
          <div class="row">
          <?php foreach ($data as $row ) { ?>
                        <div class="contact">
                        <div style="float:right">
                       <?php if($row['status'] == 'deploy'){ ?><a title="Remove <?php echo $row['fname'];?> Contact form Website" style="background-color:transparent!important; color:red!important" href="contact.php?uncheck=<?php echo $row['userID'];?>&what=contact&url=contact" class="btn fa fa-ban" ></a> <?php } else{?><a title="Deploy <?php echo $row['fname'];?> Contact" style="background-color:transparent!important; color:green!important" href="contact.php?check=<?php echo $row['userID'];?>&what=contact&url=contact" class="btn fa fa-check" ></a> <?php } ?>
                        
                        <a title=" Delete <?php echo $row['fname'];?> Contact" style="background-color:transparent!important; color:red!important" href="contact.php?did=<?php echo $row['ID'];?>&what=contact&url=contact" class="btn fa fa-trash" ></a>
                       </div>
                            <!--<a title=" Delete <?php echo $row['fname'];?> Contact" style="background-color:transparent!important; color:red!important" href="contact.php?did=<?php echo $row['userID'];?>&what=contact&url=contact" class="btn fa fa-trash" ></a>-->
                        
                        
                       
                    
                            <h3><?php echo $row['fname'];?></h3>
                            <b><?php echo $row['email'];?></b> 
                            <h4 class = "type_service">Phone Number:<p class = "type_ser"><?php echo $row['phone'];?></p></h4>
                            <hr>
                            <h4 class ="tycv"> Subject: <p class = "typed"><?php echo $row['subject'];?></p></h4>
                            <hr>
                            <p><?php echo $row['message'];?></p>
                      
                       </div>
                       <hr><hr>
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
