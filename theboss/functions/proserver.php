<?php
    class product extends database{
        function process_file(){ //Product upload here
            $d = new database;
            $p = new product;
            $ctitle = htmlspecialchars($_POST["title"]);
            $video = htmlspecialchars($_POST["youtube"]);
            $price = htmlspecialchars($_POST["amount"]);
            $content = $_POST["content"];
            $ID = mt_rand(00000,99999);
            // $t_content = htmlspecialchars($_POST["title_content"]);
            $path = "../downloads/upload/";
            $title = uniqid("app");
            $upload = $d->process_image($title, $path);
            $uploadimage = $d->process_image(uniqid(), $path, "img");
            if(!empty($upload) && !empty($uploadimage)){
                $userID = uniqid("Upload");
                $enter = "products";
                $column = "ID, userID, software, amount, youtube, title, content, label, img";
                $set = "?,?,?,?,?,?,?,?,?";
                $data = array(uniqid(), $userID, $upload, $price, $video, $ctitle, $content, $label= "software", $uploadimage);
                $trans = $d->quick_insert($set, $enter, $column, $data);
            }
        }
  
          function process_pdf(){ //pdf upload here
            $d = new database;
            $p = new product;
            $err = false;
            $ctitle = htmlspecialchars($_POST["title"]);
            // $name = htmlspecialchars($_POST["name"]);
            // $price = htmlspecialchars($_POST["amount"]);
            $content = $_POST["content"];
            // $img = htmlspecialchars($_POST["uploaded_file"]);
            $ID = mt_rand(00000,99999);
            $t_content = htmlspecialchars($_POST["title_content"]);
        //  Here is the error
            $checkcontent = $d->fastgetwhere($what_to_get= "products", "content = ?", $content, "");
            if($checkcontent > 0){
                $d->message("sorry Content already exist", "error");
                $err = true;
            }
            $checktitle = $d->fastgetwhere($what_to_get= "products", "title = ?", $ctitle, "");
            if($checktitle > 0){
            $d->message("Title already exist", "error");
            $err = true;
            }
            // Error above
            if(!$err){
                $path = "../downloads/upload/image/";
                $title = uniqid("pdf");
                $upload = $d->process_image($title, $path);
                $uploadimage = $d->process_image(uniqid(), $path, "img");
                if(!empty($upload) && !empty($uploadimage)){
                    $userID = uniqid("img");
                    $enter = "products";
                    $column = "ID, userID, pdf, title, content, title_content, label, img";
                    $set = "?,?,?,?,?,?,?,?";
                    $data = array(uniqid(), $userID, $upload, $ctitle, $t_content, $content, $label= "pdf", $uploadimage);
                    $trans = $d->quick_insert($set, $enter, $column, $data);
                }
            }
      
        }

        // Windsor Auto Part
        function part_ads_slider(){
            $d = new database;
            $p = new product;
        $car = htmlspecialchars($_POST['cart']);
        $model = htmlspecialchars($_POST['carm']);
        // $ID = mt_rand(00000,99999);
        $path = "../upload/";
        $title = uniqid("img");
        $upload = $d->process_image($title, $path);
        if(!empty($upload)){
            $userID = uniqid();
            $enter = "user_page";
            $column = "userID, cart, carm, label, img";
            $set = "?,?,?,?,?";
            $data = array($userID, $car, $model, $label= "part_slides", $upload);
            $trans = $d->quick_insert($set, $enter, $column, $data);
        }
    }

    function part_slide_wheel(){
        $d = new database;
        $p = new product;
    $part = htmlspecialchars($_POST['partty']);
    $price = htmlspecialchars($_POST['price']);
    $discount = htmlspecialchars($_POST['discount']);
    $badges = htmlspecialchars($_POST['badge']);
    $path = "../upload/";
        $title = uniqid("img");
        $upload = $d->process_image($title, $path);
        if(!empty($upload)){
            $userID = uniqid();
            $enter = "user_page";
            $column = "userID, partty, price, discount, label, badge, img";
            $set = "?,?,?,?,?,?,?";
            $data = array($userID, $part, $price, $discount, $label= "wheels", $badges, $upload);
            $trans = $d->quick_insert($set, $enter, $column, $data);
        }
    }

    function caz_ads_slider(){
        $d = new database;
        $p = new product;
    // $car = htmlspecialchars($_POST['cart']);
    $model = htmlspecialchars($_POST['carm']);
    $price = htmlspecialchars($_POST['price']);
    $discount = htmlspecialchars($_POST['discount']);
    $badges = htmlspecialchars($_POST['badge']);
    $yrs = htmlspecialchars($_POST['year']);
    $auto = htmlspecialchars($_POST['auto']);
    $kph = htmlspecialchars($_POST['kph']);
    $path = "../upload/car/";
    $title = uniqid("img");
    $upload = $d->process_image($title, $path);
    if(!empty($upload)){
        $userID = uniqid();
        $enter = "user_page";
        $column = "userID, carm, price, discount, badge, year, auto, kph, label, img";
        $set = "?,?,?,?,?,?,?,?,?,?";
        $data = array($userID, $model, $price, $discount, $badges, $yrs, $auto, $kph, $label= "car-ads", $upload);
        $trans = $d->quick_insert($set, $enter, $column, $data);
    }
}

        function banner_ads_slider(){
            $d = new database;
            $p = new product;
        // $banner = htmlspecialchars($_POST['img']);
        // $ID = mt_rand(00000,99999);
        $path = "../upload/banner/";
        $title = uniqid("img");
        $upload = $d->process_image($title, $path);
                if(!empty($upload)){
                    $userID = uniqid();
                    $enter = "user_page";
                    $column = "userID, label, img";
                    $set = "?,?,?";
                    $data = array($userID, $label= "banner", $upload);
                    $trans = $d->quick_insert($set, $enter, $column, $data);
                }
        }

        function YouTube_ads(){
            $d = new database;
            $p = new product;
        $YouTube = htmlspecialchars($_POST['youtube']);
        $userID = uniqid();
        $enter = "user_page";
        $column = "userID, youtube, label";
        $set = "?,?,?";
        $data = array($userID, $YouTube, $label= "YouTube");
        $trans = $d->quick_insert($set, $enter, $column, $data);
        }

        // function testimonials(){ //testimonials upload here
        //     $d = new database;
        //     $p = new product;
        //     $err = false;

        //     // $ctitle = htmlspecialchars($_POST["title"]);
        //     $content = $_POST["des"];
        //     $fname = htmlspecialchars($_POST["fullname"]);
        //     $status = htmlspecialchars($_POST["position"]);


        // //  Here is the error
        //     $checkcontent = $d->fastgetwhere($what_to_get= "user_page", "des = ?", $content, "");
        //     if($checkcontent > 0){
        //         $d->message("sorry Content already exist", "error");
        //         $err = true;
        //     }
        //     $checkname = $d->fastgetwhere($what_to_get= "user_page", "fullname = ?", $fname, "");
        //     if($checkname > 0){
        //     $d->message("User with this name already exist", "error");
        //     $err = true;
        //     }
        //     // Error above
        //     if(!$err){
        //         $path = "../upload/testimonials/";
        //         $title = uniqid("bgimg");
        //         $upload = $d->process_image($title, $path);
        //         $uploadimage = $d->process_image(uniqid(), $path, "img");
        //         if(!empty($upload) && !empty($uploadimage)){
        //             $userID = uniqid(0000, 9999);
        //             $enter = "user_page";
        //             $column = "userID, des, fullname, position, label, bgimg, img";
        //             $set = "?,?,?,?,?,?,?";
        //             $data = array($userID, $content, $fname, $status, $label= "testimonials", $uploadimage, $upload);
        //             $trans = $d->quick_insert($set, $enter, $column, $data);
        //         }
        //     }
      
        // }


        // MSTARZ TECH server Start
        function update_home_control(){ //Home i do upload here
            $d = new database;
            $p = new product;
            $err = false;
            ini_set('upload_max_filesize', '200M'); 
            $fname =  htmlspecialchars($_POST['fname']);
            $phone_no =  htmlspecialchars($_POST['phone']);
            $message = htmlspecialchars($_POST["content"]);
            //  Here is the error
            $checkcontent = $d->fastgetwhere($what_to_get= "profile", "phone = ?", $message, "");
            if($checkcontent > 0){
                $d->message("Sorry Content already exist", "error");
                $err = true;
            }
            $checkname = $d->fastgetwhere($what_to_get= "profile", "fname = ?", $fname, "");
            if($checkname > 0){
            $d->message("Admin with this name already exist", "error");
            $err = true;
            }
            // Error above
    
        if(!$err){
            $info = $d->fastgetwhere("profile", "ID = ?", "63447143698e4", "details");
            // print_r($info);
            if(!empty($info['img'])){
                $upload = $info['img'];
            }else{
                $upload = $info['profile_img'];
            }
            $uploadimage = $info['img'];
            $title = uniqid("bgimg");
            $path = "../upload/";
            if(isset($_FILES["uploaded_file"]['name']) && !empty($_FILES["uploaded_file"]['name'])){
                $upload = $d->process_image($title, $path);
            }
            
            if(isset($_FILES["img"]['name']) && !empty($_FILES["img"]['name'])){
            $uploadimage = $d->process_image(uniqid(), $path, "img");
            }
            
            if(!empty($upload) && !empty($uploadimage)){
                $what = 'profile';
                $ID = "63447143698e4";
                $userID = uniqid();
                $set = 'userID =?, fname = ?, phone = ?, content = ?, img = ?, profile_img = ?';
                $where = "ID = '$ID'";
                $data = array($userID, $fname, $phone_no, $message, $uploadimage, $upload); 
                $success = database::getInstance()->update($what, $set, $where, $data);
            }
        }

}

        
        function what_i_do(){ //What i do upload here
            $d = new database;
            $p = new product;
            $err = false;
            $ctitle = htmlspecialchars($_POST["title"]);
            $message = htmlspecialchars($_POST["content"]);
            $feather = $_POST['feather'];


        //  Here is the error
            $checkcontent = $d->fastgetwhere($what_to_get= "user_details", "content = ?", $message, "");
            if($checkcontent > 0){
                $d->message("sorry Content already exist", "error");
                $err = true;
            }
            $checktitle = $d->fastgetwhere($what_to_get= "user_details", "title = ?", $ctitle, "");
            if($checktitle > 0){
            $d->message("User with this name already exist", "error");
            $err = true;
            }
            // Error above
            if(!$err){
                    $userID = uniqid();
                    $enter = "user_details";
                    $column = "ID, userID, title, content, label, feather";
                    $set = "?,?,?,?,?,?";
                    $data = array(uniqid(), $userID, $ctitle, $message, $label= "what_i_do", $feather);
                    $trans = $d->quick_insert($set, $enter, $column, $data);
            }
      
        }

        function portfolios(){ //portfolios upload here
            $d = new database;
            $p = new product;
            $ctitle = htmlspecialchars($_POST["title"]);
            $profession = htmlspecialchars($_POST["professions"]);
            $message = htmlspecialchars($_POST["content"]);
            $path = "../upload/portfolio/";
            $title = uniqid("img");
            $upload = $d->process_image($title, $path);
            if(!empty($upload)){
                $userID = uniqid();
                $enter = "user_details";
                $column = "ID, userID, title, professions, content, label, img";
                $set = "?,?,?,?,?,?,?";
                $data = array(uniqid(), $userID, $ctitle, $profession, $message, $label= "portfolios", $upload);
                $trans = $d->quick_insert($set, $enter, $column, $data);
            }
        }


        function testimonialz(){ //testimonials upload here
            $d = new database;
            $p = new product;
            $err = false;
            $fname = htmlspecialchars($_POST["fname"]);
            $status = htmlspecialchars($_POST["position"]);
            $ctitle = htmlspecialchars($_POST["title"]);
            $freelance = htmlspecialchars($_POST["freelance"]);
            $message = htmlspecialchars($_POST["content"]);


        //  Here is the error
            $checkcontent = $d->fastgetwhere($what_to_get= "user_details", "content = ?", $message, "");
            if($checkcontent > 0){
                $d->message("sorry Content already exist", "error");
                $err = true;
            }
            $checkname = $d->fastgetwhere($what_to_get= "user_details", "fname = ?", $fname, "");
            if($checkname > 0){
            $d->message("User with this name already exist", "error");
            $err = true;
            }
            // Error above
            if(!$err){
                $path = "../upload/testimonials/";
                $title = uniqid("img");
                $upload = $d->process_image($title, $path);
                        if(!empty($upload)){
                            $userID = uniqid();
                            $set = "?,?,?,?,?,?,?,?,?";
                            $enter = "user_details";
                            $column = "ID, userID, fname, position, title, freelance, content, label, img";
                            $data = array(uniqid(), $userID, $fname, $status, $ctitle, $freelance, $message,  $label= "testimonials", $upload);
                            $trans = $d->quick_insert($set, $enter, $column, $data);
                        }
            }
      
        }

        function education(){ //Education upload here
            $d = new database;
            $p = new product;
            $course = htmlspecialchars($_POST['course']);
            $institute = htmlspecialchars($_POST['institute']);
            $content = htmlspecialchars($_POST['content']);
            $userID = uniqid();
            $set = "?,?,?,?,?,?";
            $enter = "user_details";
            $column = "ID, userID, course, institute, content, label";
            $data = array(uniqid(), $userID, $course, $institute, $content, $label = "edu");
            $trans = $d->quick_insert($set, $enter, $column, $data, $message="Blog Succesfully Inputted");
        }

        function job_exp(){ //Education upload here
            $d = new database;
            $p = new product;
            $course = htmlspecialchars($_POST['course']);
            $institute = htmlspecialchars($_POST['institute']);
            $content = htmlspecialchars($_POST['content']);
            $userID = uniqid();
            $set = "?,?,?,?,?,?";
            $enter = "user_details";
            $column = "ID, userID, course, institute, content, label";
            $data = array(uniqid(), $userID, $course, $institute, $content, $label = "job");
            $trans = $d->quick_insert($set, $enter, $column, $data, $message="Blog Succesfully Inputted");
        }


        function blog(){
            $d = new database;
            $p = new product;
            $fname = htmlspecialchars($_POST['fname']);
            $title = htmlspecialchars($_POST['title']);
            $topic = htmlspecialchars($_POST['topic']);
            $Des = htmlspecialchars($_POST['content']);
            $status = htmlspecialchars($_POST['position']);
            $service_type = htmlspecialchars($_POST['service']);
            $path = "../upload/blog/";
            $imgtitle = uniqid("img");
            $upload = $d->process_image($imgtitle, $path);
                if(!empty($upload)){
                    $userID = mt_rand(0000, 9999);
                    $enter = "user_details";
                    $column = "ID, userID, fname, title, topic, content, position, label, service, img";
                    $set = "?,?,?,?,?,?,?,?,?,?";
                    $data = array(uniqid(), $userID, $fname, $title, $topic, $Des, $status, $label= "blog", $service_type, $upload);
                    $trans = $d->quick_insert($set, $enter, $column, $data, $message="Blog Succesfully Inputted");
                }
        }

        // UPDATE SESSION

        public function update_what_i_do($id){
            $d = new database;
            $title = database::escape_value($_POST['title']);
            $content = database::escape_value($_POST['content']);
            $feather = database::escape_value($_POST['feather']);
            $data = $d->fastgetwhere("user_details", "ID = ?", $id, "details");
          
            $what = 'user_details';
            $set = 'title = ?, content = ?, feather = ?';
            $where = "ID ='$id'";
            $data = array($title, $content, $feather);
            echo database::getInstance()->update($what, $set, $where, $data);
        }

        public function update_porfolio($id){
            $d = new database;
            $title = database::escape_value($_POST['title']);
            $professions = $_POST['professions'];
            $content = $_POST['content'];
            $data = $d->fastgetwhere("user_details", "ID = ?", $id, "details");
            if($_FILES['uploaded_file']['name'] != ""){
              $file_name =  $d->process_image( uniqid(), "../upload/portfolio/");
            }else{
               echo  $file_name = $data['img'];
            }
            $what = 'user_details';
            $set = 'title = ?, professions = ?, content = ?, img = ?';
            $where = "ID ='$id'";
            $data = array($title, $professions, $content, $file_name);
            echo database::getInstance()->update($what, $set, $where, $data);
        }

        function update_edu($id){
            $d = new database;
            $course = database::escape_value($_POST['course ']);
            $institute = database::escape_value($_POST['institute']);
            $content = database::escape_value($_POST['content']);
            $data = $d->fastgetwhere("user_details", "ID = ?", $id, "details");
          
            $what = 'user_details';
            $set = 'course = ?, institute = ?, content = ?';
            $where = "ID ='$id'";
            $data = array($course, $institute, $content);
            echo database::getInstance()->update($what, $set, $where, $data);
        }

        function updated_jobs($id){
            $d = new database;
            $course = htmlspecialchars($_POST['course']);
            $institute = htmlspecialchars($_POST['institute']);
            $content = htmlspecialchars($_POST['content']);
            $data = $d->fastgetwhere("user_details", "ID = ?", $id, "details");
          
            $what = 'user_details';
            $set = 'course = ?, institute = ?, content = ?';
            $where = "ID ='$id'";
            $data = array($course, $institute, $content);
            $value = $d->update($what, $set, $where, $data);
        }
 
        public function update_testimonial($id){
            $d = new database;
            $fname = database::escape_value($_POST['fname']);
            // $status = database::escape_value($_POST['status']);
            $title = database::escape_value($_POST['title']);
            $freelance = database::escape_value($_POST['freelance']);
            $content = database::escape_value($_POST['content']);

            $data = $d->fastgetwhere("user_details", "ID = ?", $id, "details");
            if($_FILES['uploaded_file']['name'] != ""){
              $file_name =  $d->process_image( uniqid(), "../upload/testimonials/");
            }else{
               echo  $file_name = $data['img'];
            }
            $what = 'user_details';
            $set = 'fname = ?,  title = ?, freelance = ?,  content= ?, img = ?';
            $where = "ID ='$id'";
            $data = array($fname, $title, $freelance, $content, $file_name);
            echo database::getInstance()->update($what, $set, $where, $data);
        }

        public function update_blogger($id){
            $d = new database;
            $fname = database::escape_value($_POST['fname']);
            $title = database::escape_value($_POST['title']);
            $topic = database::escape_value($_POST['topic']);
            $content = database::escape_value($_POST['content']);
            $position = database::escape_value($_POST['position']);
            $service = database::escape_value($_POST['service']);

            $data = $d->fastgetwhere("user_details", "ID = ?", $id, "details");
            if($_FILES['uploaded_file']['name'] != ""){
              $file_name =  $d->process_image( uniqid(), "../upload/testimonials/");
            }else{
               echo  $file_name = $data['img'];
            }
            $what = 'user_details';
            $set = 'fname = ?, title = ?, topic = ?, content= ?, position= ?, service= ?, img = ?';
            $where = "ID ='$id'";
            $data = array($fname, $title, $topic, $content, $position, $service, $file_name);
            echo database::getInstance()->update($what, $set, $where, $data);
        }
        
// Change Password
        function change_password(){
            $d = new database;
            $p = new product;
            $id = htmlspecialchars($_SESSION['AdminSession']);
            $value = $d->checkmessage(["current_password", "password", "confirm_password"]);
            if(is_array($value)){
                $data = $d->fastgetwhere("admin", "adminID = ?", $id, "details");
                if(password_verify($value['current_password'], $data['password'])){
                    $newpassword = password_hash($value['password'], PASSWORD_DEFAULT);
                    $where = "adminID ='$id'";
                    $update = $d->update("admin", "password = ?", $where, [$newpassword], "Password changed successfully");
                    $d->message("Inserted Successfully", "success");
                }else{
                    database::getInstance()->message("Password Incorrect", "error");
                }
            }
        }
// Mstarz Tech server sections ends here


    function vechicle_model(){
         $d = new database;
         $p = new product;
         $make = htmlspecialchars($_POST['make']);
         $model = htmlspecialchars($_POST['model']);
         $year = htmlspecialchars($_POST['year']);
         $userID = mt_rand(0000, 9999);
            $enter = "vehicle";
            $column = "userID, make, model, year";
            $set = "?,?,?,?";
            $data = array($userID, $make, $model, $year);
            $trans = $d->quick_insert($set, $enter, $column, $data, $message="Vehicle Succesfully Inputted");
    }

function upload_vehicles(){
         $d = new database;
         $p = new product;
         $makeID = $_POST['make'];
         $modelID = $_POST['model'];
         $year_ID = $_POST['year'];
         $price  = htmlspecialchars($_POST['price']);
         $discount  = htmlspecialchars($_POST['discount']);
         
         $path = "../upload/car/";
         $imgtitle = uniqid("img");
         $upload = $d->process_image($imgtitle, $path);
          
          if(!empty($upload)){
         $userID = mt_rand(00000, 99999);
         $set = "?,?,?,?,?,?,?,?";
         $enter = "cars_db";
         $column = "ID, userID, img, make, model, year, price, discount";
         
         $data = array(uniqid(), $userID, $upload, $makeID, $modelID, $year_ID, $price, $discount);
         $trans = $d->quick_insert($set, $enter, $column,  $data);
        
         }
}




        
        // change Profile Password
        public function change_profile_password(){
            $password = htmlspecialchars($_POST['password']);
            $cpassword = htmlspecialchars($_POST['cpassword']);
            if(empty($password || $cpassword)){
                echo '<div class="alert alert-danger">
                <strong>Warning!</strong> Please fill all filed
            </div>';
            }elseif($password != $cpassword){
                echo "<div class='alert alert-danger'>
                <strong>Warning!</strong> Password don't match.
            </div>";
            }else{
                $email = $_SESSION['AdminSession'];
                $passwordhash = password_hash($password, PASSWORD_DEFAULT);
                $what = 'admin';
                $set = 'password = ?';
                $where = "email ='$email'";
                $data = array($passwordhash); 
                $success = database::getInstance()->update($what, $set, $where, $data);
                if($success){
                    echo '  <script>
                    setTimeout(function(){ window.location= "index.php?logout"; }, 2000)
                    </script>';
                }
            }
           
        }
        
        
        function update_pdf($id){ //pdf upload here
            $d = new database;
            $p = new product;
            $err = false;
            $ctitle = htmlspecialchars($_POST["title"]);
            $stitle = $_POST["title_content"];
            $price = htmlspecialchars($_POST["amount"]);
            $content = $_POST["content"];
            // $img = htmlspecialchars($_POST["uploaded_file"]);
            // $ID = mt_rand(00000,99999);
            // $t_content = htmlspecialchars($_POST["title_content"]);
        //  Here is the error
            // $checkname = $d->fastgetwhere($what_to_get= "products", "ID != ? and name = ?", [$id, $price], "");
            // if($checkname > 0){
            //     $d->message("sorry name already exist 2", "error");
            //     $err = true;
            // }
            $checktitle = $d->multiplegetwhere($what_to_get= "products", "ID != ? and title = ?", [$id, $stitle], "");
            if($checktitle > 0){
            $d->message("Title already exist", "error");
            $err = true;
            }
            // Error above
            if(!$err){
                $info = $d->fastgetwhere("products", "ID = ?", $id, "details");
                // print_r($info);
                if(!empty($info['pdf'])){
                    $upload = $info['pdf'];
                }else{
                    $upload = $info['software'];
                }
                $uploadimage = $info['img'];
                $path = "../downloads/upload/image/";
                $title = uniqid("pdf");
                if(isset($_FILES["uploaded_file"]['name']) && !empty($_FILES["uploaded_file"]['name'])){
                    $upload = $d->process_image($title, $path);
                }
                
                if(isset($_FILES["img"]['name']) && !empty($_FILES["img"]['name'])){
                   $uploadimage = $d->process_image(uniqid(), $path, "img");
                }
                
                if(!empty($upload) && !empty($uploadimage)){
                    $what = 'products';
                    $set = 'title = ?, label = ?, pdf =?, title_content = ?,  content = ?, img =?, amount = ?, software = ?';
                    $where = "ID = '$id'";
                    $data = array($ctitle, $info['label'], $upload, $stitle, $content, $uploadimage, $price, $upload); 
                    $success = database::getInstance()->update($what, $set, $where, $data);
                }
            }
      
        }
        
        // Update app bellow 149
        function update_app_editor($id){ //update app here
            $d = new database;
            $p = new product;
            $err = false;
            $ctitle = htmlspecialchars($_POST["title"]);
            $video = htmlspecialchars($_POST["youtube"]);
            $price = htmlspecialchars($_POST["amount"]);
            $content = $_POST["content"];
            // $img = htmlspecialchars($_POST["uploaded_file"]);
            // $ID = mt_rand(00000,99999);
            // $t_content = htmlspecialchars($_POST["title_content"]);
        //  Here is the error
            // $checkname = $d->fastgetwhere($what_to_get= "products", "ID != ? and name = ?", [$id, $price], "");
            // if($checkname > 0){
            //     $d->message("sorry name already exist 2", "error");
            //     $err = true;
            // }
            $checktitle = $d->multiplegetwhere($what_to_get= "products", "ID != ? and title = ?", [$id, $ctitle], "");
            if($checktitle > 0){
            $d->message("Title already exist", "error");
            $err = true;
            }
            // Error above
            if(!$err){
                $info = $d->fastgetwhere("products", "ID = ?", $id, "details");
                // print_r($info);
                if(!empty($info['app'])){
                    $upload = $info['app'];
                }else{
                    $upload = $info['software'];
                }
                $uploadimage = $info['img'];
                $path = "../downloads/upload/";
                $title = uniqid("software");
                if(isset($_FILES["uploaded_file"]['name']) && !empty($_FILES["uploaded_file"]['name'])){
                    $upload = $d->process_image($title, $path);
                }
                
                if(isset($_FILES["img"]['name']) && !empty($_FILES["img"]['name'])){
                   $uploadimage = $d->process_image(uniqid(), $path, "img");
                }
                
                if(!empty($upload) && !empty($uploadimage)){
                    $what = 'products';
                    $set = 'title = ?, label = ?, pdf =?, youtube = ?,  content = ?, img =?, amount = ?, software = ?';
                    $where = "ID = '$id'";
                    $data = array($ctitle, $info['label'], $upload, $video,  $content, $uploadimage,$price, $upload); 
                    $success = database::getInstance()->update($what, $set, $where, $data);
                }
            }
      
        }
        
        
        
        
         //Edit/ Update pdf bellow 
        // function update_pdf_editor($id){ //update pdf here
        //     $d = new database;
        //     $p = new product;
        //     $err = false;
        //     $ctitle = htmlspecialchars($_POST["title"]);
        //     $video = htmlspecialchars($_POST["youtube"]);
        //     // $epdf = htmlspecialchars($_POST['pdf']);
        //     $price = htmlspecialchars($_POST["amount"]);
        //     $content = $_POST["content"];
        //     // $img = htmlspecialchars($_POST["uploaded_file"]);
        //     // $ID = mt_rand(00000,99999);
        //     // $t_content = htmlspecialchars($_POST["title_content"]);
        // //  Here is the error
        //     // $checkname = $d->fastgetwhere($what_to_get= "products", "ID != ? and name = ?", [$id, $price], "");
        //     // if($checkname > 0){
        //     //     $d->message("sorry name already exist 2", "error");
        //     //     $err = true;
        //     // }
        //     $checktitle = $d->multiplegetwhere($what_to_get= "products", "ID != ? and title = ?", [$id, $ctitle], "");
        //     if($checktitle > 0){
        //     $d->message("Title already exist", "error");
        //     $err = true;
        //     }
        //     // Error above
        //     if(!$err){
        //         $info = $d->fastgetwhere("products", "ID = ?", $id, "details");
        //         // print_r($info);
        //         if(!empty($info['pdf'])){
        //             $upload = $info['pdf'];
        //         }else{
        //             $upload = $info['pdf'];
        //         }
        //         $uploadimage = $info['img'];
        //         $path = "../downloads/upload/";
        //         $title = uniqid("pdf");
        //         if(isset($_FILES["uploaded_file"]['name']) && !empty($_FILES["uploaded_file"]['name'])){
        //             $upload = $d->process_image($title, $path);
        //         }
                
        //         if(isset($_FILES["img"]['name']) && !empty($_FILES["img"]['name'])){
        //           $uploadimage = $d->process_image(uniqid(), $path, "img");
        //         }
                
        //         if(!empty($upload) && !empty($uploadimage)){
        //             $what = 'products';
        //             $set = 'title = ?, label = ?, pdf =?, youtube = ?,  content = ?, img =?, amount = ?, pdf = ?';
        //             $where = "ID = '$id'";
        //             $data = array($ctitle, $info['label'], $upload, $video,  $content, $uploadimage,$price, $upload); 
        //             $success = database::getInstance()->update($what, $set, $where, $data);
        //         }
        //     }
      
        // }
        
        // Update Profile
        // function update_profile($id){ //Update upload here
        //     $d = new database;
        //     $p = new product;
        //     // $err = false;
        //     $name = htmlspecialchars($_POST["name"]);
        //     $ctitle = htmlspecialchars($_POST["status"]);
        //     $img = htmlspecialchars($_POST["profile_img"]);
        //     $ID = mt_rand(00000,99999);
        //     // $t_content = htmlspecialchars($_POST["title_content"]);
        // //  Here is the error
        //     // $checkname = $d->fastgetwhere($what_to_get= "products", "ID != ? and name = ?", [$id, $price], "");
        //     // if($checkname > 0){
        //     //     $d->message("sorry name already exist 2", "error");
        //     //     $err = true;
        //     // }
        //     // $checkname = $d->multiplegetwhere($what_to_get= "admin", "adminID != ? and status = ?", [$name, $ctitle], "");
        //     // if($checkname > 0){
        //     // $d->message("Name already exist", "error");
        //     // $err = true;
        //     // }
        //     // Error above
        //     // if(!$err){
        //         // $info = $d->fastgetwhere("admin", "adminID = ?", $name, "details");
        //         // print_r($info);
        //         // if(!empty($info['profile_img'])){
        //         //     $upload = $info['profile_img'];
        //         // }
        //         // $img = $info['profile_img'];
        //         $path = "upload/]";
        //         // $title = uniqid("pdf");
        //         // if(isset($_FILES["uploaded_file"]['name']) && !empty($_FILES["uploaded_file"]['name'])){
        //         //     $upload = $d->process_image($name, $path);
        //         // }
                
        //         // if(isset($_FILES["profile_img"]['name']) && !empty($_FILES["profile_img"]['name'])){
        //         //   $uploadimage = $d->process_image(uniqid(), $path, "img");
        //         // }
                
        //         if(!empty($name) && !empty($img)){
        //             $what = 'admin';
        //             $set = 'name = ?, status = ?, profile_img =?';
        //             $where = "ID = '$id'";
        //             $data = array( $name, $ctitle, $img); 
        //             $success = database::getInstance()->update($what, $set, $where, $data);
        //         }
        //     // }
      
        // }
        
        // Update Profile image
        public function update_profile($adminID){
            $name = database::escape_value($_POST['name']);
            $title = database::escape_value($_POST['status']);
            $fileName = $_FILES['uploaded_file']['name'];
            $path = "upload/";
            if($_FILES['uploaded_file']['name'] != ""){
              $file_name =  database::getInstance()->process_image( uniqid(), $path);
            }else{
               echo  $file_name = $_POST['profile_img'];
            }
            
            $what = 'admin';
            $set = 'name = ?, status = ?, profile_img = ?';
            $where = "adminID ='$adminID'";
            $data = array($name, $title, $file_name);
            echo database::getInstance()->update($what, $set, $where, $data);
        }
        
        
        
// function update_profile(){
//     ini_set('upload_max_filesize', '200M');
//     $name = database::escape_value($_POST['name']);
//     $title =  database::escape_value($_POST['status']);
//     $fileName =  database::escape_value($_POST['profile_img']);
//     // $fileName = $info['profile_img'];
//     $fileName = database::getInstance()->update_profile();
    
//     $path = "upload/";
//     $what = 'admin';
//     $set = 'name = ?, status = ?, profile_img = ?';
//     $where = "adminID = ?";
//     $data = array($name, $title, $fileName); 
//     $success = database::getInstance()->update($what, $set, $where, $data);
//     }
       


function update_about(){
    $d = new database;
    ini_set('upload_max_filesize', '200M');
    $name = database::escape_value($_POST['Hosname']);
    $email =  database::escape_value($_POST['email']);
    $details = $_POST['details'];
    $phone = database::escape_value($_POST['phone_number']);
    $address =  database::escape_value($_POST['office_address']);
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    // $linkedin = $_POST['linkedin'];
    $data = $d->fastgetwhere("about", "ID = ?", 1, "details");
        if($_FILES['uploaded_file']['name'] != ""){
              $file_name =  database::getInstance()->process_image( uniqid(), "../upload/about/");
            }else{
               echo  $file_name = $data['img'];
            }
    // $fileName = database::getInstance()->process_images();
    
    $what = 'about';
    $set = 'name = ?,  email =?, details =?, phone = ?, office_address = ?, facebook = ?, instagram =?, twitter = ?, linkedin = ?,  img = ?';
    $where = "ID ='1'";
    $data = array($name, $email, $details, $phone, $address,  $facebook, $instagram, $twitter, $linkedin, $file_name); 
    $success = database::getInstance()->update($what, $set, $where, $data);
    }
      

            function upload_spreedsheets(){ //Excel upload here
                $d = new database;
                $p = new product;
                $ctitle = htmlspecialchars($_POST["title"]);
                // $name = htmlspecialchars($_POST["name"]);
                // $price = htmlspecialchars($_POST["amount"]);
                $content = $_POST["content"];
                $ID = mt_rand(00000,99999);
                $t_content = htmlspecialchars($_POST["title_content"]);
                $path = "../downloads/upload/image/";
                $title = uniqid("excel");
                $upload = $d->process_image($title, $path);
                $uploadimage = $d->process_image(uniqid(), $path, "img");
                if(!empty($upload) && !empty($uploadimage)){
                    $userID = uniqid("img");
                    $enter = "products";
                    $column = "ID, userID, spreedsheet, title, content, label, title_content, img";
                    $set = "?,?,?,?,?,?,?,?";
                    $data = array(uniqid(), $userID, $upload, $ctitle, $content, $label= "spreedsheet", $t_content, $uploadimage);
                    $trans = $d->quick_insert($set, $enter, $column, $data);
                }
            }


// New process video below

        function process_video(){ //video upload here
            $d = new database;
            $p = new product;
            $ctitle = htmlspecialchars($_POST["title"]);
            // $name = htmlspecialchars($_POST["name"]);
            $youtube = htmlspecialchars($_POST["youtube"]);
            $content = $_POST["content"];
            $ID = mt_rand(00000,99999);
            // $t_content = htmlspecialchars($_POST["title_content"]);
            $path = "../downloads/upload/image/";
            $title = uniqid("video");
            $upload = $d->process_image($title, $path);
            // $uploadimage = $d->process_image(uniqid(), $path, "img");
            if(!empty($upload)){
                $userID = uniqid("video");
                $set = "?,?,?,?,?,?,?";
                $enter = "products";
                $column = "ID, userID, img, title, youtube, content, label";
                $data = array(uniqid(), $userID, $upload, $youtube, $ctitle, $content, $label= "video");
                $trans = $d->quick_insert($set, $enter, $column, $data);
            }
        }
        
        // // New process FAQ Utility below with image working

        // function process_faq(){ //FAQ upload here
        //     $d = new database;
        //     $p = new product;
        //     $ctitle = htmlspecialchars($_POST["title"]);
        //     $content = $_POST["content"];
        //     if($_FILES['uploaded_file']['name'] != ""){
        //       $upload =  $d->process_image( uniqid(), "../upload/");
        //     }
        //     if(!empty($upload)){
        //         $enter = "faq";
        //         $column = "title, content, label, img";
        //         $set = "?,?,?,?";
        //         $data = array($ctitle, $content, $label = "utility", $upload);
        //         $trans = $d->quick_insert($set, $enter, $column, $data);
        //     }
        // }
        
        
        // FAQ without Image
        function process_faq(){ //FAQ upload here
            $d = new database;
            $p = new product;
            $ctitle = htmlspecialchars($_POST["title"]);
            $content = $_POST["content"];
            // if($_FILES['uploaded_file']['name'] != ""){
            //   $upload =  $d->process_image( uniqid(), "../upload/");
            // }
            // if(!empty($upload)){
                $enter = "faq";
                $column = "title, content, label";
                $set = "?,?,?";
                $data = array($ctitle, $content, $label = "utility");
                $trans = $d->quick_insert($set, $enter, $column, $data);
            // }
        }
        
         // New process FAQ Database below

        // function process_faq_data(){ //FAQ upload here
        //     $d = new database;
        //     $p = new product;
        //     $ctitle = htmlspecialchars($_POST["title"]);
        //     $content = $_POST["content"];
        //     if($_FILES['uploaded_file']['name'] != ""){
        //       $upload =  $d->process_image( uniqid(), "../upload/");
        //     }
        //     if(!empty($upload)){
        //         $enter = "faq";
        //         $column = "title, content, label, img";
        //         $set = "?,?,?,?";
        //         $data = array($ctitle, $content, $label= "admin", $upload);
        //         $trans = $d->quick_insert($set, $enter, $column, $data);
        //     }
        // }
        
        
        // New process FAQ Database below

        function process_faq_data(){ //FAQ upload here
            $d = new database;
            $p = new product;
            $ctitle = htmlspecialchars($_POST["title"]);
            $content = $_POST["content"];
            // if($_FILES['uploaded_file']['name'] != ""){
            //   $upload =  $d->process_image( uniqid(), "../upload/");
            // }
            // if(!empty($upload)){
                $enter = "faq";
                $column = "title, content, label";
                $set = "?,?,?";
                $data = array($ctitle, $content, $label= "admin");
                $trans = $d->quick_insert($set, $enter, $column, $data);
            // }
        }


  public function update_blog($id){
            $d = new database;
            $title = database::escape_value($_POST['title']);
            $short_con = $_POST['content_brief'];
            $content = $_POST['content'];
            $data = $d->fastgetwhere("products", "ID = ?", $id, "details");
            if($_FILES['uploaded_file']['name'] != ""){
              $file_name =  $d->process_image( uniqid(), "../downloads/upload/");
            }else{
               echo  $file_name = $data['img'];
            }
            $what = 'blog';
            $set = 'title = ?, content = ?, content_brief = ?, img = ?';
            $where = "ID ='$id'";
            $data = array($title, $content, $short_con, $file_name);
            echo database::getInstance()->update($what, $set, $where, $data);
        }



  // Update Video
    //Single Image update code   
        public function updat_video($id){
            $d = new database;
            $title = database::escape_value($_POST['title']);
            $youtube = $_POST['youtube'];
            $content = $_POST['content'];
            $data = $d->fastgetwhere("products", "ID = ?", $id, "details");
            if($_FILES['uploaded_file']['name'] != ""){
              $file_name =  $d->process_image( uniqid(), "../downloads/upload/image/");
            }else{
               echo  $file_name = $data['img'];
            }
            $what = 'products';
            $set = 'title = ?, content = ?, youtube = ?, img = ?';
            $where = "ID ='$id'";
            $data = array($title, $content, $youtube, $file_name);
            echo database::getInstance()->update($what, $set, $where, $data);
        }

//  doc, dwg
function process_doc(){ //doc upload here
    $d = new database;
    $p = new product;
    $ctitle = htmlspecialchars($_POST["title"]);
    $name = htmlspecialchars($_POST["name"]);
    $price = htmlspecialchars($_POST["amount"]);
    $content = htmlspecialchars($_POST["content"]);
    $ID = mt_rand(00000,99999);
    $t_content = htmlspecialchars($_POST["title_content"]);
    $path = "../downloads/upload/image/";
    $title = uniqid("doc");
    $upload = $d->process_image($title, $path);
    $uploadimage = $d->process_image(uniqid(), $path, "img");
    if(!empty($upload) && !empty($uploadimage)){
        $userID = uniqid("img");
        $enter = "products";
        $column = "ID, userID, doc, name, amount, title, content, label, title_content, img";
        $set = "?,?,?,?,?,?,?,?,?,?";
        $data = array(uniqid(), $userID, $upload, $name, $price, $ctitle, $content, $label= "doc", $t_content, $uploadimage);
        $trans = $d->quick_insert($set, $enter, $column, $data);
    }
}

function process_dwg(){ //pdf upload here
    $d = new database;
    $p = new product;
    $ctitle = htmlspecialchars($_POST["title"]);
    $name = htmlspecialchars($_POST["name"]);
    $price = htmlspecialchars($_POST["amount"]);
    $content = htmlspecialchars($_POST["content"]);
    $ID = mt_rand(00000,99999);
    $t_content = htmlspecialchars($_POST["title_content"]);
    $path = "../downloads/upload/image/";
    $title = uniqid("dwg");
    $upload = $d->process_image($title, $path);
    $uploadimage = $d->process_image(uniqid(), $path, "img");
    if(!empty($upload) && !empty($uploadimage)){
        $userID = uniqid("img");
        $enter = "products";
        $column = "ID, userID, dwg, name, amount, title, content, label, title_content, img";
        $set = "?,?,?,?,?,?,?,?,?,?";
        $data = array(uniqid(), $userID, $upload, $name, $price, $ctitle, $content, $label= "dwg", $t_content, $uploadimage);
        $trans = $d->quick_insert($set, $enter, $column, $data);
    }
}

        // Articles section here
        function add_blog(){
            $d = new database;
            $imgtitle = htmlspecialchars($_POST["title"]);
            $cshort = htmlspecialchars($_POST["content_brief"]);
            $content = htmlspecialchars($_POST["content"]);
            $path = "../downloads/upload/";
            $title = uniqid("img");
            $upload = $d->process_image($title, $path);
            if(!empty($upload)){
                $userID = mt_rand(00000, 99999);
                $enter = "blog";
                $column = "ID, userID, title, content_brief, content, img";
                $set = "?,?,?,?,?,?";
                $data = array(uniqid(), $userID, $imgtitle, $cshort, $content, $upload);
                $trans = $d->quick_insert($set, $enter, $column, $data);
        } 

    } 
  
  function search($search) {
    $d = new database;
    // $notarray= database::getInstance()->fastgetwhere($what_to_get="about_hospital",$where="name=?", $what="$name",$limit=";");
     $notarray= database::getInstance()->fastgetwhere("SELECT * FROM products WHERE title LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%'");

    $result = $d -> query($sql);
    $list = array();

    while($row = $result->fetch_assoc()) {
        $list[] = $row;
    }
    return $list;
}
  
  
    // for search
    public function v_search(){
        $d = new database;
        $search = htmlspecialchars($_POST["q"]);
        if($search <= 1){
            $d->array_insert($array, $position, $insert, $name = "");
        }
    }
} 
?>