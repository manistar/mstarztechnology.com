<?php
require_once "vendor/google/auth/autoload.php";
class Project extends Database {
    public function signin($user_validating)
    {
        $d    = new database;
        $data = $this->validate_form($user_validating);
        if (!is_array($data)) {
            return null;
        }
        $value = $this->getall("users", "email = ?", [$data['email']], fetch: "details");
        // var_dump($value);
        if (is_array($value)) {
            if (password_verify($data['password'], $value['password'])) {
                 $_SESSION['userSession'] = htmlspecialchars($value['ID']);

                    // Get the visitor details (including IP address, device, and location info)
                    $visitorDetails = $this->get_visitor_details();
                    $ip_address     = $visitorDetails['ip_address'];

                    // Log the user's IP address
                    $this->log_user_ip($value['email'], $ip_address);  // Fix passing parameters
                   

                   return $this->loadpage("index", "json");
                   exit(); // Ensure no further code is executed
            } else {
                $this->message("Password Incorrect", "error");
            }
        } else {
            $this->message("Email doesn't exist.", "error");
        }
    }

    
    
    
    public function google_signin($token) {
        $d = new database;
        $client = new Google\Client();
        $client->setClientId('109908398316-4qh8o3a339uqtrrtr5ngmi90mtdocop1.apps.googleusercontent.com');
        $client->setClientSecret('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');
    
        try {
            // Verify token and get the user's Google profile info
            $client->verifyIdToken($token);
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
    
            // Get email from Google profile info
            $email = $google_account_info->email;
            $name = $google_account_info->name;
    
            // Check if the user exists in the database
            $user = $this->getall("users", "email = ?", [$email], fetch: "details");
    
            if (is_array($user)) {
                // If user exists, log them in
                $_SESSION['userSession'] = htmlspecialchars($user['ID']);
    
                // Log IP address
                $visitorDetails = $this->get_visitor_details();
                $ip_address = $visitorDetails['ip_address'];
                $this->log_user_ip($user['email'], $ip_address);
    
                return $this->loadpage("index", "json");
                exit();
            } else {
                // Optional: Register new user if not found in database
                $newUser = [
                    'ID' => uniqid(),
                    'email' => $email,
                    'name' => $name,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->quick_insert("users", $newUser);
                $_SESSION['userSession'] = htmlspecialchars($newUser['ID']);
    
                // Log IP address for new user
                $visitorDetails = $this->get_visitor_details();
                $ip_address = $visitorDetails['ip_address'];
                $this->log_user_ip($email, $ip_address);
    
                return $this->loadpage("index", "json");
                exit();
            }
        } catch (Exception $e) {
            // Handle errors, e.g., invalid token
            $this->message("Failed to authenticate with Google.", "error");
        }
    }


    
    public function handle_login_request() {
        // Create an instance of the handler and process the login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            
            // Check if token is provided for Google Sign-In
            $token = $input['token'] ?? null;
            if ($token) {
                // Use Google sign-in method
                $this->google_signin($token);
            } else {
                // Fall back to regular sign-in method if no token
                $this->signin($input); // Assuming $input contains email and password for traditional login
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }
    
   

    public function signup($user_registration)
    {
        $d    = new database;
        $data = $this->validate_form($user_registration, 'users');
        if (is_array($data)) {
            $data['ID'] = uniqid();
            $data['userID'] = uniqid();
      
                if ($data['password'] != "") {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    unset($data['confirm_password']);
                    $insert = $this->quick_insert("users", $data, "Account has been created successfully",);
                    // $_SESSION['userSession'] = htmlspecialchars($data['userID']);
                    if ($insert) {
                           return $this->loadpage("login", "json");
                           exit(); // Ensure no further code is executed
                    }
                }
        }
    }

    private function log_user_ip($email, $ip_address)
    {
        $d = new database;
    
        // Prepare the data for updating the user's IP address
        $updateData = [
            "ip_address" => $ip_address,
            "date" => date('Y-m-d H:i:s')
        ];
    
        // Check if the user exists in the "users" table
        $existingUser = $d->getall("users", "email = ?", [$email], fetch: "details");
    
        if (!empty($existingUser)) {
            // Corrected SQL update call
            $this->update("users", $updateData, "email = '$email'");
        }
    }
    

//     public function contact_server($contact) {
//         $data = $this->validate_form($contact);
//         if (is_array($data)) {
//             $data['ID'] = uniqid();
//             $data['userID'] = uniqid();
//                     $insert = $this->quick_insert("contact", $data, "Your message has been sent Successfully",);
//         }
//    }

//    public function contact_server($contact) {
//     $d = new database;
//     $data = $this->validate_form($contact);

//     if (is_array($data)) {
//         $data['ID'] = uniqid();
//         $data['userID'] = uniqid();
//         $userID = $data['userID']; // Define $userID here
//         $ip_address = $d->get_visitor_details()['ip_address'];
        
//         $data['userID'] = $userID;
//         $data['ip_address'] = $ip_address;
        
//         $check = $d->getall("contact", "(userID = ? or ip_address = ?) and email = ?", [$userID, $ip_address, $data['email']]);
        
//         if (!is_array($check)) {
//             $d->quick_insert("contact", $data, "Your message has been sent Successfully");
//         }
//     }
// }

public function contact_server($contact) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $secret = "6LdrUXMqAAAAAFdbKHjqmk7eAwQK_K5q89sEXhh8";
        $response = $_POST['g-recaptcha-response'];
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            'secret' => $secret,
            'response' => $response,
            'remoteip' => $remoteip
        ];

        $options = [
            'http' => [
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context = stream_context_create($options);
        $result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
        // $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        // Only proceed if CAPTCHA is verified
        if ($resultJson->success) {
            $d = new database;
            $data = $this->validate_form($contact);

            if (is_array($data)) {
                $data['ID'] = uniqid();
                $data['userID'] = uniqid();
                $userID = $data['userID'];
                $ip_address = $d->get_visitor_details()['ip_address'];

                $data['userID'] = $userID;
                $data['ip_address'] = $ip_address;

                $check = $d->getall("contact", "(userID = ? or ip_address = ?) and email = ?", [$userID, $ip_address, $data['email']]);

                if (!is_array($check)) {
                    $d->quick_insert("contact", $data, "Your message has been sent successfully.");
                } else {
                    echo "A similar entry already exists.";
                }
            }
        } else {
            echo "CAPTCHA verification failed. Please try again.";
        }
    }
}




//    public function blog_submit($reply_blog){
//     $data = $this->validate_form($reply_blog);
//         if (is_array($data)) {
//             $data['ID'] = uniqid();
//             $data['userID'] = uniqid();
//                     $insert = $this->quick_insert("blog_reply", $data, "Your message has been sent Successfully",);
//         }
//    }

public function blog_submit($reply_blog) {
    $d = new database;
    $data = $this->validate_form($reply_blog);

    if (is_array($data)) {
        $data['ID'] = uniqid();
        $data['userID'] = uniqid();
        $userID = $data['userID']; // Define $userID here
        $ip_address = $d->get_visitor_details()['ip_address'];
        
        $data['userID'] = $userID;
        $data['ip_address'] = $ip_address;

        // Check if the email already exists
        $email_check = $d->getall("blog_reply", "email = ?", [$data['email']]);
        
        if (is_array($email_check) && count($email_check) > 0) {
            // If email already exists, display an error message
            echo "Error: This email address is already associated with a reply.";
        } else {
            // Proceed with insertion if email doesn't exist
            $d->quick_insert("blog_reply", $data, "Your message has been sent successfully.");
        }
    }
}


    
    function add_to_cart($add_cart) {
        $data = $this->validate_form($add_cart, "cart", "insert", false);
        if($data == NULL) {
            $data =  $this->validate_form($add_cart);
            if(!is_array($data)) { return null; }
            $pID = $data['productID'];
            $uID = $data['userID'];
            $this->update("cart", $data, "productID = '$pID' and userID = '$uID'");
        }
        $json = ["function"=>["changetext", "data"=>["cat_no", $this->no_products($data['userID'])]]];
        return json_encode($json);
    }

    
    function no_products($userID) {
        return $this->getall("cart", "userID = ? and no_product > ?", [$userID, 0], fetch: "");
    } 
    // Example of a utility function for product quantity
    public function get_no_of_product_in_cart($userID, $productID) {
        $data = $this->getall("cart", "productID = ? AND userID = ?", [$productID, $userID], "no_product");
        return is_array($data) ? $data['no_product'] : 1;
    }

}
?>
