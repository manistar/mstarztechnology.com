<?php 
class Database{
    public $db;
    private static $instance;
    private $magic_quotes_active;
    private $real_escape_string_exists;
    public $err = "no";
    public $userID;
	// private constructor
    public function __construct() {
        // $this->d = new database;
		$servername = "localhost";
        $username = "windhcoz_mstarztech_user";
		$password = "@4CQV7vO0V,E";
		try {
			$this->db = new PDO("mysql:host=$servername;dbname=mstarztech_db", $username, $password);
			// set the PDO error mode to exception
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
			// I won't echo this message but use it to for checking if you connected to the db
			//incase you don't get an error message
			}
		catch(PDOException $e)
			{
			 echo "Connection failed: " . $e->getMessage();
            }     
            // $this->userID = htmlspecialchars($_SESSION['adminSession']);  
    }

    function userID(){
            return  $this->userID = htmlspecialchars($_SESSION['adminSession']);  
    }
    function array_insert(&$array, $position, $insert, $name = ""){
        if (is_int($position)) {
            array_splice($array, $position, 0, $insert);
        } else {
            $pos   = array_search($position, array_keys($array));
            $array = array_merge(
                array_slice($array, 0, $pos),
                $insert,
                array_slice($array, $pos)
            );
        }
    }

    function radmomstring($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    function checkmessage($arry){
        foreach ($arry as $key) {
            $check = substr($key, -5);
            if($check == "_null"){
                $key = substr_replace($key, "", -5);
            }
            $key = str_replace(" ", "_", $key);
            if($check != "_null"){
                if($_POST["$key"] == "" || !isset($_POST["$key"]) && $key != "referral_code"){
                    $this->err = "yes";
                    database::message("Please enter your $key", "error");   
                }else{
                     $set["$key"] = ${$key} = htmlspecialchars($_POST["$key"]);
                }
            }else{
                $set["$key"] = ${$key} = htmlspecialchars($_POST["$key"]);
            }
            
        }
        if(isset($set['password'])){
            if(isset($set['confirm_password'])){
                $check = database::checkpass($set['password'], $set['confirm_password']);
                if($check){
                    return $set;
                }else{
                    $this->err = "yes";
                }
            }else{
                $this->err = "yes";
                database::message("IntErr: We can't confirm your password", "error");
            }
        }elseif($this->err != "yes"){
            return $set;
        }else{
            return $this->err;
        }
    }

    private function checkpass($password, $cpass){
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        // $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 4) {
            database::message("Password should be at least 4 characters in length and should include at least one upper case letter and one number.", "error");
            return false;
        }else{
           if($password == $cpass){
               return true;
           }else{
               database::message("Password don't match. Check and try again", "error");
               return false;
           }
        }
    }

    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }



    protected function quick_insert($enter, $column, $data, $message = "0"){
        $column2 = "";
        foreach($data as $key => $value){
            $sets[] = "?,";
            $column2 .= $column.$key.", ";
           }
         $set = substr(implode(" ", $sets), 0, -1);
         if($column == ""){
            $column = mb_substr($column2, 0, -2);
         }
        $stmt = $this->db->prepare("INSERT INTO $enter($column) 
        VALUES ($set)");
        $data = array_values($data);
       $stmt->execute($data);
         if($stmt){
             if($message != "0"){
                Database::message($message, $type= 'success');
             }
        return true;
         }else{
            $message = 'Something Went Wrong please try again'; 
            Database::message($message, $type= 'error');
         }
    }

    function smtpmailer($to, $from_name, $subject, $body, $message = '')
    {
        // echo $body;
        $from = "automessage@mustardseedmicrofinance.com.ng";
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'mail.mustardseedmicrofinance.com.ng';
        $mail->Port = 465;
        $mail->Username = $from;
        $mail->Password = '7Td5udZS1)[Wu8';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From = $from;
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            // $error ="Please try Later, Error Occured while Processing...";
            database::message("Please try Later, Error Occured while Processing...", "error");
            return false;
        }
        else 
        {
            if($message != ''){
                database::message("$message", "success");
            }
            // $error = "Thanks You !! Your email is sent.";  
            return true;
        }
    }

    public function delete($where_to_delete, $what_to_delete, $ID, $message = "yes"){
        $stmt= $this->db->prepare("delete FROM $what_to_delete WHERE $where_to_delete= ? LIMIT 1"); //using LIMIt fro optimization purpose
        // include_once("include/session.php");
        $stmt->execute([$ID]);
      if($stmt){
          if($message == "no"){
              
          }else{
            $message = $what_to_delete.'Deleted';
            Database::message($message, $type= 'success');
          }
          return true;
      }else{
        $message = $what_to_delete.'not deleted';
        Database::message($message, $type= 'error');
      }
    }

    function fastget($what_to_get, $order_by, $limit){
        try {
            $que= $this->db->prepare("SELECT * FROM $what_to_get ORDER BY $order_by $limit");
            $que->execute();
            $count = $que->rowCount();
            if($count < 1){
                return $count;
            }else{
                return $que;
                $que = null;
            }
        } catch (PDOException $e) {  
            
        }
    }

    function getmaxprice(){
        try{
            $que= $this->db->prepare("SELECT max(price) as maxprice FROM products");
            $que->execute();
            return $que->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){

        }
    }
    
    

    function searchlocation($value){
        $que = $this->db->prepare("SELECT *
        from states
        where name like '%$value%' 
        union all
        select id, name, state_id
        from cities
        where name like '%$value%'");
        $que->execute();
        return $que;
    }

    function getlocation(){
        try {
            $que= $this->db->prepare("SELECT id, ( 3959 * acos( cos( radians(37) ) * cos( radians( lat ) ) 
            * cos( radians( lng ) - radians(-122) ) + sin( radians(37) ) * sin(radians(lat)) ) ) AS distance 
            FROM markers 
            HAVING distance < 1000
            ORDER BY distance 
            LIMIT 0 , 20");
            $que->execute();
            $count = $que->rowCount();
          
                return $que;
                $que = null;
        
        } catch (PDOException $e) {  
            
        }
    }

    function fastgetcount($what_to_get, $order_by, $limit){
        try {
            $que= $this->db->prepare("SELECT * FROM $what_to_get ORDER BY $order_by ASC $limit");
            $que->execute();
            return $que->rowCount();
        } catch (PDOException $e) {  
            
        }
    }

    
    public function fastgetwhere($what_to_get, $where, $what, $status){
        $stmt= $this->db->prepare("SELECT * FROM $what_to_get WHERE $where"); //using LIMIt fro optimization purpose
        $stmt->execute([$what]);
        return database::getmethod($status, $stmt);
    }

    public function getchat($sender, $reciver, $status="moredetails"){
        $stmt =  $this->db->prepare("SELECT * FROM chat LEFT JOIN users ON users.ID = chat.receiverID
        WHERE (senderID = ? AND receiverID = ?)
        OR (senderID = ? AND receiverID = ?) ORDER BY date_sent");
        $stmt->execute([$sender, $reciver, $reciver, $sender]);
        return database::getmethod($status, $stmt);
    }

    function getmethod($status, $stmt){
        if($status == 'details'){
            $count = $stmt->rowCount();
            if($count < 1){
                return "";
                
            }else{
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }elseif($status == 'moredetails'){
            $count = $stmt->rowCount();
            if($count < 1){
                // echo "yess";
                return "";
            }else{
                return $stmt;
            }
        }else{
            return $count = $stmt->rowCount();
            
        }
    }

    public function multiplegetwhere($what, $where, $data, $status){
        $stmt= $this->db->prepare("SELECT * FROM $what WHERE $where"); //using LIMIt fro optimization purpose
        $stmt->execute($data);
        return database::getmethod($status, $stmt);
}

public function getnumber($data){
    if($data != ""){
        if(is_array($data)){
            return count($data);
        }else{
            return $data->rowCount();
        }
    }else{
        return 0;
    }
}

public function total($data){
    $total = 0;
    if(empty($data)){

    }else{
        foreach($data as $row){
            if(isset($row['amount_applied_for'])){
                $total += $row['amount_applied_for'];
            }elseif(isset($row['amount_paid'])){
                $total += $row['amount_paid'];
            }else{
                $total += $row['amount'];
            }
        }
    }
    return $total;
}


function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
} 

function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 

function time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return  $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

function displayDates($date1, $date2, $format = 'mm/dd/yyyy' ) {
    $dates = array();
    $current = strtotime($date1);
    $date2 = strtotime($date2);
    $stepVal = '+1 day';
    while( $current <= $date2 ) {
       $dates[] = date($format, $current);
       $current = strtotime($stepVal, $current);
    }
    return $dates;
 }

 function addupdate($no, $date, $format = 'Y-m-d'){
     $no = (int)$no;
    $date = strtotime("+$no day", strtotime($date));
    return date($format, $date);
 }
 function getDatesFromRange($start, $end, $format = 'Y-m-d') {
    $array = array();
    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    foreach($period as $date) { 
        $array[] = $date->format($format); 
    }

    return $array;
}

    function getWeekDays($start, $end, $weekday)
{
    $start = strtotime($start);
    $end = strtotime($end);

    $weekdays = array();

    while (date("w", $start) != $weekday) {
        $start += 86400;
    }

    while ($start <= $end)
    {
        $weekdays[] = date('Y-m-d', $start);
        $start += 604800;
    }

    return($weekdays);
}

function getpercentage($myNumber, $percentToGet) {

//Convert our percentage value into a decimal.
$percentInDecimal = $percentToGet / 100;

//Get the result.
$percent = $percentInDecimal * $myNumber;
return $percent;
}


function cleanStr($string){
    // Replaces all spaces with hyphens.
    $string = str_replace(' ', '-', $string);

    // Removes special chars.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    // Replaces multiple hyphens with single one.
    $string = preg_replace('/-+/', '', $string);
    
    return $string;
}

function datecorrect($value){
    switch ($value) {
        case 'daliy':
                return "day";
            break;
            case 'weekly':
                return "week";
            break;
            case 'monthly':
                return "month";
            break;
        
        default:
            # code...
            break;
    }
}

   protected function process_image($title, $path, $name = "uploaded_file", $i = 0)
    {
        //file to place within the server
        if ($_FILES["$name"]["name"] == "") {
            return null;
        }

        if($i == 0 && $name != "uploaded_file"){
            $image = $_FILES["$name"]["name"]; //input file name in this code is file1
            $size = $_FILES["$name"]["size"];
            $tmp = $_FILES["$name"]["tmp_name"];
        }else{
            $image = $_FILES["$name"]["name"][$i]; //input file name in this code is file1
            $size = $_FILES["$name"]["size"][$i];
            $tmp = $_FILES["$name"]["tmp_name"][$i];
        }
        

        $valid_formats1 = array("JPG", "jpg", "png", "jpeg", "JPEG", "PNG"); //list of file extention to be accepted
        if (empty($image)) {
            database::message("No file selected", "error");
            return false;
        }
        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

            if ($size < 3500000) {
                $fileInfo = pathinfo($image);
                $ext = $fileInfo['extension'];

                if (in_array($ext, $valid_formats1)) {
                    if ($path == "check") {
                        return true;
                    }
                    $titlename = str_replace(" ", "_", $title);
                    $actual_image_name =  $titlename . "." . $ext;

                    if (move_uploaded_file($tmp, $path . $actual_image_name)) {
                        return $actual_image_name;
                    } else {
                        database::message($message = '<b>' . $image . ': Image Not Uploaded Try again', $type = 'error');
                        return false;
                    }
                } else {

                    database::message($message = '<b>' . $image . ':</b> Image file Not Support. We support: ' . implode(" ", $valid_formats1), $type = 'error');
                    return false;
                }
            } else {
                database::message("<b>$image</b>: Image too large. Make sure your image size is not above 3MB", "error");
                return false;
            }
        }
    }
    
protected function imageupload($name){
    //Сheck that we have a file
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
    //Check if the file is JPEG image and it's size is less than 350Kb
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = substr($filename, strrpos($filename, '.') + 1);
    if (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") && 
      ($_FILES["uploaded_file"]["size"] < 350000)) {
      //Determine the path to which we want to save this file
      $name = $name.'.'.$ext;
        $newname = 'upload/'.$name;
        //Check if the file with the same name is already exists on the server
        // if (!file_exists($newname)) {
          //Attempt to move the uploaded file to it's new place
          if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
            //  database::message("Passport Uploaded Successfully", "success");
             return $name;
          } else {
             database::message("Error: A problem occurred during Passport upload!", "error");
             return false;
          }
        // } else {
        //    echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
        // }
    } else {
       database::message("Error: Only .jpg images under 350Kb are accepted for upload", "error");
       return false;
    }
  } else {
   database::message("Error: No image uploaded", "error");
   return false;
  }
}



   function colorpick($pec){
       if($pec < 30 || $pec == 30){
           return "primary";
       }elseif($pec > 31 && $pec < 80){
           return "warning";
       }else{
           return "success";
       }
   }

   public function update($what, $set, $where, $data, $message = ""){
    try {
        // $set = str_replace(",", " = ?", $set).' = ?';
        if($set == "null" || $set == ""){
            foreach($data as $key => $value){
                $sets[] = "$key = ?,";
               }
              $set = substr(implode(" ", $sets), 0, -1);
        }
         $set;
         $stmt = $this->db->prepare("UPDATE $what SET $set WHERE $where");
        $data = array_values($data);
         $stmt->execute($data);
        if($stmt){
            if($message != ""){
              Database::message($message, "success");
            }
          return true;
        }
        $stmt = null;
        } catch (PDOException $e) {
            // For handling error
            return false;
            //   Database::message("Something went wrong $e", "error");
        }
    }


    // protected function warning(){

    // }


    protected function tokengen(){
        $token =  openssl_random_pseudo_bytes(19);
        return $token = bin2hex($token);
    }

    protected function updateadmintoken($id, $name){
        $d = new database;
        $token = $d->tokengen();
        $where = "ID ='$id'";
       $update = $d->update("$name", "", $where, ["token"=>"$token"]);   
       if($update){
          // session_start();
           $_SESSION['usertoken'] = $token;
        return $token;
       }else{
           return "";
       }
       
    }

    public function verifytoken($id, $name){
        $d = new database;
        $verify = $d->fastgetwhere("$name", "ID = ?", $id, "details");
        if(is_array($verify) && isset($_SESSION['usertoken'])){
            $token = $verify['token'];
            if($token == htmlspecialchars($_SESSION['usertoken'])){
                $update = $d->updateadmintoken($id, $name);
                if($update != ""){
                    return true;
                } 
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function verifyrole($id, $role){
        $d = new database;
        $verify = $d->fastgetwhere("admins", "ID = ?", $id, "details");    
        if($verify['type'] == "admin"){
            return true;
        }else{
            $verify = $d->multiplegetwhere("roles", "userID = ? and therole = ?", ["$id","$role"], ""); 
            if($verify > 0){
                return true;
            }else{
                return false;
            }
        }
    }

     function verifyassign($adminid, $customerid){
            $d = new database; 
            $verify = $d->fastgetwhere("admins", "ID = ?", $adminid, "details");    
            if($verify['type'] == "admin"){
                return true;
            }else{
                $verify = $d->multiplegetwhere("people_assign", "adminID = ? and userID = ?", ["$adminid","$customerid"], ""); 
                if($verify > 0){
                    return true;
                }else{
                    return false;
                }
            }
    }

    // function v

    public function message($message, $type){
    if($type == "error"){
        $type = "danger";
    }elseif($type == "success"){
        $type = "success";
    }
    $message = str_replace("_", " ", $message);
//     echo "<div class='bg-$type fade show mb-5' role='bg'>
//     <!--  <div class='bg-icon'><i class='flaticon-$type'></i></div> -->
//     <div class='bg-text'>$message</div>
// </div>";

echo "<div class='message $type'>
<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
$message
</div>";
}

protected function movefiles($domain){
    $structure = "../$domain";
    if(!is_dir($structure)){
        mkdir($structure);
    }
        $dst = $structure;
        $src = "../project";
      return  $custom_copy = database::custom_copy($src, $dst);
    }


   private function custom_copy($src, $dst) { 
  
        // open the source directory
        $dir = opendir($src); 
      
        // Make the destination directory if not exist
        @mkdir($dst); 
      
        // Loop through the files in source directory
        while( $file = readdir($dir) ) { 
      
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) 
                { 
      
                    // Recursively calling custom copy function
                    // for sub directory 
                    database::custom_copy($src . '/' . $file, $dst . '/' . $file); 
                } 
                else { 
                    //  "Creating ".$src . '/' . $file, $dst . '/' . $file;
                    copy($src . '/' . $file, $dst . '/' . $file); 
                } 
            } 
        } 
        return true;
        closedir($dir);
    }


    // special features


    function getaddress($data){
        $address = "";
        if(is_array($data)){
            foreach ($data as $key => $value) {
               $c = database::fastgetwhere($key, "ID = ?", $value, "details");
                if(is_array($c)){
                    $address .= $c['name']." ";
                }
            }
        }else{
            $address = "No adderess";
        }
        return $address;
    }

    function geturl(){
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                $url = "https://";   
        else  
                $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
        
        // Append the requested resource location to the URL   
        $url.= $_SERVER['REQUEST_URI'];    
            
        return $url;  
    }

    function gettrialamount(){
        $data = database::fastgetwhere("settings", "meta_name = ?", "free_trial", "details");
        return $data['meta_value'];
    }
    function getusername($id){
        $data = database::fastgetwhere("customers", "ID = ?", $id, "details");
        if(is_array($data)){
            return $data['first_name'].' '.$data['last_name'];
        }else{
            $data = database::fastgetwhere("grouped", "ID = ?", $id, "details");
            if(is_array($data)){
                return $data['group_name'];
            }else{
                return "Not found";
            }
        }
        
    }

    function getadminname($id){
        $data = database::fastgetwhere("admins", "ID = ?", $id, "details");
        if(is_array($data)){
            return $data['first_name'].' '.$data['last_name'];
        }else{
            return "Nill";
        }
        
    }

    function cooperativetotal($id){
        $data = database::multiplegetwhere("tasks", "payID = ? and status = ?", [$id, "1"], "moredetails");
        if(!empty($data)){
           return customers::gettotalamount($data);
        }else{
            return 0;
        }
    }

    function gettotalamount($data){
        $amount = 0;
        if(!empty($data)){
            foreach($data as $row){
                if($row['status'] == 1){
                    if($row['amount_applied_for']){
                        $amount += $row['amount_applied_for'];
                    }else{
                        $amount += $row['amount'];
                    }
                }
            }
        }
        return $amount;
    }

    function moneyintrest($amount, $int){
        $l = substr($int, -1);
        if($l = "%"){
            $int = substr($int, 0, -1);
           return  database::getpercentage($amount, $int);
        }else{
            return $int;
        }
    }

    function norow($data){
        if(!empty($data)){
            $i = 0;
            $hold = $data;
            foreach($data as $row){
                $i++;
            }
            return [$hold, $i];
        }else{
            return 0;
        }
    }     

    function getbalance($id, $what){
        $d = new database;
        $amountpaid = 0;
        $amountwith = 0;
        $data = $d->fastgetwhere("$what", "ID = ?", $id, "details");
        if(is_array($data)){
            $task = $d->multiplegetwhere("tasks", "payID = ? and status = ?", [$id, "1"], "moredetails");
            if(!empty($task)){
                foreach($task as $row){
                    $amountpaid += $row['amount_paid'];
                }
                $amountpaid = $amountpaid - $d->moneyintrest($amountpaid, $data['interest']);
                $withdraw = $d->fastgetwhere("withdraw", "withformID = ?", $id, "moredetails");
                
                if(!empty($withdraw)){
                    foreach($withdraw as $row){
                        $amountwith += $row['amount'];
                    } 
                    $amountpaid = $amountpaid - $amountwith;
                }
              return $amountpaid;
            }else{
                return $amountpaid;
            }
        }

    }
}
?>