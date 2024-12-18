<?php 
require_once "content/head.php"; 
require_once "include/ajaxNotCount.php";
?>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
      </ul>

      <!-- <form action="report.php" method="post" class="row" style="display:flex;">
      
        <input type="datetime-local" class="form-control col-4" name="datefrom" value="<?php if (isset($_POST['datefrom'])) {
          echo $_POST['datefrom'];
        } ?>" id=""> <input type="datetime-local" class="form-control col-4 ml-1" value="<?php if (isset($_POST['dateto'])) {
           echo $_POST['dateto'];
         } ?>" name="dateto" id=""> <input type="submit" class="btn btn-dark ml-1" name="report" value="Report">
      </form> -->

      <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index" class="brand-link">
        <img src="../upload/logo/logo.png" alt="MstarzTech" class="brand-image" style="opacity: .8">
        <!-- <img src="../upload/logo/logo.png" alt="MstarzTech" class="brand-image img-circle elevation-3"
          style="opacity: .8"> -->
        <span class="brand-text font-weight-light">
          <?= website_name ?>
        </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <?php echo $data['first_name'] . ' ' . $data['last_name'] . ' <br> [' . $data['ID'] . ']'; ?>
            </a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <!-- <li class="nav-item">
                <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>
                    Templates
                </p>
                </a>
            </li> -->

            <!-- tasks  -->
            <li class="nav-item">
              <a href="index" class="nav-link">
                <i class="nav-icon  fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <!-- <span class="right badge badge-warning"><?= $count ?></span> -->
                </p>
              </a>
            </li>
            <!-- end of tasks  -->

            <!-- customer start  -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Manage your Users
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?p=users&action=add" class="nav-link">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Create new user</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?p=users" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All users</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- customer end  -->

            <!-- thrift start  -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home Control
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?p=home" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Home</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="?p=feedbacks" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Feedbacks</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="?p=ads.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Ads</p>
                  </a>
                </li> -->
              </ul>
            </li>
            <!-- thrift end  -->

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>
                  Add Cars Types
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?p=cars" class="nav-link">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>ADD CARS</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="?p=plans.php?a=list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All plans</p>
                  </a>
                </li> -->
              </ul>
            </li>


            <!-- <div class="notification-menu">
              <button id="notification-btn">
                  Notifications <span id="notification-count"><?= $v->unreadNotifications($userID) ?></span>
              </button>
              <ul id="notification-list"></ul>
            </div> -->
  <audio id="playnote" src="assets/audio/notification.mp3" preload="auto"></audio>
<?php
// Assuming $chat is your array of messages
$messageCount = count($chat);

// Return the count as a JSON response
// header('Content-Type: application/json');
// echo json_encode(['count' => $messageCount]);
?>

<li class="nav-item notification-menu">
  <a href="?p=chat" id="notification-btn" class="nav-link">
    <i class="nav-icon fas fa-bell"></i>
    <p >
      Notifications <span class="messages-count" id="messageCount"><?=$messageCount?></span>
    </p>
   
  </a>
</li>



            <li class="nav-item">
              <a href="?p=shop" class="nav-link">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Manage Shop
                </p>
              </a>
            </li>

            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Manage Admins
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="staff.php?a=add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add new Admin</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="staff.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All admins</p>
                  </a>
                </li>
              </ul>
            </li> -->

            <li class="nav-item">
              <a href="?p=student" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                  Students Data
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="lock?lockscreen" class="nav-link">
                <i class="nav-icon fas fa-lock"></i>
                <p>
                  Lock
                </p>
              </a>
            </li>



            <!-- Profile data -->

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Your Profile
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?p=profile" class="nav-link">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Profile</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?p=password" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Password</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- co-operateive end -->

            <li class="nav-item">
              <a href="?p=settings" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Settings

                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-info"></i>
                <p>
                  Web Content
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="content.php?a=general" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contact & General Info</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="content.php?a=terms" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Terms, Privacy & Policy</p>
                  </a>
                </li>
              </ul>
            </li>


            <!-- <li class="nav-item">
              <a href="?p=password.php" class="nav-link">
                <i class="nav-icon fas fa-key"></i>
                <p>
                  Password
                </p>
              </a>
            </li> -->

            <li class="nav-item">
              <a href="index?logout" class="nav-link">
                <i class="nav-icon fas fa-key"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


 