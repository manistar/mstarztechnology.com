<?php
class project extends database {
    function form_assessment() {
        // Initialize instances
        $d = new database;
        $p = new project;

        $err = false;

        // Sanitize and validate input
        $value = $d->checkmessage([
            "fname", "lname", "phone", "fax", "email", "cname", 
            "address", "address2_null", "city", "region", "zip_code", 
            "country", "location", "referral_null", "course", 
            "place_study", "content", "agreement", "fear", "date"
        ]);

        // Check if a user with the same name already exists
        $checkname = $d->fastgetwhere("form_data", "fname = ?", $value['fname'], "");
        if ($checkname > 0) {
            $d->message("User with this name already exists", "error");
            $err = true;
        }

        if (!$err) {
            if (is_array($value)) {
                // Handle file upload
                $file_name = null;
                if (!empty($_FILES['uploaded_file']['name'])) {
                    $file_name = $d->process_image(uniqid(), "upload/idcard/");
                } else {
                    $file_name = isset($value['img']) ? $value['img'] : null; // Fallback to existing image if no new upload
                }

                // Generate unique IDs
                $userID = uniqid();
                $Ref = uniqid();

                // Table and columns
                $enter = "students";
                $column = "ID, userID, fname, lname, phone, fax, email, cname, address, address2, city, region, zip_code, country, location, referral, reference, course, place_study, content, agreement, img, fear, date";

                // Data array
                $data = [
                    uniqid(), $userID, $value['fname'], $value['lname'], $value['phone'], $value['fax'], 
                    $value['email'], $value['cname'], $value['address'], $value['address2'], $value['city'], 
                    $value['region'], $value['zip_code'], $value['country'], $value['location'], 
                    $value['referral'], $Ref, $value['course'], $value['place_study'], 
                    $value['content'], $value['agreement'], $file_name, $value['fear'], $value['date']
                ];

                // Insert data
                $result = $d->quick_insert($enter, $column, $data, "Form successfully sent. The admin will reply to your email shortly.");
                if ($result) {
                    header("Location: profile?pID=$userID");
                    exit(); // Ensure script stops after redirect
                } else {
                    $d->message("Error: Failed to insert data into the database", "error");
                }
            }
        }
    }
}
?>
