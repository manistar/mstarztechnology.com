<?php
// MSTARZ TECH SECTION

// home-control
if(isset($_POST['add_home-control'])){
  $p->update_home_control();
}

if(isset($_POST['add_what_to'])){
 $p->what_i_do();
}

if(isset($_POST['add_portfolio'])){
  $p->portfolios();
 }

 if(isset($_POST['add_Testimonial'])){
  $p->testimonialz();
 }

 if(isset($_POST['add_edu'])){
  $p->education();
 }

 if(isset($_POST['add_job'])){
  $p->job_exp();
 }

if(isset($_POST['add_Blog'])){
  $p->blog();
 }

//  Update Section

if(isset($_POST['update_what_to'])){
  $id = $_GET['pID'];
  $p->update_what_i_do($id);   
}

if(isset($_POST['update_portfolios'])){
  $id = $_GET['pID'];
  $p->update_porfolio($id);   
}

if(isset($_POST['updates_educa'])){
  $id = $_GET['pID'];
  $p->update_edu($id);   
}

if(isset($_POST['update_job_ex'])){
    // echo "i am here";
  $id = $_GET['pID'];
  $p->updated_jobs($id);   
}

if(isset($_POST['update_testimonials'])){
  $id = $_GET['pID'];
  $p->update_testimonial($id);   
}

if(isset($_POST['update_blogging'])){
  $id = $_GET['pID'];
  $p->update_bloggers($id);   
}

// End Secction for Mstarz Tech Isset


//   App Upload
// $d = new database;
// $p = new product;
  if(isset($_POST["upload_apps"])){
    //   echo "i am working";
    $p->process_file();
}

// Update app bellow 149 function proserver
  if(isset($_POST["update_apps"])){
    //   echo "i am working";
    $id = $_GET['pID'];
    $p->update_app_editor($id);
}

// Update about page below
  if(isset($_POST["upload_about"])){
      echo "I got here";
    $p->update_about();
}
 


// Add FAQ utility below
if(isset($_POST["add_faq"])){
  $p->process_faq();
}

// Add FAQ Database below
if(isset($_POST["add_faq-data"])){
  $p->process_faq_data();
}

// Profile Update
if(isset($_POST['profile_data'])){
    $p->update_profile($adminID);   
}

 
// Profile Update
if(isset($_POST['update_article'])){
    $id = $_GET['pID'];
    $p->update_blog($id);   
}

// Edit Pdf
if(isset($_POST['edit_pdf'])){
    $id = $_GET['pID'];
    $p->update_pdf($id);   
}

// Edit Video
if(isset($_POST['edit_video'])){
    $id = $_GET['pID'];
    $p->updat_video($id);   
}

// Change Password
if(isset($_POST['changepass'])){
    $p->change_password($adminID);   
}

// Windsor Part Section
if(isset($_POST['add_Landscape'])){
  $p->part_ads_slider();
}

if(isset($_POST['add_wheel'])){
  $p->part_slide_wheel();
}

if(isset($_POST['add_cars'])){
  $p->caz_ads_slider();
}

if(isset($_POST['add_banner'])){
  $p->banner_ads_slider();
}

if(isset($_POST['add_YouTube'])){
  $p->YouTube_ads();
}

// if(isset($_POST['add_Testimonial'])){
//   $p->testimonials();
// }

if(isset($_POST['add_Blog'])){
  $p->blog();
}


if(isset($_POST['add_vehicle'])){
  $p->vechicle_model();
}



// Articles
$d = new database;
$p = new product;
  if(isset($_POST["blogpost"])){
    $p->add_blog();
}
if(isset($_POST["q"])){
  $p->v_search();
}
if(isset($_POST["add_pdf"])){
  $p->process_pdf();
}

if(isset($_POST["add_video"])){
  // echo "welcome";
  $p->process_video();
}
if(isset($_POST["add_dwg"])){
  // echo "welcome";
  $p->process_dwg();
}

$d = new database;
$p = new product;
if(isset($_POST["add_excel"])){
  // echo "welcome";
  $p->upload_spreedsheets();
}

if(isset($_POST["add_doc"])){
  // echo "welcome";
  $p->process_doc();
}
//////// verify user if true then delete Product Upload
if(isset($_GET['sID'])){
    if(database::getInstance()->verify_user($sess_id) == 'true'){
        $ID = $_GET['sID'];
        $where_to_delete = 'userID';
        $what_to_delete = 'products';
        database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
    }
    
}

//////// verify user if true then delete Articles
if(isset($_GET['uID'])){
  if(database::getInstance()->verify_user($sess_id) == 'true'){
      $ID = $_GET['uID'];
      $where_to_delete = 'userID';
      $what_to_delete = 'blog';
      database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
  }
}

// Delete Video
//////// verify user if true then delete Video
if(isset($_GET['vID'])){
  if(database::getInstance()->verify_user($sess_id) == 'true'){
      $ID = $_GET['vID'];
      $where_to_delete = 'userID';
      $what_to_delete = 'products';
      database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
  }
}

// Delete Doc
//////// verify user if true then delete Doc
if(isset($_GET['ddID'])){
  if(database::getInstance()->verify_user($sess_id) == 'true'){
      $ID = $_GET['ddID'];
      $where_to_delete = 'userID';
      $what_to_delete = 'products';
      database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
  }
}

// Delete Dwg
//////// verify user if true then delete Dwg
if(isset($_GET['dID'])){
  if(database::getInstance()->verify_user($sess_id) == 'true'){
      $ID = $_GET['dID'];
      $where_to_delete = 'userID';
      $what_to_delete = 'products';
      database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
  }
}

//////// verify user if true then delete Articles
if(isset($_GET['rID'])){
  if(database::getInstance()->verify_user($sess_id) == 'true'){
      $ID = $_GET['rID'];
      $where_to_delete = 'userID';
      $what_to_delete = 'products';
      database::getInstance()->delete($where_to_delete, $what_to_delete, $ID);
  }
}
?>