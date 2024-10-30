<?php
include('header.php');
if ($position != 'boss') { 
    ?>
    <script type="text/javascript">
    window.location= "login.php";
</script>
<?php 
}
?>
<?php 
include('server.php');
$sql_sel3=mysql_query("select * from attendance_time_date order by time_start DESC")or die(mysql_error());
$row3=mysql_num_rows($sql_sel3);


// $sql_sel1=mysql_query("select * from  lecturer where staffID='$sess_id'")or die(mysql_error());
// $course = mysql_fetch_array($sql_sel1);
// $coursestatus = $course['status'];
// $code= $course['course_taking'];

// $sql_sel=mysql_query("select * from students_enroll_courses  order by date_enroll DESC")or die(mysql_error());
// $row=mysql_num_rows($sql_sel);

// $sql_sel4=mysql_query("select * from students_enroll_courses order by date_enroll DESC")or die(mysql_error());
// $row4=mysql_num_rows($sql_sel4);
?>
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Attendance 
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Attendance</a></li>
            <li class="active">List of Attendance</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
<div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php if(!empty($row)){?> 
                
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th>Name</th>
                        <th>Date</th>
                        <th>Action</th>
                        <!-- <th>Status</th> -->
                      
                        <!-- <th>Actions</th> -->

                      </tr>
                    </thead>
                    <tbody>
                        <?php  $i=0;
                        $sql_sel5=mysql_query("select * from department")or die(mysql_error());
                        $row5 = mysql_num_rows($sql_sel5);
					while($row5=mysql_fetch_array($sql_sel5)){ 
                       
                        
                        ?>
                      <tr>
                   
                       
                        <td><?php echo $row5['name'];?></td>
                        <td><?php echo $row5['date_added'];?></td>
                        

                      
                        <td><a style="color:red;" href="delete_department.php?id=<?php  echo $row5['name'];?>" class="fa fa-trash" >Delete</a></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                      <th>Name</th>
                        <th>Date</th>
                        <th>Action</th>
             
                        <!-- <th>Actions</th> -->
                      </tr>
                    </tfoot>
                  </table>
                    <?php } ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

  </body>
</html>
