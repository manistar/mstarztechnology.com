<?php
require_once __DIR__ . '/../GoogleAPI/vendor/autoload.php';
// echo "Autoload file included successfully!";
require_once __DIR__ . '/../include/phpmailer/PHPMailerAutoload.php';
require_once __DIR__ . '/../include/database.php';

class Project extends Database
{
    // public function signin($user_validating)
    // {
    //     $d    = new database;
    //     $data = $this->validate_form($user_validating);
    //     if (!is_array($data)) {
    //         return null;
    //     }
    //     $value = $this->getall("users", "email = ?", [$data['email']], fetch: "details");

    //     // var_dump($value);
    //     if (is_array($value)) {
    //         if (password_verify($data['password'], $value['password'])) {
    //              $_SESSION['userSession'] = htmlspecialchars($value['ID']);

    //                 // Get the visitor details (including IP address, device, and location info)
    //                 $visitorDetails = $this->get_visitor_details();
    //                 $ip_address     = $visitorDetails['ip_address'];

    //                 // Log the user's IP address
    //                 $this->log_user_ip($value['email'], $ip_address);  // Fix passing parameters


    //                return $this->loadpage("index", "json");
    //                exit(); // Ensure no further code is executed
    //         } else {
    //             $this->message("Password Incorrect", "error");
    //         }
    //     } else {
    //         $this->message("Email doesn't exist.", "error");
    //     }
    // }



    public function signin($user_validating)
{
    $d = new database;

    // Validate the form input
    $data = $this->validate_form($user_validating);
    if (!is_array($data)) {
        $this->message("Invalid form data.", "error");
        return null;
    }

    // Get the visitor details, including the IP address
    $visitorDetails = $this->get_visitor_details();
    $ip_address = $visitorDetails['ip_address'];

    // Check if the user exists in the database by email
    $startTime = microtime(true);
    $user = $d->getall("users", "email = ?", [$data['email']], fetch: "details");
    $endTime = microtime(true);
    error_log("Database query time: " . ($endTime - $startTime));

    if (is_array($user)) {
        // Verify the provided password
        $startTime = microtime(true);
        if (password_verify($data['password'], $user['password'])) {
            $endTime = microtime(true);
            error_log("Password verification time: " . ($endTime - $startTime));
            // Set the user session with the correct userID
            $_SESSION['userSession'] = $user['ID']; // Correctly assign the userID

            // Log the user's IP address
            $this->log_user_ip($user['email'], $ip_address);

            // Send a welcome email upon successful login
            $to = $data['email'];
            $from = 'no-reply@tidebk.com';
            $name = 'No Reply';
            $subj = 'Welcome Back to Mstarz Technology!';
            $companyLogoUrl = 'https://mstarztech.com/assets/images/logo/logo.png';

            $msg = "
            <div style='font-family: Arial, sans-serif; color: #ffffff; max-width: 600px; margin: 0 auto; background-color: #1b1b1d; padding: 20px; border-radius: 8px;'>
                <div style='text-align: center; margin-bottom: 20px;'>
                    <img src='{$companyLogoUrl}' alt='Your Logo' style='width: 150px; height: auto;' />
                </div>
                <h2 style='color: #9266f5; text-align: center; margin-bottom: 10px;'>Welcome to Mstarz Technology Hub!</h2>
                <p style='font-size: 16px; line-height: 1.6; color: #555;'>
                    Dear {$user['first_name']} {$user['last_name']},<br>
                </p>

                <p style='font-size: 16px; line-height: 1.6; color: #555;'>
                    MSTARZ TECHNOLOGY HUB LOG IN CONFIRMATION
                    <br><br>
                    Please be informed that your account was accessed with the IP Address: {$ip_address}.
                </p>

                <p style='font-size: 14px; color: #c7c7c7; text-align: center;'>
                    If this wasn't you, please contact our support team at 
                    <a href='mailto:support@mstarztech.com' style='color: #9266f5;'>support@mstarztech.com</a>.
                </p>
                <p style='font-size: 14px; color: #999; text-align: center;'>&copy; " . date('Y') . " Mstarz Technology. All rights reserved.</p>
            </div>
            ";

            // Send the email using SMTP
            $emailSuccess = $this->smtpmailer($to, $from, $name, $subj, $msg);

            if ($emailSuccess) {
                // Redirect the user to the index page
                return $this->loadpage("index", "json");
            } else {
                $this->message("Failed to send the welcome email. Please try again.", "error");
            }

        } else {
            $this->message("Password Incorrect.", "error");
        }
    } else {
        $this->message("Email does not exist.", "error");
    }

    return null;
}








    // public function google_signin($token = null)
    // {
    //     $d      = new database;
    //     $client = new Google\Client();
    //     $client->setClientId('109908398316-4qh8o3a339uqtrrtr5ngmi90mtdocop1.apps.googleusercontent.com');
    //     $client->setClientSecret('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');
    //     $client->setRedirectUri('http://localhost/mstarztech.com/google_callback');

    //     try {
    //         if ($token) {
    //             // Client-side token verification
    //             $payload = $client->verifyIdToken($token);
    //             if (!$payload)
    //                 throw new Exception("Invalid Google token.");
    //         } elseif (isset($_GET['code'])) {
    //             // Server-side authorization code flow
    //             $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    //             if (!isset($token['access_token']))
    //                 throw new Exception("Failed to fetch access token.");
    //             $client->setAccessToken($token['access_token']);
    //         } else {
    //             // Redirect to Google Sign-In page
    //             header('Location: ' . $client->createAuthUrl());
    //             exit();
    //         }

    //         // Fetch user info
    //         $google_oauth        = new Google_Service_Oauth2($client);
    //         $google_account_info = $google_oauth->userinfo->get();
    //         $email               = $google_account_info->email;
    //         $name                = $google_account_info->name;

    //         // Database check and session handling
    //         $user = $this->getall("users", "email = ?", [$email], fetch: "details");
    //         if (is_array($user)) {
    //             $_SESSION['userSession'] = htmlspecialchars($user['ID']);
    //             $this->log_user_ip($user['email'], $this->get_visitor_details()['ip_address']);
    //             return $this->loadpage("index", "json");
    //         } else {
    //             $newUser = [
    //                 'ID' => uniqid(),
    //                 'email' => $email,
    //                 'name' => $name,
    //                 'created_at' => date('Y-m-d H:i:s')
    //             ];
    //             if (!$this->quick_insert("users", $newUser))
    //                 throw new Exception("Failed to insert new user.");
    //             $_SESSION['userSession'] = htmlspecialchars($newUser['ID']);
    //             $this->log_user_ip($email, $this->get_visitor_details()['ip_address']);
    //             return $this->loadpage("index", "json");
    //         }
    //     } catch (Exception $e) {
    //         error_log("Google Sign-in Error: " . $e->getMessage());
    //         $this->message("Failed to authenticate with Google.", "error");
    //     }
    // }

    public function google_signin($token = null)
{
    $client = new Google\Client();
    $client->setClientId('109908398316-4qh8o3a339uqtrrtr5ngmi90mtdocop1.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri('http://localhost/mstarztech.com/google_callback');

    try {
        if ($token) {
            $payload = $client->verifyIdToken($token);
            if (!$payload) throw new Exception("Invalid Google token.");
        } elseif (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            if (empty($token['access_token'])) throw new Exception("Failed to fetch access token.");
            $client->setAccessToken($token['access_token']);
        } else {
            header('Location: ' . $client->createAuthUrl());
            exit();
        }

        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email = $google_account_info->email;

        // Check if user exists or register a new user
        $user = $this->getall("users", "email = ?", [$email], fetch: "details");
        $userData = is_array($user) ? $user : [
            'ID' => uniqid(),
            'email' => $email,
            'name' => $google_account_info->name,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if (!is_array($user)) {
            if (!$this->quick_insert("users", $userData)) throw new Exception("Failed to insert new user.");
        }

        $_SESSION['userSession'] = htmlspecialchars($userData['ID']);
        $this->log_user_ip($email, $this->get_visitor_details()['ip_address']);
        header('Location: https://mstarztech.com/index');
        exit();

    } catch (Exception $e) {
        error_log("Google Sign-in Error: " . $e->getMessage());
        header('Location: https://mstarztech.com/login');
        exit();
    }
}




    public function handle_login_request()
    {
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
        $d          = new database;
        $data       = $this->validate_form($user_registration);
        $ip_address = $d->get_visitor_details()['ip_address'];

        if (is_array($data)) {
            // Check if user already exists
            $existingUser = $d->getall("users", "email = ?", [$data['email']]);
            if ($existingUser) {
                echo "User with this email already exists: " . $data['email'];
                return false;
            }

            // Generate unique IDs
            $data['ID']         = uniqid();
            $data['userID']     = uniqid();
            $data['ip_address'] = $ip_address;
            $data['addedby'] = "61080ab2dadeg";

            $check = $d->getall("users", "ip_address = ? AND email = ?", [$ip_address, $data['email']]);


            // Log the user's IP address
            if (!is_array($check)) {
                // Prepare email configuration
                $to        = $data['email'];
                $from      = 'no-reply@tidebk.com';
                $name      = 'No Reply';
                $subj      = 'Account Created - Welcome to Mstarz Technology!';
                $loginCode = mt_rand(100000, 999999); // Generate random login code

                // Company logo URL
                $companyLogoUrl = 'https://mstarztech.com/assets/images/logo/logo.png';

                // Prepare email message
                $msg = "
        <div style='font-family: Arial, sans-serif; color: #ffffff; max-width: 600px; margin: 0 auto; background-color: #1b1b1d; padding: 20px; border-radius: 8px;'>
            <div style='text-align: center; margin-bottom: 20px;'>
                <img src='{$companyLogoUrl}' alt='Your Logo' style='width: 150px; height: auto;' />
            </div>
            <div style='text-align: center; margin-bottom: 20px;'>
                <img src='mstarztech.com/assets/images/run.jpg' alt='Welcome Image' style='width: 100%; max-width: 500px; height: auto; border-radius: 8px;' />
            </div>
            <h2 style='color: #9266f5; text-align: center; margin-bottom: 10px;'>Welcome to Your Mstarz Technology Hub!</h2>
            <p style='font-size: 16px; line-height: 1.6; color: #555;'>
                Dear {$data['first_name']} {$data['last_name']},<br>
                Your account has been successfully created! Below are your account details:
            </p>
            <p style='font-size: 16px; line-height: 1.6; text-align: center; color: #c7c7c7;'>
                You’re in. We’re excited to have you onboard and help you successfully establish your online presence!
            </p>
            <div style='text-align: center; margin: 30px 0;'>
                <a href='https://mstarztech.com/login' style='display: inline-block; font-size: 16px; text-decoration: none; color: #ffffff; background-color: #9266f5; padding: 10px 20px; border-radius: 5px;'>Sign In</a>
            </div>
            <div style='text-align: center; margin-top: 20px;'>
                <img src='{$companyLogoUrl}' alt='Your Logo' style='width: 100px; height: auto; margin-bottom: 10px;' />
                <p style='font-size: 14px; color: #c7c7c7;'>
                    You have received this email because you are registered at Mstarz Tech.<br>
                    To ensure the implementation of our Terms of Service and (or) for other legitimate matters.
                </p>
                <p style='font-size: 14px; color: #c7c7c7;'>
                    &copy; " . date('Y') . " Your Company. All rights reserved.<br>
                    <a href='https://mstarztech.com?p=terms' style='color: #9266f5; text-decoration: none;'>Privacy Policy</a>
                </p>
            </div>
        </div>
        ";

                // Send email using SMTP
                $emailSuccess = $this->smtpmailer($to, $from, $name, $subj, $msg);

                if ($emailSuccess) {
                    // Hash the password if provided
                    if (!empty($data['password'])) {
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                        unset($data['confirm_password']); // Remove confirm_password field
                    }

                    // Insert user data into the database
                    $insert = $this->quick_insert("users", $data, "Account has been created successfully");

                    

                    if ($insert) {
                        return $this->loadpage("login", "json");
                    } else {
                        echo "Failed to insert user data.";
                        return false;
                    }
                } else {
                    echo "Failed to send the email. Please check your email configuration.";
                    return false;
                }
            } else {
                echo "Invalid form data provided.";
                return false;
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


    // Make sure you include PHPMailer

    function forgotPassword($forgetPass)
    {
        // Validate input form data
        $data = $this->validate_form($forgetPass);

        // Check if the email exists in the database
        $user = $this->getall("users", "email = ?", [$data['email']], fetch: "details");

        if (!$user) {
            echo "No account found with that email address.";
            return;
        }

        // Generate a unique token and expiry time
        $token  = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token valid for 1 hour

        // Prepare data for update
        $updateData = [
            'password_reset_token' => $token,
            'token_expiry' => $expiry,
        ];

        // Update the user's password reset token and expiry
        $this->update("users", $updateData, "ID = ?", [$user['ID']]);

        // Create the reset link
        $resetLink = "http://localhost/mstarztech.com/reset_pass?token=$token";

        // Send reset email using PHPMailer with Gmail SMTP
        $this->sendResetEmail($data['email'], $resetLink, $user['first_name']);
    }

    function sendResetEmail($email, $resetLink, $firstName)
    {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        // 

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'mail.tidebk.com';  // Use Gmail's SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'no-reply@tidebk.com';  // Your Gmail email address
            $mail->Password   = 'SJsl7fs3QCOF';         // Your Gmail password or app password
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;  // Port for TLS

            //Recipients
            $mail->setFrom('no-reply@tidebk.com', 'Mstarz Tech');
            $mail->addAddress($email);  // Recipient email

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Hello " . htmlspecialchars($firstName) . ",<br><br>";
            $mail->Body .= "We received a request to reset your password. Click the link below to reset it:<br>";
            $mail->Body .= "<a href='$resetLink'>$resetLink</a><br><br>";
            $mail->Body .= "If you did not request this, please ignore this email.";

            // Send the email
            $mail->send();
            echo "A password reset link has been sent to your email.";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }

    function pass_reset($pass)
    {
        // Debugging: Check if the token is being passed in the URL
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the token exists in the POST data
            if (isset($_POST['token']) && !empty($_POST['token'])) {
                $token = $_POST['token']; // Get the token from the form submission

                // You can now proceed with token validation and password reset

                // Example: Check if the token exists in the database
                $user = $this->getall('users', 'password_reset_token = ?', [$token], fetch: 'details');

                if (!$user) {
                    echo "Invalid or expired token.";
                    exit;
                }

                // If the token is valid, process the password reset
                if (isset($_POST['password']) && !empty($_POST['password'])) {
                    $newPassword    = $_POST['password'];
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Update the user's password in the database
                    $updateData = [
                        'password' => $hashedPassword,
                        'password_reset_token' => null,  // Clear the token after password reset
                        'token_expiry' => null           // Clear the token expiry
                    ];

                    $update = $this->update('users', $updateData, 'ID = ?', [$user['ID']]);

                    if ($update) {
                        echo "Your password has been reset successfully.";
                    } else {
                        echo "Failed to reset the password. Please try again.";
                    }
                }
            } else {
                echo "No token provided or token is empty.";
            }
        }

    }



    // function forgotPassword($forgetPass)
    // {
    //     // Validate the form input
    //     $data = $this->validate_form($forgetPass);

    //     // Fetch user details by email
    //     $user = $this->getall("users", "email = ?", [$data['email']], fetch: "details");

    //     if (!$user) {
    //         echo "No account found with that email address.";
    //         return;
    //     }

    //     // Generate a unique token and expiry time
    //     $token = bin2hex(random_bytes(32));
    //     $expiry = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token valid for 1 hour

    //     // Prepare data for update
    //     $updateData = [
    //         'password_reset_token' => $token,
    //         'token_expiry' => $expiry,
    //     ];

    //     // Use the `update` function to update the user record
    //     $this->update("users", $updateData, "ID = ?", [$user['ID']]);

    //     // Create the reset link
    //     $resetLink = "http://localhost/mstarztech.com/reset_password.php?token=$token";

    //     // Email setup
    //     $subject = "Password Reset Request";
    //     $message = "Hello " . htmlspecialchars($user['first_name']) . ",\n\n";
    //     $message .= "We received a request to reset your password. Click the link below to reset it:\n";
    //     $message .= "$resetLink\n\n";
    //     $message .= "If you did not request this, please ignore this email.\n";
    //     $headers = "From: no-reply@tidebk.com";

    //     // Send the email
    //     if (mail($data['email'], $subject, $message, $headers)) {
    //         echo "A password reset link has been sent to your email.";
    //     } else {
    //         echo "Failed to send the reset email. Please try again.";
    //     }
    // }






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

    public function contact_server($contact)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $secret   = "6LdNUY4qAAAAAPnr_0Wah8a1l1S8LxwYuaoYPUbW";
            $response = $_POST['g-recaptcha-response'];
            $remoteip = $_SERVER['REMOTE_ADDR'];

            $url  = "https://www.google.com/recaptcha/api/siteverify";
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
            $result  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
            // $result = file_get_contents($url, false, $context);
            $resultJson = json_decode($result);

            // Only proceed if CAPTCHA is verified
            if ($resultJson->success) {
                $d    = new database;
                $data = $this->validate_form($contact);

                if (is_array($data)) {
                    $data['ID']     = uniqid();
                    $data['userID'] = uniqid();
                    $userID         = $data['userID'];
                    $ip_address     = $d->get_visitor_details()['ip_address'];

                    $data['userID']     = $userID;
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

    public function blog_submit($reply_blog)
    {
        $d    = new database;
        $data = $this->validate_form($reply_blog);

        if (is_array($data)) {
            $data['ID']     = uniqid();
            $data['userID'] = uniqid();
            $userID         = $data['userID']; // Define $userID here
            $ip_address     = $d->get_visitor_details()['ip_address'];

            $data['userID']     = $userID;
            $data['ip_address'] = $ip_address;
            $data['status'] = '0';

            // Check if the email already exists
            $email_check = $d->getall("prod_reply", "email = ?", [$data['email']]);

            if (is_array($email_check) && count($email_check) > 0) {
                // If email already exists, display an error message
                echo "Error: This email address is already associated with a reply.";
            } else {
                // Proceed with insertion if email doesn't exist
                $d->quick_insert("prod_reply", $data, "Your message has been sent successfully.");
            }
        }
    }



    function add_to_cart($add_cart)
    {
        $data = $this->validate_form($add_cart, "cart", "insert", false);
        if ($data == NULL) {
            $data = $this->validate_form($add_cart);
            if (!is_array($data)) {
                return null;
            }
            $pID = $data['productID'];
            $uID = $data['userID'];
            $this->update("cart", $data, "productID = '$pID' and userID = '$uID'");
        }
        $json = ["function" => ["changetext", "data" => ["cat_no", $this->no_products($data['userID'])]]];
        return json_encode($json);
    }


    function no_products($userID)
    {
        return $this->getall("cart", "userID = ? and no_product > ?", [$userID, 0], fetch: "");
    }
    // Example of a utility function for product quantity
    public function get_no_of_product_in_cart($userID, $productID)
    {
        $data = $this->getall("cart", "productID = ? AND userID = ?", [$productID, $userID], "no_product");
        return is_array($data) ? $data['no_product'] : 1;
    }

}
?>