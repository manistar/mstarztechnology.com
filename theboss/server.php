<?php 
$error = "";
$errorcolor = "";
$disp    = "";
$status ="";
$errors = array(); 
class Database {
    private $db;
    private static $instance;
    private $magic_quotes_active;
    private $real_escape_string_exists;
	// private constructor
    private function __construct() {
		$servername = "localhost";
		$username = "eksuthor_eksuth";
		$password = "z7cMyZ034l";
		try {
			$this->db = new PDO("mysql:host=$servername;dbname=eksuthor_eksuth", $username, $password);
			// set the PDO error mode to exception
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
			// I won't echo this message but use it to for checking if you connected to the db
			//incase you don't get an error message
			}
		catch(PDOException $e)
			{
			// echo "Connection failed: " . $e->getMessage();
            }
            
    }
        //This method must be static, and must return an instance of the object if the object
    //does not already exist.
    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }
function fastget($what_to_get, $order_by, $limit){
    try {
        $que= $this->db->prepare("SELECT * FROM $what_to_get ORDER BY $order_by Desc $limit");
        $que->execute();
        return $que;
        $que = null;
    } catch (PDOException $e) {  
    }
}
public function escape_value( $data ) {
    if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
        // undo any magic quote effects so mysql_real_escape_string can do the work
        if( $this->magic_quotes_active ) { $data = stripslashes( $data ); }
        $data = mysql_real_escape_string( $data );
    } else { // before PHP v4.3.0
        // if magic quotes aren't already on then add slashes manually
        if( !$this->magic_quotes_active ) { $data = addslashes( $data ); }
        // if magic quotes are active, then the slashes already exist
    }
    return $data;
}
function login(){
    $error = '';
    $email = $_POST['adminID'];
    $password = $_POST['password'];
    

        if (empty($password)) {
        $error = '<div class="alert alert-danger">
                                    <strong>Warning!</strong> Please fill in Password.
                                </div>';
        }
            if (empty($email)) {
       echo $error = '<div class="alert alert-danger">
                                    <strong>Warning!</strong> Please fill in Email.
                                </div>';
        }
        
        if($error){
            $result = $error;
            $sign = 'false';
            echo json_encode(array("value" => $sign, "value2" => $result));
    
        }else{
            echo database::getInstance()->admin_login($email,$password);
        }
    }

    function dept_login(){
        $error = '';
        $email = $_POST['email'];
        $password = $_POST['password'];
        
    
            if (empty($password)) {
            echo '<div class="alert alert-danger">
                                        <strong>Warning!</strong> Please fill in Password.
                                    </div>';
            }
                if (empty($email)) {
           echo $error = '<div class="alert alert-danger">
                                        <strong>Warning!</strong> Please fill in Email.
                                    </div>';
            }
            
            if($error){
               
        
            }else{
                echo database::getInstance()->department_login($email,$password);
            }
        }
    
    
    function department_create_password(){
        $error = '';
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $email =   $_SESSION['department_create_password_email'];
        
    
            if (empty($password)) {
          echo   $error = '<div class="alert alert-danger">
                                        <strong>Warning!</strong> Please fill in Password.
                                    </div>';
            }
                if (empty($cpassword)) {
           echo $error = '<div class="alert alert-danger">
                                        <strong>Warning!</strong> Please Confirm Password.
                                    </div>';
            } elseif ($password != $cpassword) {
              echo  $error = "<div class='alert alert-danger'>
                                            <strong>Warning!</strong> Password don't match.
                                        </div>";
                }
            
            if($error){
                $result = $error;
                $sign = 'false';
                
        
            }else{
               
                echo database::getInstance()->create_password($email,$password);
            }
    }
///////////////////////////////////////////////////////////////
////////////////// APPOINTMENT ////////////////////////////////
function appointment(){

    $name = database::escape_value($_POST['name']);
    $email =  database::escape_value($_POST['email']);
    $mobile = database::escape_value($_POST['phone']);
    $message = database::escape_value($_POST['message']);
    $date = database::escape_value($_POST['date']);
    $time = database::escape_value($_POST['time']);
    if(isset($_POST['department'])){
        $department = database::escape_value($_POST['department']);
    }else{
        $department = 'ICT';
    }
    
    $namearray = database::getInstance()->fastgetwhere($what_to_get="appointments",$where="name=?", $what="$name",$limit=";");
    $emailarray = database::getInstance()->fastgetwhere($what_to_get="appointments",$where="email=?", $what="$email",$limit=";");
    $mobilearray = database::getInstance()->fastgetwhere($what_to_get="appointments",$where="phone=?", $what="$mobile",$limit=";");
    if($namearray > 0 || $emailarray > 0 || $mobilearray > 0){
        echo    database::getInstance()-> errorapp( $email, $email, $mobile);
         //echo 'Sorry, User exists already' ; 
    }else{
       $set = " ?, ?, ?, ?, ?, ?, ?"; 
       $enter = "appointments";
       $column = " name, email, phone,department,time,date,message"; 
       $data = array( $name, $email, $mobile,$department,$time,$date,$message); 
        echo database::getInstance()->quick_insert($set, $enter, $column, $data); 
    }
} 

////////////////////////////////////////////////////////////////////////
////////////// APPOINTMENT QUICKFIX ///////////////////////////////////

function add_slider(){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $fileName = database::getInstance()->process_image();
    if(empty($_POST['type'])){
        $type ='.';
    }else{
        $type = $_POST['type'];
    }
    $enter = "slider";
    $column = "title, body, image, type";
    $set = "?, ?, ?, ?";
    $data = array($title, $body, $fileName, $type);
    echo database::getInstance()->quick_insert($set, $enter, $column, $data);
} 
function confirm($message, $type){
    echo '<div id="modal" style="display:inline-block" class="modal modal-'.$type.'">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Warning!</h4>
        </div>
        <div class="modal-body">
          <p>'. $message .'</p>
        </div>
        <div class="modal-footer">
        <form method="POST">
        <input type="submit" name="no" onclick="close()" class="btn btn-outline pull-left" Value="Close">
        <input type="submit" name="yes" class="btn btn-outline"   Value="Yes I Know">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>';
}
public function cancel(){
    echo ' <script>
    x = document.getElementById("modal");
     x.style.display = "none";
          </script>';
}
public function reload($url){
    echo ' <script>
    setTimeout(function(){ window.location= "'.$url.'.php"; }, 2000)
    </script>';
}

private function process_image(){
    $upload_dir = "../upload/";
    $fileName = $_FILES['file']['name'];
    $uploaded_file = $upload_dir.$fileName; 
   $upload = move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_file); 
   if($upload){
       return $fileName;
   }
}
private function error($name){
   return '<div class="box-body">
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Alert!</h4>'. $name . 'Aleady Exist!
    </div>
  </div>'; 
}
function add_news(){
  $fileName = database::process_image();
    $title = $_POST['title'];
    $body = $_POST['body'];
    $enter = "news";
   $column = "image, title, body";
   $set = "?, ?, ?";
   $data = array($fileName, $title, $body);
    echo database::getInstance()->quick_insert($set, $enter, $column, $data);
} 
function add_dept(){
    ini_set('upload_max_filesize', '200M');
    $name = database::escape_value($_POST['name']);
    $email =  database::escape_value($_POST['email']);
    $details = database::escape_value($_POST['details']);
    $HODname =  database::escape_value($_POST['HODname']);
    $HODprofile = database::escape_value($_POST['HODprofile']);
    $fileName = database::getInstance()->process_image();
    $notarray= database::getInstance()->fastgetwhere($what_to_get="department",$where="name=?", $what="$name",$limit=";");
    $notarray2 = database::getInstance()->fastgetwhere($what_to_get="department",$where="email=?", $what="$email",$limit=";");
    if($notarray > 0 || $notarray2 > 0){
        echo    database::getInstance()->error($name);
        echo 'Hint: Check Department Name or Email' ; 
    }else{
        $id = uniqid('DEPT');
        $link = str_shuffle($id);
        $link_status = "new";
        $enter = "department";
       $column = "ID, name, email, details, HODname, HODprofile, HODpassport, Link, Link_status";
       $set = "?, ?, ?, ?, ?, ?, ?, ?, ?";  
       $data = array($id, $name, $email, $details, $HODname, $HODprofile, $fileName, $link, $link_status); 
        echo database::getInstance()->quick_insert($set, $enter, $column, $data); 
    }
} 
function add_con(){
    ini_set('upload_max_filesize', '200M');
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $fileName = database::getInstance()->process_image();
    $notarray= database::getInstance()->fastgetwhere($what_to_get="consultants",$where="name=?", $what="$name",$limit=";");
    if($notarray > 0){
        database::getInstance()->error($name);
    }else{
        $id = uniqid('CON');
        $enter = "consultants";
       $column = "ID, name, phone_number, passport";
       $set = "?, ?, ?, ?";  
       $data = array($id, $name, $phone_number, $fileName); 
        echo database::getInstance()->quick_insert($set, $enter, $column, $data); 
    }
}
function update_about(){
    ini_set('upload_max_filesize', '200M');
    $name = database::escape_value($_POST['Hosname']);
    $email =  database::escape_value($_POST['email']);
    $details = database::escape_value($_POST['details']);
    $phone_number = database::escape_value($_POST['phone_number']);
    $address =  database::escape_value($_POST['address']);
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter =$_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    $fileName = database::getInstance()->process_image();
    
    $what = 'about_hospital';
    $set = 'name = ?, address = ?, email =?, phone_number = ?, facebook = ?, instagram =?, twitter = ?, linkedin = ?, details =?, picture =?';
    $where = "ID ='1'";
    $data = array($name,$address,$email, $phone_number, $facebook,$instagram, $twitter, $linkedin, $details, $fileName); 
    $success = database::getInstance()->update($what, $set, $where, $data);
    }
    
public function update_con(){
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $id = $_POST['id'];
    if(!empty($_FILES['file']['name'])){
      $fileName =  database::getInstance()->process_image();
    }else{
        $fileName = $_POST['passport'];
    }
    $what = 'consultants';
    $set = 'name = ?, phone_number = ?, passport =?';
    $where = "ID ='$id'";
    $data = array($name, $phone_number, $fileName); 
    $success = database::getInstance()->update($what, $set, $where, $data);
    if($success){
        return 'yes';
    }
}

public function update_post($id){
    $title = database::escape_value($_POST['title']);
    $details = database::escape_value($_POST['body']);
    $fileName = $_FILES['file']['name'];
    if(isset($fileName)){
        database::getInstance()->process_image();
    }else{
        $fileName = $_POST['filename'];
    }
    $what = 'blog_post';
    $set = 'title = ?, details = ?, image = ?';
    $where = "ID ='$id'";
    $data = array($title, $details, $fileName);
    echo database::getInstance()->update($what, $set, $where, $data);
}
public function update_dept(){
    $name = $_POST['name'];
    $id = $_POST['id'];
    $details = $_POST['details'];
    $HODname = $_POST['HODname'];
    $email = $_POST['email'];
    $HODprofile = $_POST['HODprofile'];
    if(!empty($_FILES['file']['name'])){
      $fileName =  database::getInstance()->process_image();
    }else{
        $fileName = $_POST['HODpassport'];
    }
    $what = 'department';
    $set = 'name = ?, email = ?, details =?, HODname = ?, HODprofile = ?, HODpassport = ?';
    $where = "ID ='$id'";
    $data = array($name, $email, $details, $HODname, $HODprofile, $fileName); 
    echo $success = database::getInstance()->update($what, $set, $where, $data);
    if($success){
        return 'yes';
    }
}
function update_cmd(){
    $name = $_POST['name'];
    $title = $_POST['title'];
    $details = $_POST['details'];
    $fileName = $_FILES['file']['name'];
    if(empty($fileName)){
        $fileName = $_POST['image'];
    }else{
        $fileName = database::process_image(); 
    }
   echo database::getInstance()->update_cmd2($name, $title, $details, $fileName);
}
private function quick_insert($set, $enter, $column, $data){
    $stmt = $this->db->prepare("INSERT INTO $enter($column) 
    VALUES ($set)");
   $stmt->execute($data);
     if($stmt){
        echo $error = '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
       '; echo $enter; echo ' Added Successfully.
      </div>';
    //   $_SESSION['deptID'] = $id;
    return 'yes';
     }
}
public function verify_user($sess_id){
    $stmt= $this->db->prepare("SELECT * FROM admin WHERE adminID= ? LIMIT 1"); //using LIMIt fro optimization purpose
    $stmt->execute([$sess_id]);
        $count = $stmt->rowCount();
        if($count == 1){
            return 'true';
        }else{
            echo $error = '<div class="alert alert-danger">
            <strong>Warning!</strong> Access Declined.
        </div>'; 
        }
}
public function fastgetwhere($what_to_get, $where, $what, $status){
    $stmt= $this->db->prepare("SELECT * FROM $what_to_get WHERE $where "); //using LIMIt fro optimization purpose
    $stmt->execute([$what]);
    if($status = 'details'){
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }else{
        return $count = $stmt->rowCount();
        
    }
     
}
public function delete($where_to_delete, $what_to_delete, $ID){
    $stmt= $this->db->prepare("delete FROM $what_to_delete WHERE $where_to_delete= ? LIMIT 1"); //using LIMIt fro optimization purpose
    // include_once("include/session.php");
    $stmt->execute([$ID]);
  if($stmt){
    echo $error = '<div class="box-body">
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Alert!</h4>';
     echo $what_to_delete; echo 'Deleted!
    </div>
  </div>';
  return 'yes';
  }
}
public function admin_details($adminID){
    $stmt= $this->db->prepare("SELECT * FROM admin WHERE adminID= ? LIMIT 1"); //using LIMIt fro optimization purpose
    // include_once("include/session.php");
    $stmt->execute([$adminID]);
   return $stmt->fetch(PDO::FETCH_ASSOC);
}
													
public function admin_login($email,$password){
    $stmt= $this->db->prepare("SELECT * FROM admin WHERE adminID= ? LIMIT 1"); //using LIMIt fro optimization purpose
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    if($count == 1){
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $realpassword = $row['password'];
        $user_id = $row['adminID'];
        if(password_verify($password, $realpassword)){
            session_unset();
            session_start();
            $_SESSION['AdminSession'] = $user_id;
            echo "<script language=\"Javascript\" type=\"text/javascript\">
window.location=\"index.php\";
</script>";
            
        } else{
          
            $errorcolor = 'red';
         echo   $error = '<div class="alert alert-danger">
            <strong>Warning!</strong> Password Incorrect.
        </div>';
        }
    $stmt = null;
}else{
    echo   $error = '<div class="alert alert-danger">
    <strong>Warning!</strong> User not exist.
</div>';
}
}
public function department_login($email,$password){
    $stmt= $this->db->prepare("SELECT * FROM department WHERE email= ? LIMIT 1"); //using LIMIt fro optimization purpose
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    if($count == 1){
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $realpassword = $row['password'];
        if(password_verify($password, $realpassword)){
            session_unset();
            session_start();
            $_SESSION['EKSUTHdepartmentsession'] = $email;
            echo "<script language=\"Javascript\" type=\"text/javascript\">
window.location=\"department.php\";
</script>";
            
        } else{
          
            $errorcolor = 'red';
         echo   $error = '<div class="alert alert-danger">
            <strong>Warning!</strong> Password Incorrect.
        </div>';
        }
    $stmt = null;
}else{
    echo   $error = '<div class="alert alert-danger">
    <strong>Warning!</strong> Department not exist.
</div>';
}
}

public function change_department_password(){
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if(empty($password || $cpassword)){
        echo '<div class="alert alert-danger">
        <strong>Warning!</strong> Please fill all filed
    </div>';
    }elseif($password != $cpassword){
        echo "<div class='alert alert-danger'>
        <strong>Warning!</strong> Password don't match.
    </div>";
    }else{
        $email = $_SESSION['EKSUTHdepartmentsession'];
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $what = 'department';
        $set = 'password = ?';
        $where = "email ='$email'";
        $data = array($passwordhash); 
        $success = database::getInstance()->update($what, $set, $where, $data);
        if($success){
            echo '  <script>
            setTimeout(function(){ window.location= "department.php"; }, 2000)
            </script>';
        }
    }
   
}

function create_password($email, $password){
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);
    $what = 'department';
    $link_status = 'used';
    $set = 'link_status = ?, password = ?';
    $where = "email ='$email'";
    $data = array($link_status, $passwordhash); 
    $success = database::getInstance()->update($what, $set, $where, $data);
    if($success){
        session_unset();
        $_SESSION['EKSUTHdepartmentsession'] = $email;
        echo "<script language=\"Javascript\" type=\"text/javascript\">
        window.location=\"department.php\";
        </script>";
    }
}

public function update_cmd2($name,$title,$details,$fileName){
    try {
    $stmt = $this->db->prepare("UPDATE cmd SET name = ?, title=?, details = ?, image = ? WHERE ID = 1");
    $stmt->execute([$name,$title,$details,$fileName]);
    $success =  '<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
  CMD Details Updated.
  </div>';
    return $success;
    $stmt = null;
    } catch (PDOException $e) {
        // For handling error
        echo '<div class="alert alert-danger">
                <strong>Error!</strong> CMD Details not updated
              </div>: ' . $e->getMessage();
    }
    
}

public function update($what, $set, $where, $data){
    try {
        $stmt = $this->db->prepare("UPDATE $what SET $set WHERE $where");
        $stmt->execute($data);
        if($stmt){
            echo '<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
          Details Updated.
          </div>';
          return 'yes';
        }
        $stmt = null;
        } catch (PDOException $e) {
            // For handling error
            echo '<div class="alert alert-danger">
                    <strong>Error!</strong>  Details not updated
                  </div>: ' . $e->getMessage();
        }
    }
}
?>