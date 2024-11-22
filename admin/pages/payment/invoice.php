<?php
// Assuming $userID is already available, possibly from the session or the payment data
if (isset($_GET['id'])) {
    // Sanitize the input ID
    $id = htmlspecialchars($_GET['id']);

    // Fetch the payment details based on the ID
    $data = $d->getall("payment", "ID = ?", [$id], fetch: "details");

    // Check if payment data exists
    if ($data) {
        // Fetch user details from the 'users' table based on the userID
        $user = $d->getall("users", "ID = ?", [$data['userID']], fetch: "details");

        // Check if user data was found
        if ($user) {
            // Check the user's status (assuming 'status' field exists in the users table)
            if ($user['status'] == 1) {
                // User is active, show the invoice
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
                        <h3 class="card-title">Users | </h3> <button id="adduser" data-url="users/add" data-id="adduser"
                            data-title="New Plan" onclick="modalcontent(this.id)" data-toggle="modal"
                            data-target="#modal-lg" class="btn btn-primary">Add new user</button>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                      
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img style="width: 100px;" src="../assets/images/logo/logo.png" alt="Logo">
                                <span class="float-right" style="font-size: 13px;">Date/Time: <?= $data['date']; ?></span>
                            </h4>
                        </div>
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong><?= website_name ?></strong><br>
                                <?= content['address']; ?><br>
                                Phone: <?= content['phone_number']; ?><br>
                                Email: <?= content['email']; ?>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong><?= $user['first_name'].' '.$user['last_name']; ?></strong><br>
                                Phone: <?= $user['phone_number'] ?><br>
                                Email: <?= $user['email'] ?>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <b>Gateway ID: <?= $data['transaction_id'] ?></b><br>
                            <b>Payment ID:</b> <?= $data['ID'] ?><br>
                            <?php  
                            if ($data['status'] == "success") { 
                                echo "<h2 class='text-success m-0'>PAID</h2>"; 
                            } else { 
                                echo "<h2 class='text-danger m-0'>".$data['status']."</h2> <small>Gateway: ".$data['description']."</small>"; 
                            } 
                            ?>
                        </div>
                    </div>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Amount</th>
                                        <th>For</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= currency['symbol'] . number_format($data['price']); ?></td>
                                        <td><?= $data['payfor']; ?></td>
                                        <td><?= $data['status'] ?></td>
                                        <td><?= $data['description'] ?></td>
                                        <td><?= date("F d, Y", strtotime($data['date'])); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
            } else {
                // User is not active, display a message or redirect
                echo "User is not active.";
                exit;
            }
        } else {
            // Handle case where user is not found
            echo "Error: User not found.";
            exit;
        }
    } else {
        // Handle case where payment data is not found
        echo "Error: Payment data not found.";
        exit;
    }
}
?>
