<?php include('header.php');?>
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
         <?php foreach($viewstudentdata as $row){?>
         
                       <div class="feedback">
                        <div style="float:right">
                      <?php if($row['userID'] == 'deploy'){ ?><a title="Remove <?php echo $row['email'];?> Student Data Editor" style="background-color:transparent!important; color:red!important" href="view_student_records.php?uncheck=<?php echo $row['ID'];?>&what=form_datas&url=view_blog" class="btn fa fa-ban" ></a> <?php } else{?><a title="Deploy <?php echo $row['email'];?> blog" style="background-color:transparent!important; color:green!important" href="view_pdf.php?check=<?php echo $row['ID'];?>&what=products&url=view_blog" class="btn fa fa-check" ></a> <?php } ?>
                       <a title=" Edit <?php echo $row['fname'];?> Student Data" style="background-color:transparent!important; color:blue!important" href="edit_student_records.php?pID=<?php echo $row['ID'];?>" class="btn fa fa-edit" ></a>
                       <a title=" Delete <?php echo $row['lname'];?> Student Data" style="background-color:transparent!important; color:red!important" href="view_student_records.php?did=<?php echo $row['reference'];?>&what=form_data&url=view_student_records?pID=$row['reference'];?>" class="btn fa fa-trash" ></a>
                       </div>
                       
                            <h3><?php echo $row['userID'];?></h3>
                            <h3><?php echo $row['fname'];?></h3>
                            <b><?php echo $row['phone'] ." | ". $row['email'];?></b> <hr>
                            <!--<b><?=$row['zip_code'];?></b> <hr>-->
                            <!--<p>Place of Study:</p><img src "../upload/<?=$row['img'];?> <hr>-->
                            <!--<p>Greatest Fear: <?=$row['fear'];?></p><hr>-->
                            <img style="width: 265px; height: 240px;  cursor: default;" src="../form/upload/idcard/<?php echo $row['img'];?>" alt=""> <br><br>
                            <p><?= $row['content'];?></p>
                </div>
   <?php }?>
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