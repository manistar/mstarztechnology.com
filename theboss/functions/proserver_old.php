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
            $name = htmlspecialchars($_POST["name"]);
            $price = htmlspecialchars($_POST["amount"]);
            $content = $_POST["content"];
            // $img = htmlspecialchars($_POST["uploaded_file"]);
            $ID = mt_rand(00000,99999);
            $t_content = htmlspecialchars($_POST["title_content"]);
        //  Here is the error
            $checkname = $d->fastgetwhere($what_to_get= "products", "name = ?", $name, "");
            if($checkname > 0){
                $d->message("sorry name already exist", "error");
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
                    $column = "ID, userID, pdf, name, amount, title, content, label, title_content, img";
                    $set = "?,?,?,?,?,?,?,?,?,?";
                    $data = array(uniqid(), $userID, $upload, $name, $price, $ctitle, $content, $label= "pdf", $t_content, $uploadimage);
                    $trans = $d->quick_insert($set, $enter, $column, $data);
                }
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
            // $name = htmlspecialchars($_POST["name"]);
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
                    $set = 'title = ?, label = ?, pdf =?,  content = ?, img =?, amount = ?, software = ?';
                    $where = "ID = '$id'";
                    $data = array($ctitle, $info['label'], $upload,  $content, $uploadimage,$price, $upload); 
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
       

// Update About US

function update_about(){
    $d = new database;
    ini_set('upload_max_filesize', '200M');
    $name = database::escape_value($_POST['Hosname']);
    $email =  database::escape_value($_POST['email']);
    $details = $_POST['details'];
    $phone_number = database::escape_value($_POST['phone_number']);
    $address =  database::escape_value($_POST['address']);
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    // $linkedin = $_POST['linkedin'];
    $data = $d->fastgetwhere("about_hospital", "ID = ?", 2, "details");
        if($_FILES['uploaded_file']['name'] != ""){
              $file_name =  database::getInstance()->process_image( uniqid(), "../upload/");
            }else{
               echo  $file_name = $data['picture'];
            }
    // $fileName = database::getInstance()->process_images();
    
    $what = 'about_hospital';
    $set = 'name = ?, address = ?, email =?, phone_number = ?, facebook = ?, instagram =?, twitter = ?, linkedin = ?, details =?, picture = ?';
    $where = "ID ='2'";
    $data = array($name, $address, $email, $phone_number, $facebook, $instagram, $twitter, $linkedin, $details, $file_name); 
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

        function process_video(){ //doc upload here
            $d = new database;
            $p = new product;
            $ctitle = htmlspecialchars($_POST["title"]);
            // $name = htmlspecialchars($_POST["name"]);
            $youtube = htmlspecialchars($_POST["youtube"]);
            $content = $_POST["content"];
            $ID = mt_rand(00000,99999);
            $t_content = htmlspecialchars($_POST["title_content"]);
            $path = "../downloads/upload/video/";
            $title = uniqid("video");
            $upload = $d->process_image($title, $path);
            // $uploadimage = $d->process_image(uniqid(), $path, "img");
            if(!empty($upload)){
                $userID = uniqid("video");
                $enter = "products";
                $column = "ID, userID, video, youtube, title, content, label, title_content";
                $set = "?,?,?,?,?,?,?,?";
                $data = array(uniqid(), $userID, $upload, $youtube, $ctitle, $content, $label= "video", $t_content);
                $trans = $d->quick_insert($set, $enter, $column, $data);
            }
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