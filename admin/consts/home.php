<?php 
$d = new database;

$userID = "63447143698e4";
$data = $d->getall("profile", "ID = ?", [$userID], fetch: "details");

$frontboard = [
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "fname" => [
        "title" => "Full Name",
        "global_class" => "col-md-12",
        "name"=> "fname",
        // "placeholder" => "Enter your First Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],


    "phone" => [
        "title" => "Phone Number",
        "global_class" => "col-md-12",
        "name"=> "phone",
        // "placeholder" => "Enter your First Name",
        "is_required" => true,
        "input_type" => "number",
        "type" => "input"
    ],

    
    "email" => [
        "title" => "Mail",
        "global_class" => "col-md-12",
        "name"=> "email",
        // "placeholder" => "Enter your First Name",
        "is_required" => true,
        "input_type" => "email",
        "type" => "input"
    ],

    "content" => [
        "title" => "Website Description",
        "global_class" => "col-md-12",
        "name"=> "content",
        // "placeholder" => "Enter your First Name",
        "is_required" => true,
        "input_type" => "txtarea",
        "type" => "textarea"
    ],
    
    "upload_image" => [
        "is_required" => false,
        "input_type" => "file",
        "path" => "../upload/",
        "file_name" => "profile_" . uniqid(),
        "format" => ["jpeg", "jpg", "png"]
    ],
    

        "footer_image"=>[
            "is_required" => false,
            "input_type"=>"file", 
            "path"=>"../upload/",
             "file_name"=>"footer_" .uniqid(), 
             "formart"=>["jpeg", "jpg", "png"]
            ],
            "input_data"=>$data,
];

$lockscreen = [
    "password" => [
        "title" => "Password",
        "global_class" => "col-md-12",
        "name"=> "password",
        "placeholder" => "Enter your password",
        "is_required" => true,
        "input_type"=>"password",
        "type" => "input"
    ],
];
?>