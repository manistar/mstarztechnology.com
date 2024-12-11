<?php
// $d = new database;

// $userID = "what_i_do";
// $data = $d->getall("user_details", "label = ?", [$userID], fetch: "details");

// $d = new database;
//     $userID = $data = [];
//     if (isset($_SESSION['userSession'])) {
//         $userID = htmlspecialchars($_SESSION['userSession']);
//         $data = $d->getall("user_details", "label = ?", [$userID], fetch:"details");
//     } 

$what_i_do = [
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "title" => [
        "title" => "Title",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ], 
    "feather" => [
        "type" => "select",
        "options" => [
            "<i data-feather='menu'></i>" => "Menu Icon",
            "&lt;i data-feather='menu'&gt;&lt;/i&gt;" => "Menu Icon",
            "&lt;i data-feather='book-open'&gt;&lt;/i&gt;" => "Book Open",
            "&lt;i data-feather='tv'&gt;&lt;/i&gt;" => "TV Icon",
            "&lt;i data-feather='twitch'&gt;&lt;/i&gt;" => "Twitch Icon",
            "&lt;i data-feather='wifi'&gt;&lt;/i&gt;" => "WIFI Icon",
            "&lt;i data-feather='slack'&gt;&lt;/i&gt;" => "Slack Icon"
        ],
        "global_class" => "col-md-12"        
    ],
    "content" => [
        "title" => "Message",
        "global_class" => "col-md-12",
        "name"=> "content",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
    // "input_data"=>$data, 
];

$portfolio = [
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "title" => [
        "title" => "Title",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ], 

    "professions" => [
        "title" => "Professions",
        "global_class" => "col-md-12",
        "name"=> "content",
        "placeholder" => "Enter Professions, e.g (Development or Photoshop or Web Design)",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
  
    "content" => [
        "title" => "Message",
        "global_class" => "col-md-12",
        "name"=> "content",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "txtarea",
        "type" => "textarea"
    ],

    "upload_image" => [
        "is_required" => false,
        "input_type" => "file",
        "path" => "../upload/testimonials",
        "file_name" => "profile_" . uniqid(),
        "format" => ["jpeg", "jpg", "png"]
    ],
];

$education = [
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "course" => [
        "title" => "Course Of Study",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Course Of Study",
         "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
  
    "institute" => [
        "title" => "Institute",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Institute",
         "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],

    "content" => [
        "title" => "Message",
        "global_class" => "col-md-12",
        "name"=> "content",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ]
];

$job_ex = [
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "course" => [
        "title" => "Course Of Study",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Course Of Study",
         "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
  
    "institute" => [
        "title" => "Institute",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Institute",
         "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],

    "content" => [
        "title" => "Message",
        "global_class" => "col-md-12",
        "name"=> "content",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ]
];

$testimonial = [
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "fname" => [
        "title" => "Full Name",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Full Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
    "status" => [
        "title" => "Status",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Status",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
    "title" => [
        "title" => "Title",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ], 
    "freelance" => [
        "title" => "Freelancing",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Where in Freelancing do you met?",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
 
    "content" => [
        "title" => "Message",
        "global_class" => "col-md-12",
        "name"=> "content",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "txtarea",
        "type" => "textarea"
    ],

    "upload_image" => [
        "is_required" => false,
        "input_type" => "file",
        "path" => "../upload/testimonials",
        "file_name" => "profile_" . uniqid(),
        "format" => ["jpeg", "jpg", "png"]
    ],
];

$blog = [
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "fname" => [
        "title" => "Full Name",
        "global_class" => "col-md-12",
        "name"=> "fname",
        "placeholder" => "Enter Full Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ], 
    "position" => [
        "type" => "select",
        "options" => [
            "admin" => "Admin",
            "staff" => "Staff"
        ],
        "global_class" => "col-md-12"
    ],
    "title" => [
        "title" => "Title",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ], 
    "topic" => [
        "title" => "Topic",
        "global_class" => "col-md-12",
        "name"=> "title",
        "placeholder" => "Enter Topic",
        "is_required" => true,
        "input_type" => "text",
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
    "service" => [
        "type" => "select",
        "options" => [
            "admin" => "Service",
            "staff" => "Advert"
        ],
        "global_class" => "col-md-12"
    ],
     "upload_image" => [
        "is_required" => false,
        "input_type" => "file",
        "path" => "../upload/blog",
        "file_name" => "profile_" . uniqid(),
        "format" => ["jpeg", "jpg", "png"]
    ],
];
?>