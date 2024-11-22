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
                        <form id="foo" action="passer" method="POST" onsubmit="return false">
                            <?php
                            $c = new content;

                            echo $c->create_form($new_user); ?>
                            <input type="hidden" name="create_account" id="create_account">
                            <div id="custommessage"></div>
                            <button class="btn btn-success rounded btn-lg btn-block">Create
                                Account</button>
                        </form>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
    </section>