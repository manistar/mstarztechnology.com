<?php
$data = json_decode(file_get_contents('php://input'), true);

if(isset($_POST['likesID'])) {
    require_once "inis/ini.php";    
    handleLogin();
    $postID = $_POST['likesID'];
    $ip_address = $d->get_visitor_details()['ip_address'];
    if(!$userID) $userID = "";
    $data = [$userID , $ip_address, $postID];
    $check = $d->getall("like_portfolio", "(userID = ? or ip_address = ?) and productID = ?", $data);
    if(!is_array($check)) {
        $d->quick_insert("like_portfolio", ['userID'=>$userID, 'ip_address'=>$ip_address, 'productID'=>$postID]);
        $return =[
            'message'=>['success', 'Success', 'Product Liked'],
            'function'=>['handlelikes', 'data'=>[1, $postID]],
        ];
        echo json_encode($return);
        return;
    }
    $d->delete('like_portfolio', '(userID = ? or ip_address = ?) and productID = ?', $data);
    $return =[
        'message'=>['success', 'Success', 'Content Unliked'],
        'function'=>['handlelikes', 'data'=>[-1, $postID]],
    ];
    echo json_encode($return);
}
?>