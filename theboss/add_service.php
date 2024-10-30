<?php 
include('header.php');
$id = '77';
$name = 'seriki';
$time1 = '8:00';
$time2 = '8:00';
$time3 = '8:00';

$insert = array("'$id',", "'$name',", "'$time1',", "'$time2',", "'$time3',");
foreach($insert as $value){
  echo  $value;
}

unset($_SESSION["deptID"]);
// if(empty($_GET['id'])){
// echo "<script language=\"Javascript\" type=\"text/javascript\">
// 	window.location=\"index.php\";
// 	</script>";
// }
?>

       <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Service to Department
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="view_department.php">Department</a></li>
            <li class="active">Add service</li>
          </ol>
        </section>
        <?php include('isset.php');?>
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
                <form role="form" action="add_department.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Department Name</label>
                      <input type="text" name="name"class="form-control" id="exampleInputEmail1" placeholder="Name" required/>
                    </div>

                      <div class="form-group">
                      <label for="exampleInputEmail1">Department Details</label>
                      <textarea type="text" style="height:200px;" name="details"class="form-control" id="exampleInputEmail1" placeholder="Department Details" required/></textarea>
                    </div>
            
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          


  
            <!-- left column -->
            <div  class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Department Servicing Hours</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div style="height:335px;" class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Monday - friday</label>
                      <input type="text" name="time1"class="form-control" id="exampleInputEmail1" placeholder="8:00am - 9:00pm" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Saturday</label>
                      <input type="text" name="time2"class="form-control" id="exampleInputEmail1" placeholder="8:00am - 9:00pm" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sunday</label>
                      <input type="text" name="time3"class="form-control" id="exampleInputEmail1" placeholder="8:00am - 9:00pm" >
                    </div>
                  

                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
          <div class="box-footer">
                    <input  style="width:80%; margin-left:10%;" type="submit" name="add_dept" value="Add Department" class="btn btn-primary">>
                  </div>
                </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include('footer.php');?>