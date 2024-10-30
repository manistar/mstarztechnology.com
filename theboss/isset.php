
 <?php 
 /// insert slider
 if(isset($_POST['add_slider'])){
     $d = new database;
	$d->getInstance()->add_slider();
}
 //////// verify user if ture then delete slider
 if(isset($_GET['sID'])){
    // database::getInstance()->verify_user($sess_id, $what_to_delete, $where_to_delete);
    if(database::getInstance()->verify_user($sess_id) == 'true'){
        $ID = $_GET['sID'];
        $where_to_delete = 'sliderID';
        $what_to_delete = 'slider';
        database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
    }
    
}

//////// verify user if ture then delete Product Upload
if(isset($_GET['userID'])){
    // database::getInstance()->verify_user($sess_id, $what_to_delete, $where_to_delete);
    if(database::getInstance()->verify_user($sess_id) == 'true'){
        $ID = $_GET['userID'];
        $where_to_delete = 'userID';
        $what_to_delete = 'products';
        database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
    }
    
}

 //////// verify user if ture then delete news
if(isset($_GET['nID'])){
    // database::getInstance()->verify_user($sess_id, $what_to_delete, $where_to_delete);
    if(database::getInstance()->verify_user($sess_id) == 'true'){
        $ID = $_GET['nID'];
        $where_to_delete = 'newsID';
        $what_to_delete = 'news';
        database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
    }
}

//// insert into news
if(isset($_POST['add_news'])){
    database::getInstance()->add_news();
}

//// insert into news
if(isset($_POST['dir'])){
    database::getInstance()->update_director();   
}


if(isset($_POST['add_dept'])){ 
    database::getInstance()->add_dept();
} 
// Update Profile
// if(isset($_POST['profile_data'])){ 
//     database::getInstance()->update_profile();
// } 

if(isset($_POST['add_con'])){ 
    database::getInstance()->add_con();
    if('yes'){
        ?>
        <script>
          setTimeout(function(){ window.location= "consultants.php"; }, 2000)
          </script>
        <?php
    }
} 

if(isset($_GET['did'])){
    $what= $_GET['what'];
    $message="You are about to delete a $what";
    $type = '';
    $url = $_GET['url'];
    $type = 'danger';
    database::getInstance()->confirm($message, $type);
    if(isset($_POST['yes'])){
      database::getInstance()->cancel();
        $ID = $_GET['did'];
        $where_to_delete = 'ID';
        $what_to_delete = $what;
       $delete = database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
       if($delete == 'yes'){
        database::getInstance()->reload($url);
       }
       
    }
}
if(isset($_POST['send_link'])){
   // echo "you are close";
    $sendlink =  database::getInstance()->sendlink();
  }

if(isset($_GET['check'])){
    $what= $_GET['what'];
    $message="You are about to deploy a $what";
    $type = '';
    $url = $_GET['url'];
    database::getInstance()->confirm($message, $type);
    if(isset($_POST['yes'])){
      database::getInstance()->cancel();
        $id = $_GET['check'];
        $where = "ID ='$id'";
        $status = 'deploy';
        $set = 'status = ?';
        $data = array($status);
        $delete = database::getInstance()->update($what, $set, $where, $data);
        if($delete == 'yes'){ 
       database::getInstance()->reload($url);
       }
       
    }
}

if(isset($_GET['uncheck'])){
    $what= $_GET['what'];
    $message="You are about to remove $what from website";
    $type = '';
    $url = $_GET['url'];
    $type = 'danger';
    database::getInstance()->confirm($message, $type);
    if(isset($_POST['yes'])){
      database::getInstance()->cancel();
        $id = $_GET['uncheck'];
        $where = "ID ='$id'";
        $status = '';
        $set = 'status = ?';
        $data = array($status);
        $delete = database::getInstance()->update($what, $set, $where, $data);
        if($delete == 'yes'){
            database::getInstance()->reload($url);
       }
       
    }
}

if(isset($_GET['detailsid'])){
    $id = $_GET['detailsid'];
    // $id = database::escape_value($data);
    $dep= database::getInstance()->fastgetwhere($what_to_get="department",$where="ID=?", $what="$id",$limit="LIMIT 1", $status="details");
}
if(isset($_GET['link'])){
    $id = $_GET['link'];
  return  $dep = database::getInstance()->fastgetwhere($what_to_get="department",$where="ID=?", $what="$id",$limit="LIMIT 1", $status="details");
}
if(isset($_POST['update_dept'])){
    database::getInstance()->update_dept();
    if('yes'){
        ?>
        <script>
          setTimeout(function(){ window.location= "view_departments.php"; }, 2000)
          </script>
        <?php
    }
}

if(isset($_POST['update_mydept'])){
    database::getInstance()->update_dept();
    if('yes'){
        ?>
        <script>
          setTimeout(function(){ window.location= "department.php"; }, 1000)
          </script>
        <?php
    }
}

if(isset($_GET['conid'])){
    $id = $_GET['conid'];
    // $id = database::escape_value($data);
    $dep= database::getInstance()->fastgetwhere($what_to_get="consultants",$where="ID=?", $what="$id",$limit="LIMIT 1", $status="details");
}

if(isset($_GET['condeleteid'])){
    $message='You are about to delete a consultants';
    $type = 'danger';
    database::getInstance()->confirm($message, $type);
    if(isset($_POST['yes'])){
      database::getInstance()->cancel();
        $ID = $_GET['condeleteid'];
        $where_to_delete = 'ID';
        $what_to_delete = 'consultants';
       $delete = database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
       if($delete == 'yes'){
          ?>
          <script>
          setTimeout(function(){ window.location= "consultants.php"; }, 3000)
          </script>
          <?php
       }
       
    }
}

if(isset($_POST['update_con'])){
    database::getInstance()->update_con();
    if('yes'){
        ?>
        <script>
          setTimeout(function(){ window.location= "consultants.php"; }, 2000)
          </script>
        <?php
    }
}


// Update about page below
  if(isset($_POST["update_hospital"])){
     $url = 'about_hospital';
    // $id = $_GET['pID'];
    // echo 'i am here';
    $p->add_about();
}


// if(isset($_POST['update_hospital'])){
//     $url = 'about_hospital';
//     database::getInstance()->update_about_us();
//     if('yes'){
        // database::getInstance()->reload($url);
             ?>
         <script>
        //   setTimeout(function(){ window.location= "about_leanbay.php"; }, 2000)
         </script>
        <?php
//     }
// }


?>
