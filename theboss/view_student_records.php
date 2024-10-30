<?php include('header.php'); 
// $faqs= database::getInstance()->fastget($what_to_get="faq",$order_by="date",$limit=";");
// $faqs= database::getInstance()->fastgetwhere($what_to_get="faq", "label = ?", "utility", "moredetails");

// $post= database::getInstance()->fastget($what_to_get="product", "label = ?", "pdf" $limit="details");

    // $reference = htmlspecialchars($_POST['reference']);
    // $post = $d->fastgetwhere($what_to_get="form_data", "reference = ?", $reference, "moredetails");
    
     if(isset($_GET['pID'])){
    
                $id = $_GET['pID'];
                $data = $d->fastgetwhere("form_data", "reference = ?", $id, "details");
            }
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
          <h1> View Student Data </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
            <li class="active">View Student Data</li>
          </ol>
        </section>
        <!-- Main content -->
        <?php include('isset.php');?>
      
         <section class="content">
       <div class="row">
         
          
                       <div class="feedback">
                        <div style="float:right">
                      <?php if($data['userID'] == 'deploy'){ ?><a title="Remove <?php echo $data['email'];?> Student Data Editor" style="background-color:transparent!important; color:red!important" href="view_student_records.php?uncheck=<?php echo $row['ID'];?>&what=form_datas&url=view_blog" class="btn fa fa-ban" ></a> <?php } else{?><a title="Deploy <?php echo $row['email'];?> blog" style="background-color:transparent!important; color:green!important" href="view_pdf.php?check=<?php echo $row['ID'];?>&what=products&url=view_blog" class="btn fa fa-check" ></a> <?php } ?>
                       <a title=" Edit <?php echo $data['fname'];?> Student Data" style="background-color:transparent!important; color:blue!important" href="edit_student_records.php?pID=<?php echo $data['ID'];?>" class="btn fa fa-edit" ></a>
                       <a title=" Delete <?php echo $data['lname'];?> Student Data" style="background-color:transparent!important; color:red!important" href="view_student_records.php?did=<?php echo $data['reference'];?>&what=form_data&url=view_student_records?pID=$row['reference'];?>" class="btn fa fa-trash" ></a>
                       </div>
                       
                           <h3><?php echo $data['reference'];?></h3>
                            <h3><?php echo $data['fname'] . " " . $data['lname'] ;?></h3>
                            <b><?php echo $data['phone']. " | " .$data['fax']. " | " . $data['email'];?></b> <hr>
                            <b><?php echo $data['cname']. " | " .$data['address']. " | " . $data['city'];?></b> <hr>
                            <b><?php echo $data['zip_code']. " | " .$data['country']. " | " . " " .$data['referral'];?></b> <hr>
                            <p>Place of Study: <?=$data['place_study'];?></p><hr>
                            <p>Greatest Fear: <?=$data['fear'];?></p><hr>
                            <!--<p><?=$data['course'];?></p><hr>-->
                            <img style="width: 265px; height: 240px;  cursor: default;" src="../form/upload/idcard/<?php echo $data['img'];?>" alt=""> <br><br>
                       <p><?php echo $data['content'];?></p>
                      
                       </div>
 
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