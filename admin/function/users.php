<?php
class users extends database {
    function getadminusers($userID, $type = "users", $datefrom = "", $dateto = "")
    {
        $d = new database;
        $users = array();
        $user = $this->getall("admins", "ID = ?", [$userID], fetch: "details");
    
        // Get user assign to user
        if ($user && is_array($user) && $user['type'] == "admin") {
    
            if ($datefrom != "" && $dateto != "") {
                $users = $this->getall("$type", "date >= ? and date <= ?", [$datefrom, $dateto], fetch: "moredetails");
            } else {
    
                $users = $this->getall("$type", "date", fetch: "moredetails");
            }
    
        } elseif ($user && is_array($user)) {
            if ($datefrom != "" && $dateto != "") {
                $asign = $d->getall("people_assign", "adminID = ? and type = ? and date >= ? and date <= ?", [$userID, $type, $datefrom, $dateto], fetch: "moredetails");
            } else {
                $asign = $d->getall("people_assign", "adminID = ? and type = ?", [$userID, $type], fetch: "moredetails");
            }
    
            if (!empty($asign)) {
                foreach ($asign as $row) {
                    $user_id = $row['userID'];
                    $user = $d->getall("$type", "ID = ?", [$user_id], fetch: "details");
                    if ($user && is_array($user)) {
                        $users[] = $user;
                    }
                }
            }
        }
    
        return $users;
    }
    

    
    function newfollow($userid){
        if(!isset($_SESSION['userSession'])){
            echo "<a href='signin.php' style='color:black'>Login first</a>";
            exit();
        }
        if($_SESSION['userSession'] == $userid){
            echo "error";
            exit();
        }
        // echo "no";
        $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $this->getall("followers", "userID = ? and followID = ?", [$userID, $userid], "");
        if($check > 0){
           $unfollow = $this->unfollow($userid);
           if($unfollow){
            echo "Follow";
            }
        }else{
           $follow =  $this->follower($userid);
           if($follow){
               echo "Unfollow";
           }
        }
    }        
    
    function totalfollowers($userid){
        return $this->getall("followers", "followID = ?", [$userid], fetch: "details");
    }

    function totalfollowing($userid){
        return $this->getall("followers", "userID = ?", [$userid], fetch: "");
    }

    function follower($userid){
        $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $this->getall("followers", "userID = ? and followID = ?", [$userID, $userid], fetch: "moredetails");
       if($check == 0){
            if($this->quick_insert("followers", "", ["userID"=>$userID, "followID"=>$userid])){
                return true;
            }
       }else{
           return false;
       }
    }

    function unfollow($userid){
        $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $this->getall("followers", "userID = ? and followID = ?", [$userID, $userid], fetch: "moredetails");
       if(is_array($check)){
            if($this->delete("ID", "followers", $check['ID'], "no")){
                return true;
            }
       }else{
           return false;
       }
    }

    function checkfollow($userid){
        $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $this->getall("followers", "userID = ? and followID = ?", [$userID, $userid], fetch: "moredetails");
        if($check > 0){
            return "Unfollow";
        }else{
            return "Follow";
        }
    }

    public function deactivateuser() {
        $id = htmlspecialchars($_POST['userID']);
        $reason = htmlspecialchars($_POST['why_block']);
    
        // Prepare the data array for the update
        $data = [
            "status" => 0, // Set the status to 0 for deactivation
            "reason" => $reason // Assign the reason from the form
        ];
    
        if ($this->basicuserstatus($id)) {
            // Check if admin can perform the action and if the user is assigned to the admin
            if ($this->verifyrole(htmlspecialchars($_SESSION['adminSession']), "deactivateusers") && $this->verifyassign($this->userID(), $id)) {
                // Update user's status and reason
                $update = $this->update("users", $data, "ID = '$id'");
                
                if ($update) {
                    $return = [
                        "message" => ["Account Deactivated", "You have successfully deactivated this user's account", "success"],
                        "function" => ["statusswitch", "data" => [$id, "danger"]],
                        "closemodal" => true
                    ];
                    return json_encode($return);
                }
            }
        }
    
        // Handle failure case if update did not happen
        return json_encode([
            "message" => ["Error", "Failed to deactivate the user's account", "error"],
            "function" => ["statusswitch", "data" => [$id, "error"]],
            "closemodal" => false
        ]);
    }
    

    public function activateuser() {
        $d = new database;
        $id = htmlspecialchars($_POST['userID']);
        
        // Prepare the data array for validation
        $data = [
            "status" => 1 // Set the status to 1 for activation
        ];
    
        // If the user's current status is already active, return an error
        if ($d->basicuserstatus($id)) {
            return json_encode([
                "message" => ["Error", "User account is already activated", "error"],
                "function" => ["statusswitch", "data" => [$id, "error"]],
                "closemodal" => false
            ]);
        }
    
        // Verify admin role and user assignment
        if ($d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "deactivateusers") && $d->verifyassign($d->userID(), $id)) {
            // Update the user status
            $update = $d->update("users", $data, "ID = '$id'");
            
            if ($update) {
                $return = [
                    "message" => ["Account activated", "You have successfully activated this user's account", "success"],
                    "function" => ["statusswitch", "data" => [$id, "success"]],
                    "closemodal" => true
                ];
                return json_encode($return);
            }
        }
    
        // If the update fails, return an error message
        return json_encode([
            "message" => ["Error", "Failed to activate the account", "error"],
            "function" => ["statusswitch", "data" => [$id, "error"]],
            "closemodal" => false
        ]);
    }
    
    public function unbancontact() {
        $d = new database;
        $id = htmlspecialchars($_POST['userID']);
        
        // Prepare the data array for validation
        $data = [
            "status" => 1 // Set the status to 1 for activation
        ];
    
        // If the user's current status is already active, return an error
        if ($d->basiccontactstatus($id)) {
            return json_encode([
                "message" => ["Error", "Contact account is already activated", "error"],
                "function" => ["statusswitch", "data" => [$id, "error"]],
                "closemodal" => false
            ]);
        }
    
        // Verify admin role and user assignment
        if ($d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "ban") && $d->verifyassign($d->userID(), $id)) {
            // Update the user status
            $update = $d->update("contact", $data, "ID = '$id'");
            
            if ($update) {
                $return = [
                    "message" => ["Account unban", "You have successfully unban this user's account", "success"],
                    "function" => ["statusswitch", "data" => [$id, "success"]],
                    "closemodal" => true
                ];
                return json_encode($return);
            }
        }
    
        // If the update fails, return an error message
        return json_encode([
            "message" => ["Error", "Failed to unban the account", "error"],
            "function" => ["statusswitch", "data" => [$id, "error"]],
            "closemodal" => false
        ]);
    }


    public function bancontact() {
        $id = htmlspecialchars($_POST['userID']);
        $reason = htmlspecialchars($_POST['why_block']);
    
        // Prepare the data array for the update
        $data = [
            "status" => 0, // Set the status to 0 for deactivation
            "reason" => $reason // Assign the reason from the form
        ];
    
        if ($this->basiccontactstatus($id)) {
            // Check if admin can perform the action and if the user is assigned to the admin
            if ($this->verifyrole(htmlspecialchars($_SESSION['adminSession']), "ban") && $this->verifyassign($this->userID(), $id)) {
                // Update user's status and reason
                $update = $this->update("contact", $data, "ID = '$id'");
                
                if ($update) {
                    $return = [
                        "message" => ["Account Banned", "You have successfully Ban this user's account", "success"],
                        "function" => ["statusswitch", "data" => [$id, "danger"]],
                        "closemodal" => true
                    ];
                    return json_encode($return);
                }
            }
        }
    
        // Handle failure case if update did not happen
        return json_encode([
            "message" => ["Error", "Failed to Ban the user's account", "error"],
            "function" => ["statusswitch", "data" => [$id, "error"]],
            "closemodal" => false
        ]);
    }
    

    // public function update_pro($store_edit)
    // {
    //     // Validate form data
    //     $data = $this->validate_form($store_edit);
        
    //     if (is_array($data) && array_key_exists('userID', $data)) {
    //         $userID = $data['userID'];
            
    //         // Check if there is another record with the same image but a different userID
    //         $checkimage = $this->getall(
    //             "products",
    //             "upload_image = ? AND userID != ?",
    //             [$data['upload_image'], $userID],
    //             "upload_image"
    //         );
    
    //         // If another user has the same image, show error message in JSON format
    //         if (is_array($checkimage) && !empty($checkimage)) {
    //             unset($data['upload_image']); // Remove image field if it exists in another record
    //             $return = [
    //                 "message" => ["Image Conflict", "Image already exists in the database.", "error"],
    //                 "closemodal" => true
    //             ];
    //             return json_encode($return);
    //         } else {
    //             // Proceed with updating the record if the image check passed
    //             unset($data['userID']); // Remove userID from data to avoid updating it
    //             $data['status'] = "1";
    //             $data['date'] = date("M j, Y", time());
    
    //             // Execute the update and return a success message in JSON format
    //             $update = $this->update("products", $data, "userID = '$userID'");
                
    //             if ($update) {
    //                 $return = [
    //                     "message" => ["Product Updated", "Product updated successfully.", "success"],
    //                     "closemodal" => true
    //                 ];
    //                 return json_encode($return);
    //             } else {
    //                 // Return an error message in JSON format if the update fails
    //                 $return = [
    //                     "message" => ["Update Failed", "There was an issue updating the product. Please try again.", "error"],
    //                     "closemodal" => true
    //                 ];
    //                 return json_encode($return);
    //             }
    //         }
    //     } else {
    //         // Return an error message in JSON format if validation fails
    //         $return = [
    //             "message" => ["Invalid Data", "Invalid data provided.", "error"],
    //             "closemodal" => true
    //         ];
    //         return json_encode($return);
    //     }
    // }
    
    
    public function update_pro($store_edit)
    {
        $data = $this->validate_form($store_edit);
    
        if (is_array($data) && isset($data['userID'])) {
            $userID = $data['userID'];
            
            // Get the current image for the product
            $currentImage = $this->getall("products", "userID = ?", [$userID], "upload_image")['upload_image'] ?? null;
    
            // Check if a new image is uploaded
            if (!empty($_FILES['upload_image']['name'])) {
                $newImage = "products_" . uniqid() . ".png";
    
                // Check for image conflict
                if ($this->getall("products", "upload_image = ? AND userID != ?", [$newImage, $userID])) {
                    return json_encode(["message" => ["Image Conflict", "Image already exists.", "error"], "closemodal" => true]);
                }
    
                // Delete old image if it exists
                if ($currentImage && file_exists("../upload/cart/" . $currentImage)) {
                    unlink("../upload/cart/" . $currentImage);
                }
    
                $data['upload_image'] = $newImage; // Assign new image
            } else {
                unset($data['upload_image']); // Retain current image
            }
    
            unset($data['userID']); // Prevent updating `userID`
            $data['status'] = "1";
            $data['date'] = date("M j, Y");
    
            return json_encode([
                "message" => $this->update("products", $data, "userID = '$userID'")
                    ? ["Product Updated", "Product updated successfully.", "success"]
                    : ["Update Failed", "Issue updating the product.", "error"],
                "closemodal" => true
            ]);
        }
    
        return json_encode(["message" => ["Invalid Data", "Invalid data provided.", "error"], "closemodal" => true]);
    }
    

    

    

// public function update_pro($store_edit)
//     {
//         $data = $this->validate_form($store_edit);
//         if (is_array($data) && array_key_exists('userID', $data)) {
//             $checkimage = $this->getall("products", "upload_image = ?", [$data['upload_image']], "upload_image");
//             if (is_array($checkimage)) {
//                 unset($data['upload_image']);
//                 $this->message(" Image already exists in the database.", "error");
//                 return false;
//             } else {
//                 $id = $data['userID'];
//                 unset($data['userID']);
//                 $data['status'] = "1";
//                 $data['date']   = $date = date("M j, Y", time());
//                 $update = $this->update("products", $data, "userID = '$id'", "Products updated successfully.");
//             }
//         }
//     }


    // public function update_pro($store_edit)
    // {
    //     // Validate form data
    //     $data = $this->validate_form($store_edit);
    
    //     if (is_array($data) && array_key_exists('userID', $data)) {
    //         $userID = $data['userID'];
            
    //         // Retrieve the current image of the product
    //         $currentProduct = $this->getall("products", "userID = ?", [$userID], "upload_image");
    //         $currentImage = $currentProduct['upload_image'] ?? null;
    
    //         // Check if 'upload_image' exists in the validated data and is not empty
    //         if (isset($data['upload_image']) && (empty($currentImage) || $currentImage !== $data['upload_image'])) {
    //             $checkimage = $this->getall(
    //                 "products",
    //                 "upload_image = ? AND userID != ?",
    //                 [$data['upload_image'], $userID],
    //                 "upload_image"
    //             );
    
    //             if (is_array($checkimage) && !empty($checkimage)) {
    //                 // Conflict found, return error in JSON format
    //                 unset($data['upload_image']);
    //                 $return = [
    //                     "message" => ["Image Conflict", "Image already exists in the database.", "error"],
    //                     "closemodal" => true
    //                 ];
    //                 return json_encode($return);
    //             }
    //         }
            
    //         // Proceed with the update if no conflict and 'upload_image' is either set or empty
    //         unset($data['userID']); // Remove userID from data to avoid updating it
    //         $data['status'] = "1";
    //         $data['date'] = date("M j, Y", time());
    
    //         // Execute the update with the data
    //         $update = $this->update("products", $data, "userID = '$userID'");
            
    //         if ($update) {
    //             $return = [
    //                 "message" => ["Product Updated", "Product updated successfully.", "success"],
    //                 "closemodal" => true
    //             ];
    //             return json_encode($return);
    //         } else {
    //             $return = [
    //                 "message" => ["Update Failed", "There was an issue updating the product. Please try again.", "error"],
    //                 "closemodal" => true
    //             ];
    //             return json_encode($return);
    //         }
    //     } else {
    //         $return = [
    //             "message" => ["Invalid Data", "Invalid data provided.", "error"],
    //             "closemodal" => true
    //         ];
    //         return json_encode($return);
    //     }
    // }
    
    
    


    static public function d($value){
        return new $value;
    }

    public function createuser($new_user){

        $d = new database;
         
        $data = $this->validate_form($new_user);
        
        $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "createuser");
        if($verify){
            $data['ID'] = uniqid();
            $data['userID'] = uniqid();
            // $data = $d->checkmessage(["ID","first name", "last name", "phone number", "email"]);
            if(is_array($data)){
                $checkemail = $this->getall("users", "phone_number = ? and email = ?", [$data['phone_number'], $data['email']], fetch: "details");

            //   $checkemail = $d->getall("users", "phone_number = ? and email = ?", [$data['phone_number'], $data['email']], "");
              if($checkemail > 0){
                  $email = $data['email'];
                  $d->message("Account with email or phone number aleady exist. <a href='../login.php'>login here</a>", "error");
              }else{
                $password = $d->radmomstring(6);
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);

                // Assign admin's ID to the 'addedby' field
                $data['addedby'] = htmlspecialchars($_SESSION['adminSession'], ENT_QUOTES, 'UTF-8');
                

                $id = $data['ID'];
                // $data['addedby'] = "admin";
                
                $insert = $this->quick_insert("users", $data, "Account Created successfully <a href='?p=ads.php&action=new&id=$id'>Post Ads</a>",);
                // $insert = $d->quick_insert("users", "", $data, $message = "Account Created successfully <a href='?p=ads.php&action=new&id=$id'>Post Ads</a>");     
                    if($insert){
                $sendmail = $d->smtpmailer($to = $data['email'], "Auto Password Message", "Your new password.", "Hello ".$data['first_name'].", <br>"."Mstarz just added you as a customer on mstarztech.com <br> login with the information bellow: <br> Link: https://mstarztech.com/login <br> Username: (use your email or phone number) <br> Password: $password <hr> <small>Do not reply because this email is not monitored by anyone <br> if you have a complain click https://mstarztech.com/contact-us.php</small>", "Just sent password to $to");
                        
                    }
              }
            }
        }else{
            $d->message("You can not perform this action", "error");
        }
    }

} 
    ?>