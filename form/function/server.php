<?php
class project extends database{
    function form_assessment(){ //Quick insert appointment here
        $d = new database;
        $p = new project;
        $err = false;
        $value = $d->checkmessage(["fname", "lname", "phone", "fax", "email", "cname", "address", "address2_null", "city", "region", "zip code", "country", "location", "referral_null", "course", "place_study", "content", "agreement", "fear", "date"]);
        $checkname = $d->fastgetwhere($what_to_get= "form_data", "fname = ?", $value['fname'], "");
        if($checkname > 0){
        $d->message("User with this name already exist", "error");
        $err = true;
        }
        if(!$err){
            if(is_array($value)){

                if($_FILES['uploaded_file']['name'] != ""){
                    $file_name =  $d->process_image(uniqid(), "upload/idcard/");
                  }else{
                     echo  $file_name = $data['img'];
                  }
                $userID = uniqid();
                $Ref = uniqid();
                $enter = "form_data";
                $column = "ID, userID, fname, lname, phone, fax, email, cname, address, address2, city, region, zip_code, country, location, 
                referral, reference, course, place_study, content, agreement, img, fear, date";
                
                $data = array(uniqid(), $userID, $value['fname'], 
                $value['lname'], 
                $value['phone'], 
                $value['fax'], 
                $value['email'], 
                $value['cname'], 
                $value['address'], 
                $value['address2'], 
                $value['city'], 
                $value['region'], 
                $value['zip_code'], 
                $value['country'], 
                $value['location'], 
                $value['referral'], 
                $Ref, 
                $value['course'], 
                $value['place_study'], 
                $value['content'], 
                $value['agreement'], 
                $file_name, 
                $value['fear'],  
                $value['date']);
                echo $d->quick_insert($enter, $column, $data, $message = "Form Successfully Sent, The Admin will reply to your mail shortly");
                header("Location: profile.php?pID=$userID");
            }
        }
    }
}
?>
