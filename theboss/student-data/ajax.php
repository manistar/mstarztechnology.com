<?php

    require_once "../include/ini.php";
    
    // if(isset($_POST['signin'])){
    //     $p->javaform();
    // }
    
    if(isset($_POST['searchkey'])){
        $key = htmlspecialchars($_POST['searchkey']);
        $data = $d->fastgetwhere("form_data", "reference like ?", "%$key%", "moredetails");
        if($data != ""){
            foreach($data as $row) {

                $reference_id = $row['reference'];
                echo "<a href='../view_student_records.php?pID=$reference_id'>";
                $img_src = $row['img'];
                echo "<img  style='width:25%' src='../../form/upload/idcard/$img_src' alt='img'><br>"; 
                echo $row['fname']."<br>";
                echo $row['reference']."<br />" ."<hr />";
                echo ' </a>';
            }
        }else{
            echo "No user found with the Reference Number ".$key;
        } 
    }
?>
