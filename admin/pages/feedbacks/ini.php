<?php
$reply_feed = $d->getall("prod_reply", "status = ? Or status = ?", ["1", "0"], fetch: "moredetails");

// var_dump($reply_feed);
// $contact = $d->getall("contact", fetch: "moredetails");
if (isset($_GET['pID'])) {
    $product_id      = $_GET['pID'];
    $delete_products = $d->delete("prod_reply", "ID = ?", [$product_id]);
}
?>