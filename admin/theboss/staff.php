<?php 
include 'header.php';
?>
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
           <!-- START ACCORDION & CAROUSEL-->
           <!-- <h5 class="mt-4 mb-2">Your Templates</h5> -->
                 <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin</h3> <a href="staff.php?a=add" class="btn btn-primary">New Admin</a>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <?php
                  if(isset($_GET['a'])){
                    $page = htmlspecialchars($_GET['a']);
                  }else{
                    $page = "";
                  }
                  switch ($page) {
                    case 'add':
                      # code...
                      require_once 'content/staffs/add.php';
                      break;
                    case 'assign':
                      #code...
                      require_once 'content/staffs/assign.php';
                      break;
                      case 'assigncustomer':
                        #code...
                        require_once 'content/staffs/assign-customer.php';
                        break;
                        case 'view':
                          #code...
                          require_once 'content/staffs/view.php';
                          break;

                          case 'thrift':
                            #code...
                            require_once 'content/customers/thrift.php';
                            break;

                    default:
                      require_once 'content/staffs/list.php';
                      break;
                  }
                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
</section>

<?php require_once "footer.php"; ?>