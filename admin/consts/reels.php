<?php
    $adminReels = [
        "userID" => ["input_type"=>"hidden", "is_required"=>false],
        "title" => [
        "title" => "Title",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter title hash tags e.h #mstarztech",
        "is_required" => true,
        "input_type"=>"text",
        "type" => "input",
        // "unique"=>""
    ],

    "links" => [
        "title" => "Insert Link",
        "global_class" => "col-md-12",
        "name"=> "links",
        "placeholder" => "paste url link here e.g https://tiktok.com/share/r/1gfr865890/",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
        // "unique"=>""
    ],
    

    // "upload_image"=>[
    //     "input_type"=>"file", 
    //     "path"=>"upload/profile/",
    //      "file_name"=>"profile_" .uniqid(), 
    //      "formart"=>["jpeg", "jpg", "png"]
    //     ],
    ];
?>