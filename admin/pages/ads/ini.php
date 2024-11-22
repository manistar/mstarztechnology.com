<?php
 $id = htmlspecialchars('id');
$ads = $d->getall("products", "userID = ?", [$id], fetch: "moredetails");
if (isset($_GET['pID'])) {
    $product_id      = $_GET['pID'];
    $delete_products = $d->delete("products", "ID = ?", [$product_id]);
}
?>