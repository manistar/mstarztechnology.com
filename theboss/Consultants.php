<?php 
include('header.php');
$notarray= database::getInstance()->fastget($what_to_get="Consultants",$order_by="name",$limit=";");
?>
<style>
  textarea{
    background-color: rgba(255, 255, 255, 0.222)!important;
  }
  .con{
    background-color:white;
    padding:5px 5px;
    width:210px;
    margin-left:5%;
    margin-top:2%;
    box-shadow: 0px 0px 10px 0px rgba(141, 141, 141, 0.76);
  -o-box-shadow: 0px 0px 10px 0px rgb(58, 41, 31);
  display:inline-block!important;
  position: relative; 

  }
  .con:hover{
    zoom: 105%;
    cursor:pointer;

  }
  .con:hover, .link:hover{
    display:block;
  }
.links{
  position: absolute;
  margin:0;
  width:200px;
  height:97%;
  text-align:center;
  background-color:#68be00dc;
  opacity: 0;
}
.links:hover{
  background-color:#68be00dc;
  opacity: 0.9;
}
.links .sublink{
  margin-top:100px!important;

}
.links a{
  padding:10px 10px;
  background-color: white;
  text-decoration:none;
}
</style>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Consultants
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Consultants</li>
          </ol>
        </section>
        <?php include('isset.php');?>
                 <!-- COMPOSE MESSAGE MODAL -->
                 <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div style="width:50%!important; background-color:rgba(255, 255, 255, 0.693)!important;" class="modal-dialog">
        <div style="background-color: rgba(255, 255, 255, 0.222)!important;" class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-envelope-o"></i> <?php if(isset($dep['name'])){ echo 'Consultant'; }else{ echo 'Add New Consultant';} ?> </h4>
          </div>
          <section class="content">
          <div class="row">
            <!-- left column -->
            <div style="width:100%; background-color: rgba(255, 255, 255, 0.222)!important;" class="col-md-6">
              <!-- general form elements -->
              <div style="width:100%; background-color: rgba(255, 255, 255, 0.222)!important;" class="box box-primary">
                <div style="width:100%; background-color: rgba(255, 255, 255, 0.222)!important;" class="box-header">
                 
                </div><!-- /.box-header -->
                <!-- form start -->
                  </form>
                <form role="form" action="Consultants.php" method="post" enctype='multipart/form-data'>
                  <div class="box-body">
             
    

                    <div class="form-group">
                      <label for="exampleInputEmail1">Consultant Name</label>
                      <input type="text" name="name"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['name'])){echo $dep['name'];} ?>" placeholder="Consultant Name" required/>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Consultant Phone Number</label>
                      <input type="text" name="phone_number"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['phone_number'])){echo $dep['phone_number'];} ?>" placeholder="Consultant Phone Number" required/>
                    </div>

                        <div class="form-group">
                    <img style="width:100px;" src="../upload/<?php if(!empty($dep['passport'])){echo $dep['passport'];} ?>" alt="">
                      <label for="exampleInputEmail1">Upload Consultant passport <br>
                      <b style="color:red"> NB: Please don't save your image with special characters like *-/</b>
                      </label>
                      <?php if(isset($_GET['add'])){
            ?>
                      <input type="file" accept="image/*" name="file" required/>
                      <?php }else{ ?>
                        <input type="file" accept="image/*" name="file" >
                      <?PHP } ?>
                      <input style="display:none" type="text" name="passport" value="<?php if(!empty($dep['passport'])){echo $dep['passport'];} ?>">
                      <input style="display:none" type="text" name="id" value="<?php if(!empty($dep['ID'])){echo $dep['ID'];} ?>">
                    </div>
         
          <?php if(isset($_GET['add'])){
            ?>

                    <input  style="width:60%; float:right;" type="submit" name="add_con" value="Add" class="btn btn-primary">
                
            <?php
          }else{
            ?>
         
                    <input  style="width:60%; float:right;" type="submit" name="update_con" value="Update Department" class="btn btn-primary">
                 
            <?php
          }
          ?>
          
                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
               
        </section><!-- /.content -->
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <center class="box-body">
            
          
</center>
<a style="border: 1px solid !important; background-color:transparent!important; color:#69be00!important" class="btn btn-block btn-primary" href="Consultants.php?add=new" ><i class="fa fa-plus"></i> Add New Consultant</a>
<?php foreach($notarray as $row){ ?>
        
            <div class="col-md-4 con">
              <!-- Default box -->
              <div class="links"> <div class="sublink"><a href="Consultants.php?conid=<?php echo $row['ID'];?>">Edit</a> <a href="Consultants.php?condeleteid=<?php echo $row['ID'];?>">Delete</a></div> </div> 
            <img style="width:200px;" src="../upload/<?php echo $row['passport'];?>" alt="">
            <h3 style="margin:0;"><?php echo $row['name'];?></h3>
            <p><?php echo $row['phone_number'];?></p>
           
              </div><!-- /.box -->
         
<?php }?>
               
    

           

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include('footer.php'); ?>
<?php if(isset($_GET['conid']) || isset($_GET['link']) || isset($_GET['add']) ){
        echo "<script>
        $(window).on('load', function(){
          $('#compose-modal').modal('show');
        });
        </script>";
      }
      ?>