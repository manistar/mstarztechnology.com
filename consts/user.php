<?php
$d = new database;
$user_validating = [
    "ID" => ["input_type"=>"hidden", "is_required"=>false],
    "email" => [
        "title" => "Email",
        "global_class" => "col-md-12",
        "name"=> "email",
        // "class" => "form-control",
        "placeholder" => "example@email.com",
        "is_required" => true,
        "input_type" => "email",
        "type" => "input",
        "icon" => "📧" // Email icon
        
    ],

   "password" => [
    "title" => "Password",
    "global_class" => "col-md-12",
    "id" => "user-password",
    "name"=> "password",
    "description"=>"<a href='forgetPassword' style='color: #fff; text-decoration: none;' onmouseover='this.style.color=\"#ccc\"' onmouseout='this.style.color=\"#fff\"'>Forgot Password ?</a>",  
    "placeholder" => "Enter Password",
    "is_required" => true,
    "input_type" => "password",
    "type" => "input",
    "icon" => "🔒" // Password icon
],

    
];

$user_registration = [
    // "ID" => ["input_type"=>"hidden", "is_required"=>false],
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "first_name" => [
        "title" => "First Name",
        "global_class" => "input-group__item",
        "name"=> "first_name",
        "placeholder" => "Enter your First Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
    

    "last_name" => [
        "title" => "Last Name",
        "global_class" => "input-group__item",
        "name"=> "last_name",
        "placeholder" => "Enter your Last Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],

    "email" => [
        "title" => "Email",
        "global_class" => "col-md-12",
        "name"=> "email",
        "placeholder" => "Example@email.com",
        "is_required" => true,
        "input_type" => "email",
        "type" => "input",
        "unique"=>""
    ],

    "phone_number" => [
        "title" => "Phone Number",
        "global_class" => "col-md-12",
        "name"=> "phone_number",
        "placeholder" => "Enter phone number",
        "is_required" => true,
        "input_type"=>"number",
        "type" => "input",
        "unique"=>""
    ],

    "upload_image"=>[
        "input_type"=>"file", 
        "path"=>"upload/profile/",
         "file_name"=>"profile_" .uniqid(), 
         "formart"=>["jpeg", "jpg", "png"]
        ],

    "gender" => [
        "global_class" => "col-md-12",
        "placeholder" => "Select your gender", 
        "is_required" => true,
         "options" => ["Male" => "Male", "Female" => "Female"], 
         "type" => "select"
        ],

    "password" => [
        "title" => "Password",
        "global_class" => "col-md-12",
        "name"=> "password",
        "placeholder" => "Enter your password",
        "is_required" => true,
        "input_type"=>"password",
        "type" => "input"
    ],
    // "confirm_password" => [
    //     "title" => "Password",
    //     "global_class" => "col-md-12",
    //     "name"=> "password",
    //     "placeholder" => "Confirm your password",
    //     "is_required" => true,
    //     "input_type"=>"password",
    //     "type" => "input"
    // ],
    // "input_data"=>["userID"=>uniqid()],
];

$contact = [
    // "ID" => ["input_type"=>"hidden", "is_required"=>false],
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "fname" => [
        "title" => "First Name",
        "global_class" => "col-lg-6",
        "name"=> "fname",
        "placeholder" => "Enter your First Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
    

    "phone" => [
        "title" => "Phone Number",
        "global_class" => "col-lg-6",
        "name"=> "phone",
        "placeholder" => "Enter Phone Number",
        "is_required" => true,
        "input_type" => "number",
        "type" => "input"
    ],

    "email" => [
        "title" => "Email",
        "global_class" => "col-md-12",
        "name"=> "email",
        "placeholder" => "Example@email.com",
        "is_required" => true,
        "input_type" => "email",
        "type" => "input",
        "unique"=>""
    ],

    "topic" => [
        "title" => "Subject",
        "global_class" => "col-md-12",
        "name"=> "topic",
        "placeholder" => "Write your Subject",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],

    "message" => [
        "title" => "Your Message",
        "global_class" => "col-md-12",
        "name" => "message",
        "placeholder" => "CONTACT US DESCRIPTION",
        "is_required" => true,
        "input_type" => "txtarea",
        "type" => "textarea"
    ],
];

$reply_blog = [
    // "ID" => ["input_type"=>"hidden", "is_required"=>false],
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "fname" => [
        "title" => "Full Name",
        "global_class" => "rnform-group",
        // "class"=> "rnform-group",
        "name"=> "fname",
        "placeholder" => "Enter your Full Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
    "email" => [
        "title" => "Email",
        "global_class" => "rnform-group",
        // "class"=> "rnform-group",
        "name"=> "email",
        "placeholder" => "Example@email.com",
        "is_required" => true,
        "input_type" => "email",
        "type" => "input",
        "unique"=>""
    ],
    "website" => [
        "title" => "Website Link (Optional)",
        "global_class" => "rnform-group",
        "name"=> "website",
        "placeholder" => "Enter Website Link",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input",
        "unique"=>""
    ],
    "message" => [
        "title" => "Your Message",
        "global_class" => "rnform-group",
        "class" => "col-lg-6 col-md-12 col-12",
        "name" => "message",
        "placeholder" => "CONTACT US DESCRIPTION",
        "is_required" => true,
        "input_type" => "txtarea",
        "type" => "textarea"
    ],
];

$products_reply = [
    // "ID" => ["input_type"=>"hidden", "is_required"=>false],
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "fname" => [
        "title" => "Full Name",
        "global_class" => "rnform-group",
        // "class"=> "rnform-group",
        "name"=> "fname",
        "placeholder" => "Enter your Full Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
    "email" => [
        "title" => "Email",
        "global_class" => "rnform-group",
        // "class"=> "rnform-group",
        "name"=> "email",
        "placeholder" => "Example@email.com",
        "is_required" => true,
        "input_type" => "email",
        "type" => "input",
        "unique"=>""
    ],
    "website" => [
        "title" => "Website Link (Optional)",
        "global_class" => "rnform-group",
        "name"=> "website",
        "placeholder" => "Enter Website Link",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input",
        "unique"=>""
    ],
    "message" => [
        "title" => "Your Message",
        "global_class" => "rnform-group",
        "class" => "col-lg-6 col-md-12 col-12",
        "name" => "message",
        "placeholder" => "CONTACT US DESCRIPTION",
        "is_required" => true,
        "input_type" => "txtarea",
        "type" => "textarea"
    ],
];

$forgetPass = [
    "email" => [
        "title" => "Email",
        "global_class" => "col-md-12",
        // "class"=> "rnform-group",
        "name"=> "email",
        "placeholder" => "Example@email.com",
        "is_required" => true,
        "input_type" => "email",
        "type" => "input",
        "unique"=>""
    ],
];

$pass = [
    "password" => [
        "title" => "Password",
        "global_class" => "col-md-12",
        "name"=> "password",
        "placeholder" => "Enter New password",
        "is_required" => true,
        "input_type"=>"password",
        "type" => "input"
    ],
];

// $d->create_table("prod_reply", $products_reply);
// $d->quick_insert("users", "ID, userID, first_name, last_name, password", [uniqid(), uniqid(),  "Tunde", "Ajayi", "tundeajayi@gmail.com", "userPassword"], "Account Created Successfully");