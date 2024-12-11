<?php 
// Ensure the form submission contains a file
if($_FILES['uploaded_file']['name']){
    $a = new ads;
    $a->uploadproductimage();
    echo "Success";
} else {
    echo "No file uploaded.";
}



// session_start();
// if($_FILES['uploaded_file']['name']){
//     // include "inis/ini.php";
//     // echo "yes";
//     $a->uploadproductimage();
// }
