<?php
    class product extends database{
        function part_ads_slider(){
                $d = new database;
                $p = new product;
            $type_car = htmlspecialchars($_POST['car-type']);
            $model = htmlspecialchars($_POST['car-model']);
            $ID = mt_rand(00000,99999);
            $path = "../upload/";
            $userID = uniqid("part");
            $upload = $d->process_image($title, $path);
            if(!empty($upload)){
                $userID = uniqid("Upload");
                $enter = "user_page";
                $column = "ID, userID, car-type, car-model, label, img";
                $data = array(uniqid(), $userID, $upload, $type_car, $model, $label= "part_slides");
                echo $d->quick_insert($enter, $column, $data, $message = "Slider Successfully Uploaded");
            }
        }


    //     function add_blog(){
    //         $d = new database;
    //         $imgtitle = htmlspecialchars($_POST["title"]);
    //         $cshort = htmlspecialchars($_POST["content_brief"]);
    //         $content = htmlspecialchars($_POST["content"]);
    //         $path = "../downloads/upload/";
    //         $title = uniqid("img");
    //         $upload = $d->process_image($title, $path);
    //         if(!empty($upload)){
    //             $userID = mt_rand(00000, 99999);
    //             $enter = "blog";
    //             $column = "ID, userID, title, content_brief, content, img";
    //             $set = "?,?,?,?,?,?";
    //             $data = array(uniqid(), $userID, $imgtitle, $cshort, $content, $upload);
    //             $trans = $d->quick_insert($set, $enter, $column, $data);
    //     } 

    // } 

    }


?>