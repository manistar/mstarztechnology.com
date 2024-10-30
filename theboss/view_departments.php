<?php include('header.php'); 
$notarray= database::getInstance()->fastget($what_to_get="department",$order_by="date",$limit=";");

?>
<!-- DATA TABLES -->
<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Department </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="add_department.php">Department</a></li>
            <li class="active">List of Department</li>
          </ol>
        </section>
        <!-- Main content -->
        <?php include('isset.php');?>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
<div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <!-- COMPOSE MESSAGE MODAL -->
    <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div style="width:98%!important; background-color:rgba(255, 255, 255, 0.693)!important;" class="modal-dialog">
        <div style="background-color: rgba(255, 255, 255, 0.222)!important;" class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Add New department </h4>
          </div>
          <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Department Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  </form>
                <form role="form" action="view_departments.php" method="post" enctype='multipart/form-data'>
                  <div class="box-body">
             
                      <?php if(isset($_GET['link'])){
                        ?>
                            <div class="form-group">
                      <label for="exampleInputEmail1"><?php if(!empty($dep['name'])){echo $dep['name'];} ?> Link</label>
                     
                      <input type="text" name="link" class="form-control" value="http://www.eksuth.org.ng/admin/direct.php?link=<?php echo $dep['Link'];?>" id="exampleInputEmail1" placeholder="Name" />
                       <br><br> 
                       <label>Email</label>
                       <input type="email" name="sendemail" value="<?php echo $dep['email'];?>" class="form-control"> <br>
                     
                    <input  style="width:60%; float:right;" type="submit" name="send_link" value="Send Link" class="btn btn-primary">
              
                      </div>
                        <?php
                      } else{
                        ?>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Department Name</label>
                      <input type="text" name="name"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['name'])){echo $dep['name'];} ?>" placeholder="Name" required/>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Department Email</label>
                      <input type="text" name="email"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['email'])){echo $dep['email'];} ?>" placeholder="Email" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Department Details</label>
                      <textarea id="email_message" type="text" style="height:310px;" name="details"class="form-control" placeholder="Department Details" >
                    
                      <?php 
                      if(!empty($dep['details'])){
                        echo $dep['details']; 
                      }else{
                          ?>
                                  <body marginwidth="0" marginheight="0" contenteditable="true" class="form-control wysihtml5-editor" spellcheck="true" style="background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); cursor: text; font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 20px; letter-spacing: normal; text-align: start; text-decoration: none solid rgb(85, 85, 85); text-indent: 0px; text-rendering: auto; word-break: normal; overflow-wrap: break-word; word-spacing: 0px;">                      <h2>Introduction 
</h2>text here
<br><h2>History </h2>&nbsp;text here
<br><h2>Services
</h2>text here
<br><h2>Time of Operation</h2><span id="_wysihtml5-undo" class="_wysihtml5-temp"></span>
                    </body>
                      <?php } ?>
                    </textarea>

                    </div>
                    
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->

            <!-- left column -->
          <!-- left column -->
          <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">HOD's Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">HOD Full Name</label>
                      <input value="<?php if(!empty($dep['HODname'])){echo $dep['HODname'];} ?>" type="text" name="HODname"class="form-control" id="exampleInputEmail1" placeholder="Name" >
                    </div>
                    <div class="box-body">
                    <div style="display:none!important" class="form-group">
                      <input value="<?php if(!empty($dep['ID'])){echo $dep['ID'];} ?>" type="text" name="id"class="form-control" id="exampleInputEmail1" placeholder="ID" >
                    </div>
                    <div class="modal-body">
                     <div class="form-group">
                      <label for="exampleInputEmail1">HOD Profile</label>
                      <textarea id="email_message" type="text" style="height:310px;" name="HODprofile" class="form-control" placeholder="HOD Profile" /><?php if(!empty($dep['HODprofile'])){echo $dep['HODprofile'];} ?></textarea>
                    </div>
                    <div class="form-group">
                    <img style="width:100px;" src="../upload/<?php if(!empty($dep['HODpassport'])){echo $dep['HODpassport'];} ?>" alt="">
                      <label for="exampleInputEmail1">Upload HOD passport <br>
                      <b style="color:red"> NB: Please don't save your image with special characters like *-/</b>
                      </label>
                      <input type="file" accept="image/*" name="file">
                      <input style="display:none" type="text" name="HODpassport" value="<?php if(!empty($dep['HODpassport'])){echo $dep['HODpassport'];} ?>">
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          <?php if(isset($_GET['add'])){
            ?>
<div class="box-footer">
                    <input  style="width:60%; float:right;" type="submit" name="add_dept" value="Add Department" class="btn btn-primary">
                  </div>
            <?php
          }else{
            ?>
            <div class="box-footer">
                    <input  style="width:60%; float:right;" type="submit" name="update_dept" value="Update Department" class="btn btn-primary">
                  </div>
            <?php
          }
          ?>
          
                </form>
                <?php 
                    }
                      ?>
        </section><!-- /.content -->
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <a style="border: 1px solid !important; background-color:transparent!important; color:#69be00!important" class="btn btn-block btn-primary" href="view_departments.php?add=new" ><i class="fa fa-plus"></i> Add New Department</a>
                <?php if(!empty($notarray)){?> 
                  <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <thead>
                      <tr>
                      <th>ID</th>
                        <th>Name</th>
                       <th>Email</th>
                       <th>HOD Name</th>
                        <th>Date Added/Updated</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php foreach($notarray as $row){ ?>
                        <td><?php echo $row['ID'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['HODname'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><a title="<?php echo $row['name'];?> details" href="view_Departments.php?detailsid=<?php echo $row['ID'];?>&what=department&url=view_departments" color="green"> <span style="color:black!important;"  class="btn fa fa-eye"></span></a>
                        <a title="<?php echo $row['name'];?> Link" style="background-color:transparent!important; color:blue!important" href="view_Departments.php?link=<?php echo $row['ID'];?>&what=department&url=view_departments" class="btn fa fa-link"></a>
                      <?php if($row['status'] == 'deploy'){ ?><a title="Remove <?php echo $row['name'];?> form Website" style="background-color:transparent!important; color:red!important" href="view_Departments.php?uncheck=<?php echo $row['ID'];?>&what=department&url=view_departments" class="btn fa fa-ban" ></a> <?php } else{?><a title="Deploy <?php echo $row['name'];?>" style="background-color:transparent!important; color:green!important" href="view_Departments.php?check=<?php echo $row['ID'];?>&what=department&url=view_departments" class="btn fa fa-check" ></a> <?php } ?>
                        <a title=" Delete <?php echo $row['name'];?>" style="background-color:transparent!important; color:red!important" href="view_Departments.php?did=<?php echo $row['ID'];?>&what=department&url=view_departments" class="btn fa fa-trash" ></a>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                        <th>Name</th>
                       <th>Email</th>
                       <th>HOD Name</th>
                        <th>Date Added/Updated</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                  </table>
                    <?php } else{ ?>
                      <h4>NO DEPARTMENT ADDED YET</h4>
                    <?php }?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
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
