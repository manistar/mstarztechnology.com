<?php 
    $pid = htmlspecialchars($_GET['ID']);
    $userID = htmlspecialchars($_SESSION['adminSession']);
    if(isset($_GET['p']) && $_GET['p'] == "postedit"){
        $data = $d->getall("products", "ID = ? and userID = ?", [$pid, $userID], fetch: "details");
    }else{
        $data = $d->getall("products", "ID = ?", [$pid], fetch: "details");
    }
    if(is_array($data)){
        $userid = $data['userID'];
        $adsby = $d->getall("users", "ID = ?", [$userid], fetch: "details");
        $related = $d->getall("products", "category = ? or sub_category = ? and ID != ?", [$data['category'], $data['sub_category'], $pid], fetch: "moredetails");
        $useroffers = $d->getall("products", "userID = ? and status = ? LIMIT 8", [$userid, "1"], fetch: "moredetails");
        $seemore = $d->getall("products", "userID = ? and status = ? LIMIT 8", [$userid, "1"], "");
        $productimage = $d->getall("image_upload", "forID = ? and imagefor = ?", [$pid, "products"], fetch: "moredetails");
        $catname = $d->getall("categories", "ID = ?", $data['category'], fetch: "details");
        $catname = $catname['name'];
        $subcatname = $d->getall("sub_categories", "ID = ?", $data['sub_category'], fetch: "details");
        $subcatname = $subcatname['name'];
    }
?>  