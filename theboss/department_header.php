<?php include('include/dept_session.php');?>
<?php //include('include/session.php');
include('include/server.php');
$dep = database::getInstance()->fastgetwhere($what_to_get="department",$where="email=?", $what="$sess_id",$limit="LIMIT 1", $status="details");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>EKSUTH| Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
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
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
    button,  .btn{
      background-color:#69be00!important;
      border: 1px solid #69be00!important;
      color: white!important;
    }
    .box{
      border-color:#69be00!important;
    }
    table .btn{
      border-color:transparent!important;
      background-color:transparent!important;
    }
  
    </style>
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header style="background-color:#69be00!important;" class="main-header">
        <!-- Logo -->
        <a style="background-color:#69be00!important;" href="index.php" class="logo"><b>EKSUTH</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav style="background-color:#69be00!important;" class="navbar navbar-static-top" role="navigation">
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
                
                  <span class="hidden-xs"><?php echo $dep['name'];?></span>
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
           <a style="font-size:15px;" href="profile.php">   <p><?php echo $dep['name'];?></p></a>

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
  <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Your Profile</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="department.php"><i class="fa fa-edit (alias)"></i> Profile</a></li>
                <li><a href="department_change_password.php"><i class="fa fa-eye"></i>Change Password</a></li>
              </ul>
            </li>
            <li><a href="department_header.php?logout"><i style="color:red;" class="fa fa-power-off"></i> Logout</a></li>
        </section>
        <!-- /.sidebar -->
      </aside>