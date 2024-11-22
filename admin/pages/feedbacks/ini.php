<?php
$reply_feed = $d->getall("prod_reply", "status = ? Or status = ?", ["1", "0"], fetch: "moredetails");

// var_dump($reply_feed);

?>