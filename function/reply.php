<?php
class Reply extends database{

    public function reply_server($products_reply) {
        $d = new database;
        $data = $this->validate_form($products_reply);
    
        if (is_array($data)) {
            $data['ID'] = uniqid();
            $data['userID'] = uniqid();
            $userID = $data['userID']; // Define $userID here
            $ip_address = $d->get_visitor_details()['ip_address'];
            
            $data['userID'] = $userID;
            $data['ip_address'] = $ip_address;
            
            $check = $d->getall("prod_reply", "(userID = ? or ip_address = ?) and email = ?", [$userID, $ip_address, $data['email']]);
            
            if (!is_array($check)) {
                $d->quick_insert("prod_reply", $data, "Your message has been sent Successfully");
            }
        }
    }
    
    // public function reply_server($products_reply) {
    //     $d    = new database;
    //     $data = $this->validate_form($products_reply);
    //     if (is_array($data)) {
    //         $data['ID'] = uniqid();
    //         $data['userID'] = uniqid();
    
    //         // Get the visitor details (including IP address)
    //         $visitorDetails = $this->get_visitor_details();
    //         $ip_address     = $visitorDetails['ip_address'];
    
    //         // Log the user's IP address with email, userID, and ID
    //         $this->log_user_ip($data['email'], $ip_address, $data['userID'], $data['ID']);
    
    //         // Insert the reply along with all data
    //         $insert = $this->quick_insert("prod_reply", $data, "Your message has been sent Successfully");
    //     }
    // }

   
    

    //     $d = new database;
    
    //     // Prepare the data for updating the user's IP address
    //     $updateData = [
    //         "ip_address" => $ip_address,
    //         "date" => date('Y-m-d H:i:s')
    //     ];
    
    //     // Check if the user exists in the "prod_reply" table based on email
    //     $existingUser = $d->getall("prod_reply", "email = ?", [$email], fetch: "details");
    
    //     if (!empty($existingUser)) {
    //         // Update the existing user’s IP address silently
    //         $this->update("prod_reply", $updateData, "email = ?", [$email]);
    //     } else {
    //         // Insert a new record with userID, ID, email, IP address, and date silently
    //         $insertData = [
    //             "ID" => $ID,
    //             "userID" => $userID,
    //             "email" => $email,
    //             "ip_address" => $ip_address,
    //             "date" => date('Y-m-d H:i:s')
    //         ];
    //         // Insert data without displaying any message
    //         $this->quick_insert("prod_reply", $insertData);
    //     }
    // }
    
    // private function log_user_ip($email, $ip_address, $data) {
    //     $d = new database;
    
    //     // Check if the user exists in the "prod_reply" table based on email
    //     $existingUser = $d->getall("prod_reply", "email = ?", [$email], fetch: "details");
    
    //     if (!empty($existingUser)) {
    //         // Update the existing user's IP address
    //         $updateData = [
    //             "ip_address" => $ip_address,
    //             "date" => date('Y-m-d H:i:s')
    //         ];
    //         $this->update("prod_reply", $updateData, "email = ?", [$email]);
    //     } else {
    //         // Insert a new row if the email doesn't exist, including ID and userID
    //         $insertData = [
    //             "ID" => $data,
    //             "userID" => $data,
    //             "fname" => $data,
    //             "email" => $email,
    //             "ip_address" => $ip_address,
    //             "date" => date('Y-m-d H:i:s')
    //         ];
    //         $this->quick_insert("prod_reply", $insertData);
    //     }
    // }
    
    
    
}
?>