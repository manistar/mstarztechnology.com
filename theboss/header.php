<?php 
include('include/session.php');
    include('include/server.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include('functions/proserver.php');
    $p = new product;
    $d = new Database;
    $adminID = $sess_id;
    $row = database::getInstance()->admin_details($adminID);
    require_once "include/getall.php";
    // $make = $_POST['make'];
        // $generation = $_POST['generation'];
    // $year = $_POST['year_from'];
    $make = $d->fastget("make", "ID", ";");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>MSTARZ-TECH | Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <!--<title>Document</title>-->
    
    <!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>-->
    
    <!-- <script>--> 
    <!--  tinymce.init({-->
    <!--    selector: '.mytextarea',-->
    <!--    plugins: [-->
    <!--      'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',-->
    <!--      'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',-->
    <!--      'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'-->
    <!--    ],-->
    <!--    toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +-->
    <!--      'alignleft aligncenter alignright alignjustify | ' +-->
    <!--      'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'-->
    <!--  });-->
    </script>
    
    <!--<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">-->
    <!--<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>-->
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!--For the text area formating-->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    
    <!--For rich text editor copy below code-->
    <!-- Include Quill stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="src\richtext.min.css">
    <!--End-->


    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
    button,  .btn{
      background-color:#191970!important;
      border: 1px solid #191970!important;
      color: white!important;
    }
    .box{
      border-color:#191970!important;
    }
    table .btn{
      border-color:transparent!important;
      background-color:transparent!important;
    }
    .social-link{
                    display:flex;
                  }
                  .social-link i{
                    border-color:transparent!important; 
                    border-radius:0px; 
                    padding-bottom:12px;
                  }
                  

        .ref_img{
            width: 50%;
        }
    </style>
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header style="background-color:#191970!important;" class="main-header">
        <!-- Logo -->
        <a style="background-color:#191970!important;" href="index.php" class="logo"><b>MSTARZtech ADMIN</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav style="background-color:#191970!important;" class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
               
                
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
           
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="profile.php" class="dropdown-toggle" >
                  <img src="upload/<?=$row["profile_img"];?>" class="user-image" alt=""/>
                  <span class="hidden-xs"><?php echo $row['name'];?></span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
           
            </div>
            <div class="pull-left info">
           <a style="font-size:15px;" href="profile.php"><p><?php echo $row['name'];?></p></a>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Home</span> 
              </a>
            </li>
            
             <!--About Us-->
             <li class="treeview">  
              <a href="#">
                <i class="fa fa-home"></i>
                <span>Client Page Control</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <!--<li><a href="about_leanbay.php"><i class="fa fa-hospital-o"></i>About Leanbay</a></li>-->
                <li><a href="home-client.php"><i class="fa fa-home"></i>Home Page</a></li>
                <!-- <li><a href="add_cars.php"><i class="fa fa-home"></i>Add Vechicles</a></li> -->
                <li><a href="view-home.php"><i class="fa fa-home"></i>View Home Control Panel</a></li>
                 <!--<li><a href="add-vehicles.php"><i class="fa fa-home"></i>Add Vechicles</a></li>-->
              </ul>
 

            <!--About Us-->
                  <li class="treeview">
              <a href="#">
                <i class="fa fa-hospital-o"></i>
                <span>About</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <!--<li><a href="about_leanbay.php"><i class="fa fa-hospital-o"></i>About Leanbay</a></li>-->
                <li><a href="edit_about.php"><i class="fa fa-hospital-o"></i>Edit About Us</a></li>
              </ul>
              
              <li class="treeview">
              <a href="contact.php">
                <i class="fa fa-address-book"></i>
                <span>Contacts</span>
                <!--<i class="fa fa-angle-left pull-right"></i>-->
              </a>
            </li>
              <!--About End-->
            
            <!--<li class="treeview">-->
            <!--  <a href="about_leanbay.php">-->
            <!--    <i class="fa fa-hospital-o"></i>-->
            <!--    <span>About Leanbay</span>-->
               
            <!--  </a>-->
                </li>
                    <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>People & Companies</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="cmd.php"><i class="fa fa-user"></i>Managing Director</a></li>
                <li><a href="cmac.php"><i class="fa fa-user"></i>Team Leaders</a></li>
                <li><a href="da.php"><i class="fa fa-user"></i>Directors</a></li> -->
                <!--<li><a href="ddns.php"><i class="fa fa-user"></i>Partners</a></li>-->
                
                
              <!-- </ul>
            </li> -->

            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-sitemap"></i>
                <span>Manage Department</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu"> -->
              <!--<li><a href="view_Departments.php?add"><i class="fa fa-plus"></i> Add Department</a></li>-->
                <!--<li><a href="view_Departments.php"><i class="fa fa-eye"></i>View Departments</a></li>-->
              <!-- </ul>
            </li> -->
            
            <!-- <li class="treeview">
              <a href="manage_slider.php">
                <i class="fa fa-desktop"></i>
                <span>Manage Slider</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="product_upload.php">
                <i class="fa fa-upload"></i>
                <span>Upload Products</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="product_upload.php"><i class="fa fa-plus"></i> Upload Products</a></li>
                <li><a href="view_product-page.php"><i class="fa fa-eye"></i>View Product Page</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-upload"></i>
                <span>Upload Articles</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="add_articles.php"><i class="fa fa-plus"></i> Add Articles</a></li>
                <li><a href="view_articles.php"><i class="fa fa-eye"></i>View Articles</a></li>
              </ul>
            </li> -->



 <!--Sub Menu catelog-->
<style>
.dropbtn {
  /*background-color: #04AA6D;*/
  color: white;
  /*padding: 16px;*/
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

.in:hover {
    background-color: brown;
}

.in a:hover {
    color: yellow;
}
</style>
            <li class="treeview">
              <a href="#">
                <!--<i class="fa fa-microphone"></i>-->
                <i class="fa fa-upload"></i>
                <span>Add Cars Types</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                  <div class="dropdown">
                        <button class="dropbtn">ADD CARS</button>
                      <div class="dropdown-content">
                          <li>
                            <a href="add_cars.php"><i class="fa fa-plus"></i>Upload Cars</a>
                             </li>
                            <ul class="in">
                               <!--<a href="view_pdf.php"><i class="fa fa-eye"></i> View Pdf</a> -->
                            </ul>
                      </div>
                  </div>
              
            <!--<li class="subnav-content">-->
            <!--    <a href="view_pdf.php"><i class="fa fa-plus"></i> View Pdf</a>-->
            <!--</li>-->
                  
              
              <!--<div class="dropdown">-->
              <!--          <button class="dropbtn">EXCEL WORKSHEET</button>-->
              <!--        <div class="dropdown-content">-->
                          
                            <!--<li><a href="add_spreedsheet.php"><i class="fa fa-plus"></i> Add Excel Worksheet</a></li>-->
                            <!--<ul class="in">-->
                            <!--  <a href="view_spreedsheet.php"><i class="fa fa-eye"></i> View Excel Worksheet</a>  -->
                            <!--</ul>-->
                            
                          
                  <!--    </div>-->
                  <!--</div>-->
              <!--<li><a href="add_video.php"><i class="fa fa-plus"></i> Add Video</a></li>-->
              <!--<ul class="in">-->
              <!--    <a href="view_video.php"><i class="fa fa-eye"></i> View Video</a>-->
              <!--</ul>-->
              <!--<li><a href="add_doc.php"><i class="fa fa-plus"></i> Add Word Document</a></li>-->
              <!--<ul class="in">-->
              <!--    <a href="view_word.php"><i class="fa fa-eye"></i> View Word Document</a>-->
              <!--</ul>-->
              <!--<li><a href="add_dwg.php"><i class="fa fa-plus"></i> Add CAD Drawing (.dwg)</a></li>-->
              <!--<ul class="in">-->
              <!--    <a href="view_caddrawing.php"><i class="fa fa-eye"></i> View CAD Drawing (.dwg)</a>-->
              <!--</ul>-->
                <!--<li><a href="view_resources.php"><i class="fa fa-eye"></i>View Resources</a></li>-->
              </ul>
            </li>

                 <!-- <li class="treeview">
              <a href="#"> -->
                <!--<i class="fa fa-microphone"></i>-->
                <!-- <i class="fa fa-question"></i>
                <span>Upload FAQ</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="add_faq.php"><i class="fa fa-plus"></i> Add FAQ Utility</a></li>
              <li><a href="view-faq-utility.php"><i class="fa fa-plus"></i> View FAQ Utility</a></li>
              <li><a href="add_faq-database.php"><i class="fa fa-plus"></i> Add FAQ Database</a></li>
              <li><a href="view-faq-database.php"><i class="fa fa-plus"></i> View FAQ Database</a></li> -->
               <!--<li><a href="add_pdf.php"><i class="fa fa-plus"></i> Add FAQ</a></li>-->
              <!-- </ul>
            </li> -->

                    <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-user-md"></i>
                <span>Consultants</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="Consultants.php?add"><i class="fa fa-plus"></i> Add Consultant</a></li>
                <li><a href="Consultants.php"><i class="fa fa-eye"></i>View Consultants</a></li>
              </ul>
            </li> -->
    <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-bell-o"></i>
                <span>Manage Students</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              
                <li><a href="view_students.php"><i class="fa fa-eye"></i> See all Students</a></li>
              </ul>
            </li> -->

             <!-- <li class="treeview">
              <a href="attendance_list.php">
                <i class="fa fa-desktop"></i>
                <span>Attendance</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li> -->
            <li class="treeview">
              <a href="feedbacks.php">
                <i class="fa fa-comment"></i>
                <span>Feedback</span>
               
              </a>
            </li>
            
             <li class="treeview">
              <a href="student-data/students.php">
                <i class="fa fa-cubes"></i>
                <span>Trainees Data</span>
               
              </a>
            </li>
            
             <li class="treeview">
              <a href="lock.php?lockscreen">
                <i class="fa fa-lock"></i>
                <span>Lock</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Your Profile</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="profile.php"><i class="fa fa-edit (alias)"></i> Profile</a></li>
                <li><a href="change_password.php"><i class="fa fa-eye"></i>Change Password</a></li>
              </ul>
            </li>
            <li class="treeview"><a href="index.php?logout"><i style="color:red;" class="fa fa-power-off"></i> Logout</a></li>
        </section>
        <!-- /.sidebar -->
      </aside>