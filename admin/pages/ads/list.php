<?php require_once "ini.php"; ?>
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- hjdfhfdj -->
  <!-- Main content -->
  <section class="content pt-2">
    <!-- START ACCORDION & CAROUSEL-->
    <!-- <h5 class="mt-4 mb-2">Your Templates</h5> -->
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- <div class="card-header">
                        <h3 class="card-title">Users | </h3> <a href="staff.php?a=add" class="btn btn-primary">Add new user</a>
                    </div> -->
          <!-- ./card-header -->
          <div class="card-body" id="adstable">

            <!--Post Below  -->

            <?php
            require_once "include/ini-ads.php";
            ?>
            <?php
            if (isset($_GET['inner'])) {
              $tableid = "example4";
            } else {
              $tableid = "example1";
            }
            ?>

            <table id="<?= $tableid ?>" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>ID</th>
                  <th>Posted by</th>
                  <th>Products Name</th>
                  <th>Category</th>
                  <th>Image</th>
                  <!-- <th>Like</th> -->
                  <th>Price</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($ads as $row) {
                  $c->adstable($row);
                }
                ?>
              </tbody>
            </table>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
  </section>