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
                   return $this->loadpage("index.php", "json");
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
 
}
?>

 