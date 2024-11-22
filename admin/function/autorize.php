<?php

class validate extends database
{
    public function signin($user_validating)
    {
        $d    = new database;
        $data = $this->validate_form($user_validating);
        if (!is_array($data)) {
            return null;
        }
        $value = $this->getall("admins", "email = ?", [$data['email']], fetch: "details");
        if (is_array($value)) {
            if (password_verify($data['password'], $value['password'])) {
                 $_SESSION['adminSession'] = htmlspecialchars($value['ID']);
                   return $this->loadpage("index", "json");
            } else {
                $this->message("Password Incorrect", "error");
            }
        } else {
            $this->message("Email doesn't exist.", "error");
        }
    }

    
    function lockscreen($screen_locked) {
        $data = $this->validate_form($screen_locked);
        if (!is_array($data)) return null;
        $ID = $_SESSION['ID'];
        $user = $this->getall("admins", "ID = ?", [$ID], fetch: "details");
        if (!is_array($user)) {
            $this->message("User not found", "error");
            return;
        }
    
        if(isset($_POST['unlock'])){
            $stored_password = $user['password']; // Assuming 'password' is the column name in the database
            $input_password = htmlspecialchars($_POST['password']);
            
            if(password_verify($input_password, $stored_password)) {
                unset($_SESSION['lockscreen']);
                $_SESSION['adminSession'] = $user['ID'];
                // echo "Got here";
                return $this->loadpage("index.php", "json");
            } else {
                $this->message("Password Incorrect", "error");
                return;
            }
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
                           return $this->loadpage("index", "json");
                        
                    }
                }
        }
    }


    function updating_home($frontboard) {
        $data = $this->validate_form($frontboard);
        if (is_array($data) && array_key_exists('userID', $data)) {
            $id = $data['userID'];
            unset($data['userID']);
            // Check if the file exists
            // $fileToDelete = "upload/"; // Replace with the actual path
            // if (file_exists($fileToDelete)) {
            //     // If the file exists, unlink it
            //     unlink($fileToDelete);
                $update = $this->update("profile", $data, "userID = '$id'", "Data updated successfully.");
                // if ($update) {
                //     $this->message("Data has been Updated Successfully", "success");
                // } 
    }
}

// $unreadNotifications = $d->getall("chat", "userID = ? AND isRead = 0", [$userID], fetch: "details");

// function unreadNotifications($userID)
//     {
//         return $this->getall("chat", "userID = ? and isRead = 0", [$userID], fetch: "");
//     }

function unreadNotifications($userID)
{
    // Fetch chat records where isRead is 0 (i.e., unread messages)
    $results = $this->getall(
        "chat",                           // Table name
        "userID = ? AND isRead = 0",      // Condition to get unread messages for the specific user
        [$userID],                        // Bind the userID parameter                // Select all columns (you can specify other columns if needed)
        fetch: "details"                         // Fetch method (assuming "details" returns an array of chat details)
    );

    // Return the results or an empty array if no unread notifications found
    return $results ?: [];
}





// Call the unreadNotifications function





// var_dump($unreadNotifications);

    
 // return $this->getall("chat", "userID = ? and no_product > ?", [$userID, 0], fetch: "");
}
?>

 