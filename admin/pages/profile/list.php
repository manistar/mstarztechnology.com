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
                        <h3 class="card-title">Users | </h3> <button id="adduser" data-url="users/add" data-id="adduser"
                            data-title="New Plan" onclick="modalcontent(this.id)" data-toggle="modal"
                            data-target="#modal-lg" class="btn btn-primary">Add new user</button>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                    
                    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <?php echo $data['first_name'] . ' ' . $data['last_name'] . ' <br> [' . $data['ID'] . ']'; ?>
            </a>
          </div>
        </div> -->

        <div class="col-12">

<div class="main__title main__title--page">
    <h2>Profile</h2>
</div>

<div class="row row--grid">
    <div class="col-lg-3">
        <div class="profile">
            <div class="profile__user">
                <div class="profile__avatar">
                <!-- <img src="dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image"> -->
                <img src="dist/img/user2-160x160.png" style="width: 55px; height: 50px !important;" alt="Image-HasTech">
                </div>
                <div class="profile__meta">
                    <h3><?= $data['first_name'].' '.$data['last_name'];?></h3>
                    <span>User ID: <?= $data['ID'];?></span>
                </div>
            </div>

            <div class="nav flex-column nav-pills">
           
                <a href="?p=profile" class="nav-link active"><i class="far fa-user"></i> Profile</a>
                <!-- <a href="profile-setting.html" class="nav-link"><i class="far fa-cog"></i> Profile
                    Settings</a>
                <a href="favourites.html" class="nav-link"><i class="far fa-heart"></i> My
                    Favourites</a>
                <a href="orders.html" class="nav-link"><i class="far fa-shopping-cart"></i> My
                    Orders</a>
                <a href="playlist.html" class="nav-link"><i class="far fa-list-ul"></i> My Playlist</a>
                <a href="create-playlist.html" class="nav-link"><i class="far fa-layer-plus"></i> Create
                    Playlist</a>
                <a href="upload-music.html" class="nav-link"><i class="far fa-cloud-upload"></i> Upload
                    Music</a> -->
                
            </div>

        </div>
    </div>
    <div class="col-lg-9">

        <div class="row row--grid">
            <div class="col-lg-8">
                <div class="profile-info">
                    <table class="table table-borderless">
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td><?= $data['first_name'].' '.$data['last_name'];?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td><?= $data['email'];?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>:</td>
                            <td><?= $data['phone_number'];?></td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>:</td>
                            <td><?= $data['address'];?></td>
                            <td>

                                <?php
                                // if($data['country'] == "") {
                                //     echo 'Please insert your Country';
                                // } else {
                                //     echo $data['country'];
                                // }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>:</td>
                            <td><?= $data['type'];?></td>
                            <td> <?php
                                // if($data['state'] == "") {
                                //     echo 'Please insert your State';
                                // } else {
                                //     echo $data['state'].', '.$data['country'];
                                // }
                                ?></td>
                        </tr>
                        <tr>
                            <th>Join At</th>
                            <td>:</td>
                            <td><?=  $date = date('Y-m-d', strtotime($data['date']));?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


                      <!-- /.card-body -->
                      </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
    </section>