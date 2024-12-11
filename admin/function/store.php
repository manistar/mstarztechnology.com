<?php
class input extends database
{
    public function upload_products($store_insert)
    {
        $data = $this->validate_form($store_insert);
        if (is_array($data)) {
                
            // Assuming description field contains HTML content
            $data['description'] = $_POST['description']; // Make sure description is coming from a WYSIWYG editor

            $data['userID'] = $_SESSION['adminSession']; 
            $data['ID'] = uniqid();  // Assuming you want to set the 'ID' field
            $data['date'] = date("M j, Y", time());

            // Insert into the database
            $insert = $this->quick_insert("products", $data, "products inserted Successfully");
    }
}
    
  



    // public function update_pro($store_edit)
    // {
    //     // Validate and sanitize form data
    //     $data = $this->validate_form($store_edit);
        
    //     // Ensure data contains userID for identification
    //     if (is_array($data) && array_key_exists('userID', $data)) {
    
    //         // Check if image already exists in the products table
    //         // $checkimage = $this->getall("products", "upload_image = ?", [$data['upload_image']], "upload_image");
            
    //         // if (is_array($checkimage) && !empty($checkimage)) {
    //         //     unset($data['upload_image']); // Remove image field to avoid duplicates
    //         //     $this->message("Image already exists in the database.", "error");
    //         //     return false;
    //         // } else {
    //             // Retrieve userID for WHERE clause and remove from data
    //             $id = $data['userID'];
    //             unset($data['userID']);
                
    //             // Add additional fields to data
    //             $data['status'] = "1";
                

    //             $data['status'] = "1";
    //             $where = $data['date'] = date("M j, Y", time());
    //             $update = $this->update("products", "", $where, $data);
    
    //             // Call the update function with the required parameters
    //             // $update = $this->update("products", $data, [$id]);
    
    //             if ($update) {
    //                 // Fetch the updated product details to confirm the update
    //                 $ads = $this->getall("products", "userID = ?", [$id], fetch: "details");
    //                 $return = [
    //                     "message" => ["Account Updated", "You have successfully updated this product", "success"],
    //                     // "function" => ["updatetable", "data" => [$store_edit, $id]],
    //                     "closemodal" => true
    //                 ];
    //                 return json_encode($return);
    //             } else {
    //                 $this->message("Update failed. Please try again.", "error");
    //                 return false;
    //             }
    //         // }
    //     } else {
    //         $this->message("Invalid data provided.", "error");
    //         return false;
    //     }
    // }

    // public function update_pro($store_edit)
    // {
    //     $data = $this->validate_form($store_edit);
    //     if (is_array($data) && array_key_exists('userID', $data)) {
    //         $checkimage = $this->getall("products", "upload_image = ?", [$data['upload_image']], "upload_image");
    //         if (is_array($checkimage)) {
    //             unset($data['upload_image']);
    //             $this->message(" Image already exists in the database.", "error");
    //             return false;
    //         } else {
    //             $id = $data['userID'];
    //             unset($data['userID']);
    //             $data['status'] = "1";
    //             $data['date']   = $date = date("M j, Y", time());
    //             $update = $this->update("products", $data, "userID = '$id'", "Products updated successfully.");
    //         }
    //     }
    // }
    
    
    function edit_content()
    {
        $d = new database;
        $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "editcontent");
        if ($verify) {
            // echo $_FILES["logo"]["name"];
            $data = $d->checkmessage(["website name", "slogan_null", "about", "meta title", "meta description_null", "meta key words_null", "phone number_null", "email_null", "address_null", "instagram_null", "facebook_null", "twitter_null", "youtube_null", "whatsapp_null", "tiktok_null"]);
            if (is_array($data)) {
                $id = "1";
                $where = "ID = '$id'";
                $update = $d->update("content", "", $where, $data);
                if ($update) {
                    $return = [
                        "message" => ["Success", "Content Saved", "success"],
                    ];
                    return json_encode($return);
                }
            }
        }
    }
}
?>