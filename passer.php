<?php
$exclude_session = true;
//  require_once "inis/ini.php";

    //   var_dump($_POST);  
        if(isset($_POST['add_to_cart'])) {
            require_once "inis/ini.php";
            handleLogin();
            require_once "consts/shop.php";
             require_once "function/server.php";
             echo $P->add_to_cart($add_cart);
             return null;
            } 

    if (isset($_POST['userLogin'])) {
        require_once "include/auth-ini.php";
        require_once "consts/user.php";
        // $loadpass = "Admin111@@@!.";
        // $admincheck2 = password_hash($loadpass, PASSWORD_BCRYPT);
        // echo $admincheck2;
        echo $P->signin($user_validating);
        return null;
    }
    // create account
    if (isset($_POST['userRegister'])) {
        // var_dump($data);
        require_once "include/auth-ini.php";
        require_once "consts/user.php";
        echo $P->signup($user_registration);
        return null;
    }

    if(isset($_POST['submit_reply'])) {
        require_once "inis/ini.php";
        require_once "consts/user.php";
        echo $P->blog_submit($reply_blog);
        var_dump($data);
        return null;
    }

    // if(isset($_POST['newpayment'])){
    //     require_once "inis/ini.php";
    //     require_once "include/ini-payment.php";
    //     echo $p->checkout($userID);
    //     return null;
    // }

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
    
    if(isset($_POST['submit_btn'])){
        require_once "inis/ini.php";
        require_once "consts/user.php";
        $P->contact_server($contact);
        return null;
    }

    if(isset($_POST['product_reply'])){
        require_once "inis/ini.php";
        // echo "i am here";
        require_once "consts/user.php";
        $R->reply_server($products_reply);
        return null;
    }

    if(isset($_POST['forgetPass'])){
        require_once "inis/ini.php";
        require_once "consts/user.php";
        $P->forgotPassword($forgetPass);
        return null;
    }

    if(isset($_POST['password'])){
        require_once "inis/ini.php";
        require_once "consts/user.php";
        $P->pass_reset($pass);
        return null;
    }
    
    // require_once "inis/ini.php";
    // // $d = new database;
    // if ($d->passer("fingerprint_auth")) { // Your 'passer' request handler

    //     $fingerprintAuth = new FingerprintAuth();
    //     $action = $_POST['fingerprint_auth'] ?? '';
    
    //     // For Registration
    //     if ($action === 'register' && isset($_POST['email'])) {
    //         echo $fingerprintAuth->register($_POST['email']);
    //     }
    
    //     // For Completing Registration
    //     if ($action === 'register_complete') {
    //         $data = json_decode(file_get_contents('php://input'), true);
    //         echo $fingerprintAuth->completeRegistration($data);
    //     }
    
    //     // For Login
    //     if ($action === 'login' && isset($_POST['login_email'])) {
    //         echo $fingerprintAuth->login($_POST['login_email']);
    //     }
    
    //     // For Completing Login
    //     if ($action === 'login_complete') {
    //         $data = json_decode(file_get_contents('php://input'), true);
    //         echo $fingerprintAuth->completeLogin($data);
    //     }
    // }

// Get the raw POST data

// Fetch the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

if(isset($_POST['likeID'])) {
    require_once "inis/ini.php";    
    handleLogin();
    $postID = $_POST['likeID'];
    $ip_address = $d->get_visitor_details()['ip_address'];
    if(!$userID) $userID = "";
    $data = [$userID , $ip_address, $postID];
    $check = $d->getall("like_product", "(userID = ? or ip_address = ?) and productID = ?", $data);
    if(!is_array($check)) {
        $d->quick_insert("like_product", ['userID'=>$userID, 'ip_address'=>$ip_address, 'productID'=>$postID]);
        $return =[
            'message'=>['success', 'Success', 'Product Liked'],
            'function'=>['handlelikes', 'data'=>[1, $postID]],
        ];
        echo json_encode($return);
        return;
    }
    $d->delete('like_product', '(userID = ? or ip_address = ?) and productID = ?', $data);
    $return =[
        'message'=>['success', 'Success', 'Product Unliked'],
        'function'=>['handlelikes', 'data'=>[-1, $postID]],
    ];
    echo json_encode($return);
}

// throw new Exception('Invalid post ID');

function handleLogin() {
    if(!isset($_SESSION['userSession'])){
        echo json_encode([
            "message"=>["error", "Error", "Login First"],
            "function"=>["loadpage", "data"=>["login", "null"]]
        ]);
        exit;
     }
}
?>
