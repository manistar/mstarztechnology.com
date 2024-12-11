<?php
// Initialize $store_edit as an empty array
// $store_edit = [];

if (isset($_POST['id'])) {
  $id   = htmlspecialchars($_POST['id']);
  $data = $d->getall("products", "ID = ?", [$id], fetch: "details");
}

$store_edit = [
    "userID" => ["input_type" => "hidden", "is_required" => false],
    "title" => [
        "title" => "Title",
        "global_class" => "col-md-12", // Change this line to "col-md-6"
        // "input_class" => "form-control", // Add this line
        "name" => "first_name",
        "placeholder" => "Enter Title",
        "is_required" => false,
        "input_type" => "text",
        "type" => "input"
    ],


    "amount" => [
        "title" => "Price",
        "global_class" => "col-md-12",
        "name" => "amount",
        "placeholder" => "Enter Price ($)",
        "is_required" => false,
        "input_type" => "text",
        "type" => "input",
        "value" => "$"
    ],

    "availability" => ["options" => ["in stock" => "In Stock", "out of stock" => "Out of Stock"], "is_required" => false, "global_class" => "col-md-12", "type" => "select"],
  
    "categories" => ["options" => ["Full Scripts" => "Website Script", "FrontEnd" => "Front End", "BackEnd" => "Back End"], "is_required" => false, "global_class" => "col-md-12", "type" => "select"],
   
    "shipment" => [
        "title" => "Shippment Day",
        "global_class" => "col-md-12",
        // "input_class" => "form-control", // Add this line
        "name" => "first_name",
        "placeholder" => "Enter Shipment Day",
        "is_required" => false,
        "input_type" => "text",
        "type" => "input",
    ],

    
  "description" => [
    "title" => "Description",
    "global_class" => "customtextarea col-md-12",
    "class" => "col-md-12", // This is passed to the textarea method
    "name" => "description",
    "placeholder" => "Enter Product description",
    "is_required" => true,
    "input_type" => "txtarea",
    "type" => "textarea",
    "style" => "height: 300px;" // Passed for inline styling
],

"upload_image" => [
    "global_class" => "col-md-12",
    "input_type" => "file",
    "is_required" => false,
    "path" => "../upload/cart/",
    "file_name" => "products_" . uniqid(),
    "formart" => ["jpeg", "jpg", "png"],
    "type" => "input",
],
    "input_data"=>$data,
];



$store_insert = [
    "userID" => ["input_type" => "hidden", "is_required" => false],
    "title" => [
        "title" => "Title",
        "global_class" => "col-md-12", // Change this line to "col-md-6"
        // "input_class" => "form-control", // Add this line
        "name" => "first_name",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],

 
   "description" => [
    "title" => "Description",
    "global_class" => "customtextarea col-md-12",
    "class" => "col-md-12", // This is passed to the textarea method
    "name" => "description",
    "placeholder" => "Enter Product description",
    "is_required" => true,
    "input_type" => "txtarea",
    "type" => "textarea",
    "style" => "height: 300px;" // Passed for inline styling
],




    "amount" => [
        "title" => "Price",
        "global_class" => "col-md-12",
        "name" => "amount",
        "placeholder" => "Enter Price ($)",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input",
        "value" => "$"
    ],

    "availability" => ["options" => ["in stock" => "In Stock", "out of stock" => "Out of Stock"], "global_class" => "col-md-12", "type" => "select"],
    // avalability label
    // brand label
    "categories" => ["options" => ["Full Scripts" => "Website Script", "FrontEnd" => "Front End", "BackEnd" => "Back End"], "global_class" => "col-md-12", "type" => "select"],
    // "category" => [
    //     "title" => "Categories",
    //     "global_class" => "col-md-4",
    //     "name" => "categories",
    //     "placeholder" => "Enter Categories",
    //     "is_required" => true,
    //     "input_type" => "text",
    //     "type" => "input"
    // ],
    // categories label
    // avalability label
    "upload_image" => [
        "global_class" => "col-md-12",
        "input_type" => "file",
        // "is_required" => false,
        "path" => "../upload/cart/",
        "file_name" => "products_" . uniqid(),
        "formart" => ["jpeg", "jpg", "png"]
    ],

    "shipment" => [
        "title" => "Shippment Day",
        "global_class" => "col-md-12",
        // "input_class" => "form-control", // Add this line
        "name" => "first_name",
        "placeholder" => "Enter Shipment Day",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input",
    ],
];

$new_user = [
    "userID" => ["input_type" => "hidden", "is_required" => false],
    "first_name" => [
        "title" => "First Name",
        "global_class" => "col-md-12", // Change this line to "col-md-6"
        // "input_class" => "form-control", // Add this line
        "name" => "first_name",
        "placeholder" => "Enter First Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],

    "last_name" => [
        "title" => "Last Name",
        "global_class" => "col-md-12", // Change this line to "col-md-6"
        // "input_class" => "form-control", // Add this line
        "name" => "last_name",
        "placeholder" => "Enter Last Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],

    "gender" => ["options" => ["Male" => "Male", "Female" => "Female"], "global_class" => "col-md-12", "type" => "select"],

    "phone_number" => [
        "title" => "Phone Name",
        "global_class" => "col-md-12", // Change this line to "col-md-6"
        // "input_class" => "form-control", // Add this line
        "name" => "phone",
        "placeholder" => "Enter Phone Number",
        "is_required" => true,
        "input_type" => "number",
        "type" => "input"
    ],
   
  
    "email" => [
        "title" => "Email",
        "global_class" => "col-md-12", // Change this line to "col-md-6"
        // "input_class" => "form-control", // Add this line
        "name" => "fname",
        "placeholder" => "Enter Email Address",
        "is_required" => true,
        "input_type" => "email",
        "type" => "input"
    ],
    "password" => [
        "title" => "Password",
        "global_class" => "col-md-12", // Change this line to "col-md-6"
        // "input_class" => "form-control", // Add this line
        "name" => "password",
        "placeholder" => "Enter Password",
        "is_required" => true,
        "input_type" => "password",
        "type" => "input"
    ],
    "upload_image" => [
        "global_class" => "col-md-12",
        "input_type" => "file",
        // "is_required" => false,
        "path" => "../upload/cart/",
        "file_name" => "profile" . uniqid(),
        "formart" => ["jpeg", "jpg", "png"]
    ],
];
?>