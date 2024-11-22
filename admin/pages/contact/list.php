<?php require_once "ini.php"; ?>
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
            <h3 class="card-title">Contact</h3>
          </div>
          <!-- ./card-header -->
          <!--<div class="card-body">-->

          <!---->
          <div class="card-body" style="display: block;">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>Status</th>
                    <th>UserID</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <!-- <th>Course</th> -->
                    <th>Message</th>
                    <th>Status</th>
                    <th>Ip </th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($contact as $row) { ?>
                    <tr data-widget="expandable-table" aria-expanded="false">

                    <th>
                        <b id="success<?= $row['ID'] ?>" style="display:<?php if ($row['status'] == 1) {
                                                                            echo "block";
                                                                        } else {
                                                                            echo "none";
                                                                        } ?>; color:green">Active</b>
                        <b id="danger<?= $row['ID'] ?>" style="display:<?php if ($row['status'] == 1) {
                                                                            echo "none";
                                                                        } else {
                                                                            echo "block";
                                                                        } ?>; color:red">Deactivated<b>
                    </th>

                      <td><?= $row['userID']; ?></td>
                      <td><?= $row['fname']; ?></td>
                      <td><?= $row['phone'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <!-- <td><?= $row['course'] ?></td> -->
                      <td><?= $row['message'] ?></td>

                      <td><span class="badge badge-<?php if ($row['status'] == "success") {
                        echo "success";
                      } else {
                        echo "danger";
                      } ?>"><?= $row['status'] ?></span></td>
                      <td><?= $row['ip_address'] ?></td>

                      <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                      <td>
                        <div class="btn-group">
                          <button type="button" id="" class="btn btn-default">Action</button>
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                            data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">


                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" id="<?= $row['ID'] ?>" data-url="users/ban"
                              data-id="<?= $row['ID']; ?>" data-title="User Ban" onclick="modalcontent(this.id)"
                              data-toggle="modal" data-target="#modal-lg">Ban Account</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?p=contact&pID=<?=$row['ID']; ?>&contact">Delete Account</a>
                            <!-- <a class="dropdown-item" href="?p=contact&pID=<?= $row['ID']; ?>&contact">Delete
                              Account</a> -->

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?p=users&action=view&id=<?= $row['ID'] ?>">View Account</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!---->
                    </a>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!---->

          <!--</div>-->
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </section>