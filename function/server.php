<?php
class Project extends Database {
    public function signin($user_validating)
    {
        $d    = new database;
        $data = $this->validate_form($user_validating);
        if (!is_array($data)) {
            return null;
        }
        $value = $this->getall("users", "email = ?", [$data['email']], fetch: "details");
        if (is_array($value)) {
            if (password_verify($data['password'], $value['password'])) {
                 $_SESSION['userSession'] = htmlspecialchars($value['ID']);
                   return $this->loadpage("index", "json");
                   exit(); // Ensure no further code is executed
            } else {
                $this->message("Password Incorrect", "error");
            }
        } else {
            $this->message("Email doesn't exist.", "error");
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
                    $insert = $this->quick_insert("users", $data, "User created successfully",);
                    $_SESSION['userSession'] = htmlspecialchars($data['userID']);
                    if ($insert) {
                           return $this->loadpage("index.php", "json");
                        
                    }
                }
        }
    }

    
    // public function contact() { 
    //     $err = false;

    //     $data = $this->validate_form($contact);
        // Collect and sanitize form inputs
        // $fname = htmlspecialchars($_POST['fname'] ?? '');
        // $phone_no = htmlspecialchars($_POST['phone'] ?? '');
        // $mail = htmlspecialchars($_POST['email'] ?? '');
        // $subject = htmlspecialchars($_POST['subject'] ?? '');

        // Validate form inputs
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //         // Name validation
    //         if (empty($fname)) {
    //             $this->message("Sorry, name cannot be empty", "error");
    //             $err = true;
    //         } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
    //             $this->message("Only letters and white space allowed", "error");
    //             $err = true;
    //         }

    //         // Email validation
    //         if (empty($mail)) {
    //             $this->message("Email cannot be empty", "error");
    //             $err = true;
    //         } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    //             $this->message("Invalid email format", "error");
    //             $err = true;
    //         }

    //         // Phone validation
    //         if (empty($phone_no)) {
    //             $this->message("Phone number cannot be empty", "error");
    //             $err = true;
    //         }

    //         // Subject validation
    //         if (empty($subject)) {
    //             $this->message("Subject cannot be empty", "error");
    //             $err = true;
    //         }

    //         // Check for duplicate entries
    //         if ($this->getall("contact", "fname = ?", [$data['fname']], fetch: "details")) {
    //             $this->message("User with this name already exists", "error");
    //             $err = true;
    //         }

    //         if ($this->getall("contact", "phone = ?", [$data['phone']], fetch: "details")) {
    //             $this->message("Please try a new phone number", "error");
    //             $err = true;
    //         }

    //         if ($this->getall("contact", "email = ?", [$data['email']], fetch: "details")) {
    //             $this->message("Email has already been taken", "error");
    //             $err = true;
    //         }

    //         // If no errors, proceed with input handling
    //         if (!$err) {
    //             $this->test_input($fname, $mail, $phone_no, $subject);
    //         }
    //     }
    // }
    // private function test_input($fname, $mail, $phone_no, $subject) {
    //     $content = htmlspecialchars($_POST['message'] ?? '');
    //     $userID = uniqid();

    //     // Prepare data for insertion
    //     $enter = "contact";
    //     $columns = "ID, userID, fname, phone, email, subject, message";
    //     $data = [uniqid(), $userID, $fname, $phone_no, $mail, $subject, $content];

    //     // Insert data and provide feedback
    //     echo $this->quick_insert($enter, $columns, $data, "Contact Successfully Sent, The Admin will reply to your mail shortly");
    // }

  

    public function contact_server($contact) {
        $data = $this->validate_form($contact);
        if (is_array($data)) {
            $data['ID'] = uniqid();
            $data['userID'] = uniqid();
                    $insert = $this->quick_insert("contact", $data, "Your message has been sent Successfully",);
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
