<?php
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
    "icon" => [
        "type" => "select",
        "options" => [
            "<i data-feather='menu'></i>" => "Menu Icon",
            "<i data-feather='book-open'></i>" => "Book Open",
            "<i data-feather='tv'></i>" => "TV Icon",
            "<i data-feather='twitch'></i>" => "Twitch Icon",
            "<i data-feather='wifi'></i>" => "WIFI Icon",
            "<i data-feather='slack'></i>" => "Slack Icon"
        ],
        "global_class" => "col-md-12"
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

    "img" => [
        "is_required" => false,
        "input_type" => "file",
        "path" => "../upload/portfolio/",
        "file_name" => "portfolio_" . uniqid(),
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
        "input_type" => "txtarea",
        "type" => "textarea"
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
        "input_type" => "txtarea",
        "type" => "textarea"
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
        "path" => "../upload/testimonials/",
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
     "img" => [
        "is_required" => false,
        "input_type" => "file",
        "path" => "../upload/blog/",
        "file_name" => "blog_" . uniqid(),
        "format" => ["jpeg", "jpg", "png"]
    ],
];
?>

