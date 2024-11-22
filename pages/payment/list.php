<?php
// tx_ref
require_once "function/payment.php";
$p = new payment;
    if (isset($_GET['transaction_id']) && isset($_GET['tx_ref'])) {
        if($p->update_new_payment(htmlspecialchars($_GET['transaction_id']), htmlspecialchars($_GET['tx_ref']),  $userID)) {
            $id = $ID;
            $d->loadpage("index?payment&action=invoice&id=" . $id);
            exit();
        }else{
            $d->loadpage("index?payment&action=failed");
            exit();
        } }else{
            echo "<center><h4>No transaction ID or ref passed.</h4></center>";
        }
     
?>
<!-- <center><h4>No transaction ID or ref passed.</h4></center> -->

