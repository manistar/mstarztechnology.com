<?php include('header.php');
// $sql_sel=mysql_query("select * from  lecturer")or die(mysql_error());
// $lecturer=mysql_num_rows($sql_sel);

// $sql_sel=mysql_query("select * from students")or die(mysql_error());
// $students=mysql_num_rows($sql_sel);

// $sql_sel=mysql_query("select * from  students_enroll_courses ")or die(mysql_error());
// $students_enroll_courses=mysql_num_rows($sql_sel);

// $sql_sel=mysql_query("select * from department")or die(mysql_error());
// $department=mysql_num_rows($sql_sel);

// $sql_sel=mysql_query("select * from  course")or die(mysql_error());
// $course=mysql_num_rows($sql_sel);

?>
  <!-- Right side column. Contains the navbar and content of the page -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
       ADMIN
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <style>
          .start{
            background-color: #021F4E!important;
            padding:3px 3px; border:1px solid #021F4E; color:white; margin-left:5%;
          }
        .start:hover{
            background-color: rgb(2, 25, 61);;
            color:white!important;
        }
        .accept:hover{
            background-color: green;
            color:white!important;
        }
        .reject:hover{
            background-color: red;
            color:white!important;
        }
        </style>
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Total Admin</h3>
                  <p>Admins: <b><?=$admindata?></b></p>
                </div>
                <div class="icon">
                  <i class="ion ion-users"></i>
                </div>
                <a href="staffs.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><sup style="font-size: 20px">Contacts</sup></h3>
                  <p>Total number of Contacts: <?=$contact?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-users"></i>
                </div>
                <a href="contact.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>Total Students</h3>
                  <p>Number of Students: <?=$studentdata?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="view_student_data.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>


                
        </center>
        </section>
<?php include('footer.php');?>