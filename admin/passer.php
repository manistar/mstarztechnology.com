<?php
if (isset($_POST['adminLogin'])) {
    require_once "include/auth-ini.php";
    // $loadpass = "Admin111@@@!.";
    // $admincheck2 = password_hash($loadpass, PASSWORD_BCRYPT);
    // echo $admincheck2;
    echo $v->signin($user_validating);
    return null;
}
// Update Home
if(isset($_POST['update_home'])){
    require_once "inis/ini.php";
 echo $v->updating_home($frontboard);
 return null;
}

if (isset($_POST['create_account'])) {
    require_once "inis/ini.php";
    $u->createuser($new_user);
}

// if(isset($_POST['unlock'])){
//     require_once "inis/ini.php";
//     $correct = $_SESSION['lockscreen'];
//     $pass = $_POST['password'];
//     if(password_verify($pass, $correct)){
//         unset($_SESSION['lockscreen']);
//         $url ="index.php";
//         echo "<script language=\"Javascript\" type=\"text/javascript\">
//         window.location=\"$url\";
//         </script>";
//     }else{
//         echo   $error = '<div class="alert alert-danger">
//         <strong>Warning!</strong> Password Incorect
//     </div>'; 
//     } 
// }


// session_start(); // Start the session


// if(isset($_POST['unlock'])) {
//     require_once "inis/ini.php";

//     // Check if $_SESSION['lockscreen'] is set
//     if (isset($_SESSION['lockscreen'])) {
//         $correct = $_SESSION['lockscreen'];
//         $pass = htmlspecialchars($_POST['password']);
//         if (password_verify($pass, $correct)) {
//             unset($_SESSION['lockscreen']);
//             $url = "index.php";
//             echo "<script language=\"Javascript\" type=\"text/javascript\">
//                 window.location=\"$url\";
//                 </script>";
//             exit; // Add this line to stop further execution after redirection
//         } else {
//             echo $error = '<div class="alert alert-danger">
//                 <strong>Warning!</strong> Password Incorrect
//             </div>';
//         }
//     } else {
//         // Handle the case where $_SESSION['lockscreen'] is not set
//         echo $error = '<div class="alert alert-danger">
//             <strong>Warning!</strong> Session lockscreen not set
//         </div>';
//     }
// }

if (isset($_POST['unlock'])) {
    session_start();
    require_once "consts/user.php";
    require_once "include/database.php";
    require_once "function/autorize.php";
    $v = new validate;
    echo $v->lockscreen($screen_locked);
    return null;
}

if(isset($_POST['create_products'])){
    require_once "inis/ini.php";
    echo $i->upload_products($store_insert);
    return null;
}




if(isset($_POST['upload_what'])){
    require_once "inis/ini.php";
    echo $b->control_page($what_i_do);
    return null;
}

if(isset($_POST['upload_edu'])){
    require_once "inis/ini.php";
    echo $b->edu_page($education);
    return null;
}

if(isset($_POST['upload_job'])){
    require_once "inis/ini.php";
    echo $b->job_page($job_ex);
    return null;
}

if(isset($_POST['create_blog'])){
    require_once "inis/ini.php";
    echo $b->blog_page($blog);
    return null;
}

if(isset($_POST['upload_blog'])){
    require_once "inis/ini.php";
    echo $b->blog_page($blog);
    return null;
}

if(isset($_POST['upload_testimonial'])){
    require_once "inis/ini.php";
    echo $b->testimonial_page($testimonial);
    return null;
}

if(isset($_POST['upload_portfolio'])){
    require_once "inis/ini.php";
    echo $b->portfolios_page($portfolio);
    return null;
}

// print_r($_POST);

if(isset($_POST['newpayment'])){
    require_once "include/auth-ini.php";
    require_once "include/ini-payment.php";
    echo $p->checkout($userID);
    return null;
}

if(isset($_POST['cardpayment']) && htmlspecialchars($_POST['cardpayment']) != ""){
    if(is_array($usersub)){
        $d->message("You have an active plan.", "error");
    }else{
        $cardid = htmlspecialchars($_POST['cardpayment']);
        $debitcard = $pay->debitcard($cardid);
    }
}

if (isset($_POST['update_profile_settings'])) {
    require_once "pages/profile-settings/ini.php";
    echo $s->profile_setings_update($profile_settings);
    return null;
}

// if(isset($_POST['update_password'])){
//     $staff->changepassword();
// }
if (isset($_POST['update_password'])) {
    require_once "pages/password/ini.php";
    echo $s->profile_password_update($change_password);
    return null;
}
// admin pass updated
if (isset($_POST['update_pass'])) {
    require_once "pages/password/ini.php";
    require_once "function/profile.php";
    echo $s->password_updated($change_password);
    return null;
}



// Search Key
require_once "include/database.php";
$d = new database;
if (isset($_POST['searchkey'])) {
    $key  = htmlspecialchars($_POST['searchkey']);
    $data = $d->getall("playlist", "music_title like '%$key%' or artist_name like '%$key%'", fetch: "moredetails");
    if (!empty($data)) {
        foreach ($data as $row) {
            $user_id = $row['userID'];
            echo "<a href='view-user.php?p=$user_id'>";
            $img_src = $row['music_thumnail'];
            echo "<img  style='width:25%' src='upload/$img_src' alt='img'><br>";
            echo $row['music_title'] . "<br>";
            echo $row['userID'] . "<br />" . "<hr />";
            echo '</a>';
        }
    } else {
        echo "No user found with the key " . $key;
    }
}


?>