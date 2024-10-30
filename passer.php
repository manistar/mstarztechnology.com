<?php
        if(isset($_POST['add_to_cart'])) {
            require_once "inis/ini.php";
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
        require_once "inis/ini.php";
        require_once "consts/user.php";
        echo $P->signup($user_registration);
        return null;
    }

    if(isset($_POST['newpayment'])){
        require_once "inis/ini.php";
        require_once "include/ini-payment.php";
        echo $p->checkout($userID);
        return null;
    }
    
    if(isset($_POST['submit_btn'])){
        require_once "inis/ini.php";
        require_once "consts/user.php";
        $P->contact_server($contact);
        return null;
    }



// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);
// $data = $d->getall("user_details", "ID = ?", [$data['portfolio']], fetch: "details");
if (isset($data['postID'])) {
    require_once "inis/ini.php";
    $postID = (int) $data['postID']; // Cast to integer for security

    // Define the update logic
    $update = $d->update(
        "user_details", // Table name
        ["likes" => "likes + 1"], // Increment logic
        "ID = $postID", // Where clause
        "Post like incremented successfully" // Optional success message
    );

    // Respond with appropriate JSON message
    if ($update) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update likes']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid post ID']);
}


?>