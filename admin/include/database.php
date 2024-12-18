<?php
// $2y$10$zaHI56uHbjpe0xfZdAVVZO4gruUDPE/NZmIGc3s3iX78e5/vZtTYe
class database
{
    public $db;
    private $index;
    private $marks;
    private $data;
    public $err = "no";
    public $userID;
    // private constructor
    public function __construct()
    {
        // $this->d = new database;
        $servername = "localhost";
        $username   = "root";
        $password   = ""; //sJjJzBeJx2Qx
        try {
            $this->db = new PDO("mysql:host=$servername;dbname=" . 'tech_dashboard', $username, $password);
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";php
            // I won't echo this message but use it to for checking if you connected to the db
            //incase you don't get an error message
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        // $this->userID = htmlspecialchars($_SESSION['adminSession']);  
    }

    function categoryname($id, $type = "category")
    {
        $d = new database;
        if (empty($id))
            return "Not assigned";
        if ($type == "category") {
            $catname = $d->getall("categories", "ID = ?", [$id], fetch: "details");
            return $catname = $catname['name'];
        } else {
            $catname = $d->getall("sub_categories", "ID = ?", [$id], fetch: "details");
            return $catname = $catname['name'];
        }

    }


    function get_visitor_details()
    {
        // ip, browser, theme, country, postal_code, state, city
        $ip = "37.120.215.171";
        $ip = $_SERVER['REMOTE_ADDR'];
        if (isset($_COOKIE['visitor_details'])) {
            $data = unserialize($_COOKIE['visitor_details']);
            if ($data['ip_address'] == $ip) {
                return $data;
            }
        }
        $deviceInfo   = $_SERVER['HTTP_USER_AGENT'];
        $data         = ["ip_address" => $ip, "device" => $deviceInfo, "browser" => "", "theme" => "light", "country" => "", "postal_code" => "", "state" => "", "city" => ""];
        $apiUrl       = "http://ip-api.com/json/{$ip}";
        $locationData = json_decode(file_get_contents($apiUrl));
        // var_dump($locationData);
        if ($locationData && $locationData->status === 'success') {
            // var_dump($locationData);
            $data['country'] = $locationData->country;
            $data['state']   = $locationData->regionName;
            $data['city']    = $locationData->city;
        }
        if (isset($_COOKIE['browser_theme'])) {
            $data['theme'] = htmlspecialchars($_COOKIE['browser_theme']);
        }
        setcookie("visitor_details", serialize($data), time() + 12 * 60 * 60);
        //    var_dump($data);
        return $data;
    }

    function validate_admin()
    {
        if (isset($_SESSION['adminSession'])) {
            return true;
        }
        return false;
    }

    function new_activity($data)
    {
        if (isset($_SESSION['anonymous'])) {
            return null;
        }
        // $data = 'userID', "date_time", "action_name", "link", "action_for", "action_for_ID";
        if (is_array($data) && isset($data['userID'])) {
            $info = [];
            if ($this->getall("users", "ID = ? and acct_type = ?", [$data['userID'], "bot"], fetch: "") > 0) {
                return true;
            }
            $info['userID'] = $data['userID'];
            unset($data['userID']);
            // var_dump($this->get_visitor_details());
            $visitor_info = [];
            if (!isset($_SESSION['adminSession'])) {
                $visitor_info = $this->get_visitor_details();
            }
            $info = array_merge($info, $visitor_info, $data);
            if (!$this->quick_insert("activities", $info)) {
                return false;
            }
            return true;
        } else {
            return false;
        }
    }



function newchat($message, $userID)
    {
        $database = new database;
       
        $whois    = "admin";

        // Insert into the database using `quick_insert`
        $table = "chat";
        $data = [
                    'userID' => $userID,
                    'chat' => htmlspecialchars($message, ENT_QUOTES, 'UTF-8'),
                    'whois' => $whois
                ];

        // Perform the insert
        return $database->quick_insert($table, $data);
    }
    
    function updateCount($message, $userID)
    {
        $database = new database;
       
        $userID = $_POST['userID'];

        // Data to update
        $data = ["isRead" => 1];

        // Construct the WHERE clause as a string directly
        $where= "userID = '$userID' AND whois = 'user'";

        // Call the update method directly with the WHERE clause as a string
        $updateResult = $this->update("chat", $data, $where);
    }


    function updatechat($userID)
    {
        $database = new database;
        // $userID  = htmlspecialchars($_GET['userID']);
        return $chats = $database->getall("chat", "userID = ? ORDER by date asc", [$userID], fetch: "moredetails");

    }

    // Assuming your $d is a database class with getall() method
    public function getMessageCount($table, $where, $params)
    {
        $query = "SELECT COUNT(*) FROM $table WHERE $where";  // Simple COUNT query
        $stmt  = $this->db->prepare($query);

        $stmt->execute($params);
        $count = $stmt->fetchColumn();
        return $count;
    }



   
    function basicuserstatus($userid)
    {
        $d              = new database;
        $checkuserstaus = $d->getall("users", "ID = ? and status = ?", [$userid, 1], fetch: "");
        if ($checkuserstaus > 0) {
            return true;
        } else {
            return false;
        }
    }

    function basiccontactstatus($userid)
    {
        $d              = new database;
        $checkuserstaus = $d->getall("contact", "ID = ? and status = ?", [$userid, 1], fetch: "");
        if ($checkuserstaus > 0) {
            return true;
        } else {
            return false;
        }
    }



    public function verifyrole($id, $role)
    {
        $verify = $this->getall("admins", "ID = ?", [$id], fetch: "details");
        if ($verify['type'] == "admin") {
            return true;
        } else {
            $verify = $this->getall("roles", "userID = ? and therole = ?", [$id, $role], fetch: "moredetails");
            if ($verify > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    function new_notification(array $data, $what = "quick")
    {
        if (is_array($what != "quick")) {
            if (!isset($_POST['time_set'])) {
                $_POST['time_set'] = time();
            }
            $info = $this->validate_form($data, 'notifications', "insert");
            if ($info) {
                return true;
            }
        } else {
            if ($this->quick_insert("notifications", $data)) {
                return true;
            }
        }
        return false;
    }
    // USEAGE
    // Get information from the database using where condition
    // CODE: $members = $d->getall('members', 'email = ?', ['www@gmail.com '], fetch: "moredetails");
    // get all info from database with no conditions
    // CODE: $members = $d->getall(from: 'members', fetch: "moredetails");
    // get info from database with  no conditions but with a limit
    // CODE: $members = $d->getall(from: 'members', where: "LIMTI 10" fetch: "moredetails");

    function getall($from, $where = "", array $data = [], $select = "*", $fetch = "details")
    {
        if (substr($where, 0, 5) == "LIMIT" || substr($where, 0, 5) == "limit" || $where == "") {
            $q = $this->db->prepare("SELECT $select FROM $from $where");
        } else {
            $q = $this->db->prepare("SELECT $select FROM $from  where $where");
        }
        $q->execute($data);
        return $this->getmethod($q, $fetch);
    }

    //    To get the currency
    function getcurrency($id)
    {
        //   $d = new database;
        return $this->getall("currencies", "ID = ?", [$id], fetch: "details");
    }

    function getsettings($meta_name)
    {
        //   $d = new database;
        return $this->getall("settings", "meta_name = ?", [$meta_name], fetch: "details");
    }

    function getusername($id)
    {
        $data = $this->getall("users", "ID = ?", [$id], fetch: "details");
        if (is_array($data)) {
            return $data['first_name'] . ' ' . $data['last_name'];
        } else {
            $data = $this->getall("grouped", "ID = ?", [$id], fetch: "details");
            if (is_array($data)) {
                return $data['group_name'];
            } else {
                return "Not found";
            }
        }

    }

    function radmomstring($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
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


    //   function getusername($id){
//     $user_data = $this->getall("users", "ID = ?", [$id], fetch: "details");
//     $admin_data = $this->getall("admins", "ID = ?", [$id], fetch: "details");

    //     if(is_array($user_data)){
//         return $user_data['first_name'].' '.$user_data['last_name'];
//     } elseif(is_array($admin_data)) {
//         return $admin_data['first_name'].' '.$admin_data['last_name'];
//     } else {
//         $group_data = $this->getall("grouped", "ID = ?", [$id], fetch: "details");
//         if(is_array($group_data)){
//             return $group_data['group_name'];
//         } else {
//             return "Not found";
//         }
//     }
// }




    // To get number of trending in playlist
    public function getTrendingMusic($minPlayCount = 5)
    {
        $sql    = "play_count > ?";
        $params = [$minPlayCount];
        return $this->getall("playlist", $sql, $params, "*", "moredetails");
    }

    function gettrialamount()
    {
        $data = $this->getall("settings", "meta_name = ?", ["free_trial"], fetch: "details");
        return $data['meta_value'];
    }

    function getlong($type)
    {
        if ($type == "monthly") {
            return $long = "month(s)";
        } else if ($type == "annual") {
            return $long = "year(s)";
        }
    }

    function calculateplan($id, $amount, $duration)
    {
        return $amount * $duration;
    }

    function getpaymetmethod($method)
    {
        $value = "flutterwave";
        if (ctype_digit($method)) {
            $value = "card";
        } else {
            $value = $method;
        }
        return $value;
    }


    // USEAGE
    // Insert single data
    // $d->quick_insert("members",
    // [
    //     "firstname" => "tolu",
    //     "lastname" => "ajayi",
    //     "email" => "tolu@gmail.com",
    //     "phonenumber" => "3444334",
    //     "address" => "bawa",
    //     "password" => "dkdkdkdkdk"
    // ],
    // );
    // insert multiple data
    // $d->quick_insert("members",
    //[ 
    // [
    //     "firstname" => "tolu",
    //     "lastname" => "ajayi",
    //     "email" => "tolu@gmail.com",
    //     "phonenumber" => "3444334",
    //     "address" => "bawa",
    //     "password" => "dkdkdkdkdk"
    // ],
    // [
    //     "firstname" => "tolu",
    //     "lastname" => "ajayi",
    //     "email" => "tolu@gmail.com",
    //     "phonenumber" => "3444334",
    //     "address" => "bawa",
    //     "password" => "dkdkdkdkdk"
    // ],
    // ]
    // );



    function quick_insert($into, array $data, $message = null)
    {
        if (isset($data[0]) && is_array($data[0])) {
            foreach ($data as $row) {
                $insert = $this->insert_data($into, $row);
                if (isset($insert)) {
                    $this->get_message($message);
                }
            }
            // return true;
        } else {
            $insert = $this->insert_data($into, $data);
            $this->get_message($message);
            return true;
        }
        return false;
    }

    function get_message($message = null)
    {
        if ($message == null) {
            return null;
        }
        $this->message($message, "success");
        return true;
    }
    // $update = $d->update("members", ["firstname"=>"tunde", "email"=>"tunde@gmail.com"], "ID = '4'");

    function update($what, $data, $where, $message = null)
    {
        $this->get_index_data($data, "update");
        $query  = $this->db->prepare("UPDATE $what SET $this->index WHERE $where");
        $update = $query->execute($this->data);
        if ($update) {
            $this->get_message($message);
            return true;
        }
        return false;
    }

    // public function update($what, $set, $where, $data, $message = ""){
    //     try {
    //         // $set = str_replace(",", " = ?", $set).' = ?';
    //         if($set == "null" || $set == ""){
    //             foreach($data as $key => $value){
    //                 $sets[] = "$key = ?,";
    //                }
    //               $set = substr(implode(" ", $sets), 0, -1);
    //         }
    //          $set;
    //          $stmt = $this->db->prepare("UPDATE $what SET $set WHERE $where");
    //         $data = array_values($data);
    //          $stmt->execute($data);
    //         if($stmt){
    //             if($message != ""){
    //               Database::message($message, "success");
    //             }
    //           return true;
    //         }
    //         $stmt = null;
    //         } catch (PDOException $e) {
    //             // For handling error
    //             return false;
    //             //   Database::message("Something went wrong $e", "error");
    //         }
    //     }


    // $d->delete("members", "ID = ? or phonenumber = ?", [3, 3434]);
    function delete($from, $where, array $data)
    {
        $query  = $this->db->prepare("DELETE FROM $from WHERE $where ");
        $delete = $query->execute($data);
        if ($delete) {
            return true;
        }
        return false;
    }

    private function get_index_data(array $data, $type = "insert")
    {
        $index = '';
        $marks = '';

        if ($type == "insert") {
            foreach ($data as $key => $k) {
                $index .= "`$key`, ";
                $marks .= "?, ";
            }
        }

        if ($type == "update") {
            foreach ($data as $key => $value) {
                $index .= "`$key` = ?, ";
                $marks .= "?, ";
            }
        }

        $this->index = rtrim($index, ", ");
        $this->marks = rtrim($marks, ", ");
        $this->data  = array_values($data);
        return true;
    }

    // private function getmethod($q, $fetch)
    // {
    //     switch ($fetch) {
    //         case 'details':
    //             $data = $q->fetch(PDO::FETCH_ASSOC);
    //             break;
    //         case 'moredetails':
    //             $data = $q;
    //             break;

    //         default:
    //             $data = $q->rowCount();
    //             break;
    //     }
    //     return $data;
    // }

  
    private function getmethod($q, $fetch)
{
    switch ($fetch) {
        case 'details':
            $data = $q->fetch(PDO::FETCH_ASSOC); // Fetch a single row as an associative array
            break;
        case 'moredetails':
            $data = $q->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as an associative array
            break;
        default:
            $data = $q->rowCount(); // Return the number of rows affected
            break;
    }
    return $data;
}


    function create_table($name, array $data)
    {
        if (!is_array($data)) {
            return null;
        }
        if ($this->check_table($name)) {
            return true;
        }
        $info   = $this->get_table_para($data);
        $query  = $this->db->prepare("CREATE TABLE $name($info)");
        $update = $query->execute();
    }
    function check_table($name)
    {
        try {
            $query  = $this->db->prepare("select 1 from $name");
            $update = $query->execute();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    function get_table_para(array $datas)
    {
        $info = "";
        foreach ($datas as $key => $data) {
            $type          = "VARCHAR(250)";
            $default_value = "";
            $isNull        = "NOT NULL";
            if ($key == "ID" && isset($data['input_type']) && $data['input_type'] == "number") {
                $isNull .= " AUTO_INCREMENT";
            }
            $primaryKey = "";
            if (isset($data['input_type']) && $data['input_type'] == "number") {
                match (htmlspecialchars($data['input_type'])) {
                    "number" => $type = "INT(100)",
                };
            }
            if (isset($data['is_required']) && $data['is_required'] == false) {
                $isNull = "NULL";
            }
            if (isset($datas['input_data'][$key])) {
                $default_value = "DEFAULT '" . htmlspecialchars($datas['input_data'][$key]) . "'";
            }

            $info .= "$key $type $isNull $default_value,";
        }
        $info .= "`date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,";
        if (isset($datas['ID'])) {
            $info .= "PRIMARY KEY(ID),";

        }

        return rtrim($info, ',');
    }
    function insert_data($into, $data)
    {
        $this->get_index_data($data);
        $query = $this->db->prepare("INSERT INTO $into ($this->index) values ($this->marks)");
        // if($into == "message") {
        //     var_dump($this->data);
        // }
        $insert = $query->execute($this->data);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    function options_list($table, $key = "ID", $value = "name")
    {
        if ($table->rowCount() > 0) {
            foreach ($table as $row) {
                $data[$row[$key]] = $row[$value];
            }
        }
        return $data ?? [];
    }

    function validate_form($datas, $what = "", $action = null, $error_message = true)
    {
        $err = false;
        $info = [];
        if (!is_array($datas)) {
            return false;
        }
        $wait = [];
        $files = [];
        foreach ($datas as $key => $data) {

            if ($key == "input_data") {
                continue;
            }
            if (isset($data["input_type"]) && $data["input_type"] == "file") {
                $info[$key] = "";
                $files[$key] = $data;
                continue;
            }
            if ($this->check_if_required($data)) {
                if (!isset($_POST[$key]) || empty($_POST[$key])) {
                    echo $this->message(ucwords(str_replace("_", " ", $key)) . " is required", "error");
                    $err = true;
                    continue;
                }
            }

            // if (isset(Regex[$key]) && Regex[$key]['value'] && !empty($_POST[$key])) {
            //     if (!preg_match(Regex[$key]['value'], htmlspecialchars($_POST[$key]))) {
            //         $err = true;
            //         echo $this->message(Regex[$key]["error_message"], "error");
            //         continue;
            //     }
            // }

            // mangedate and time here
            if(isset($data['input_type']) && $data['input_type'] == "datetime-local" && isset($_POST[$key]) && !empty($_POST[$key])) {
                $dateTime = new DateTime($_POST[$key]);
                $_POST[$key] = $dateTime->format('Y-m-d H:i:s');
            }

            if(isset($_POST[$key]) && is_array($_POST[$key])) {
                $info[$key] = json_encode($_POST[$key]);
            }elseif(isset($_POST[$key])) {
                $info[$key] = htmlspecialchars($_POST[$key]);
            }else {
                $info[$key]  = "";
            }
            if (isset($data['unique'])) {
                $wait[] = $key;
            }
        }

        if (isset($datas["password"]) && isset($datas['confirm_password']) && !empty($data['password'])) {
            if ($_POST['password'] != $_POST['confirm_password']) {
                $err = true;
                echo $this->message("Password and confirm password does not match", "error");
                return null;
            }
            // $info['password'] = password_hash($_POST['password'],  PASSWORD_DEFAULT);
        }

        if ($what != "") {
            if (!$this->validate_database_data($what, $wait, $datas, $info, $error_message)) {
                $err = true;
            }
        }

        if (count($files) > 0 && $err != true) {
            $files_set = [];
            foreach ($files as $key => $row) {
                $files_set[$key] =  $this->proccess_single_image($key, $row, $datas);
            }
            if (in_array(false, $files_set)) {
                return null;
            }
            // var_dump($files_set);
            foreach ($files_set as $key => $value) {
                // echo $value;
                // var_dump(gettype($value));
                // echo $key;var_dump(gettype($value));
                if ($value == "no--value") {
                    $info[$key] = "";
                    continue;
                }

                if ($value == "upload--this--file") {
                    // var_dump($value);
                    $file_name = $key;
                    if (isset($datas[$key]['file_name'])) {
                        $file_name = $datas[$key]['file_name'];
                    }
                    if(isset($datas[$key]['formart'])) {
                        $vaild_formart = $datas[$key]['formart'];
                    }
                    $image = $this->process_image($file_name, $datas[$key]['path'], $key, valid_formats1: $vaild_formart ?? null);
                    if (!$image) {
                        return null;
                    }
                    $info[$key] = $image;
                    continue;
                }

                $info[$key] = $value;

                // var_dump($info);
            }
        }
        
        // var_dump($info);
        if (!$err) {
            if(isset($info['confirm_password'])) {
                unset($info['confirm_password']);
               }
               
              if(!$this->database_action($action, $info, $what)) {
                return false;
              }
            return $info;
        }
        return null;
    }



    private function database_action($action, $data, $what)
    {
        if (!is_array($data) || empty($what) || $action == null) {
            return true;
        }
        switch ($action) {
            case 'insert':
                if (!$this->quick_insert($what, $data)) {
                    return false;
                }
                return true;

            case 'update':
                if (!isset($data['ID'])) {
                    return false;
                }
                $id = $data['ID'];
                if (!$this->update($what, $data, "ID = '$id'")) {
                    return false;
                }
                return true;
            default:
                return true;

        }
    }

    function getaddress($data)
    {
        $address = "";
        $d       = new database;
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $c = $this->getall($key, "ID = ?", [$value], fetch: "details");
                if (is_array($c)) {
                    $address .= $c['name'] . " ";
                }
            }
        } else {
            $address = "No address";
        }
        return $address;
    }

    function check_if_required($data)
    {
        if (isset($data['is_required']) && $data['is_required'] == true || !isset($data['is_required'])) {
            return true;
        }
        return false;
    }
    function validate_database_data($what, $wait, $datas, $info, $error_message = true): bool
    {
        $error = false;
        $idc   = "";
        $idv   = "";
        if (isset($datas['ID']) && isset($info['ID'])) {
            $idc = "ID != ? and ";
            $idv = $info["ID"];
        }
        // print_r($wait);

        foreach ($wait as $k => $key) {
            // echo $key;

            if (!isset($datas[$key]["unique"])) {
                return true;
            }
            $against = $datas[$key]["unique"];
            if ($against == "") {
                $datacheck = [$info[$key]];
                if ($idv != "") {
                    $datacheck = [$idv, $info[$key]];
                }
                $check = $this->getall("$what", "$idc $key = ?", $datacheck, fetch: "");
            }

            if (!isset($check)) {
                if (!isset($datas[$against])) {
                    $error = true;
                    echo $this->message("Int: We have issues to validate your data. please reload the page and try again", "error");
                    return false;
                }

                if ((int) array_search($key, array_keys($datas)) > (int) array_search($against, array_keys($datas))) {

                    $datacheck = [$info[$against], $info[$key]];
                    if ($idv != "") {
                        $datacheck = [$idv, $info[$against], $info[$key]];
                    }

                    $check = $this->getall($what, "$idc $against = ? and $key = ?", $datacheck, fetch: "");
                    // var_dump($check);



                } else {
                    $datacheck = [$info[$key], $info[$against]];
                    if ($idv != "") {
                        $datacheck = [$idv, $info[$key], $info[$against]];
                    }

                    $check = $this->getall($what, "$idc $key = ? and $against = ?", $datacheck, fetch: "");
                    //  data here
                }
            }
            if ($check > 0) {
                $error = true;
                if ($error_message == true) {
                    echo $this->message("This exact " . $this->clean_str($what) . " already exist", "error");
                }
                $check = null;
            }
        }
        if ($error) {
            return false;
        }
        return true;
    }

    function settings($value)
    {
        // $d = new database;
        return $this->getall("settings", "meta_name = ?", [$value], fetch: "details");
    }

    function clean_str($string)
    {
        // echo $this->message("Int: We have issues to validate your data. please reload the page and try again", "error");
        return ucwords(str_replace("_", " ", $string));
    }
    function checkmessage($arry)
    {
        foreach ($arry as $key) {
            $check = substr($key, -5);
            if ($check == "_null") {
                $key = substr_replace($key, "", -5);
            }
            $key = str_replace(" ", "_", $key);
            if ($check != "_null") {
                if ($_POST["$key"] == "" || !isset($_POST["$key"]) && $key != "referral_code") {
                    $this->err = "yes";
                    database::message("Please enter your $key", "error");
                } else {
                    $set["$key"] = ${$key} = htmlspecialchars($_POST["$key"]);
                }
            } else {
                $set["$key"] = ${$key} = htmlspecialchars($_POST["$key"]);
            }
        }
        if (isset($set['password']) && isset($set['confirm_password'])) {
            if (isset($set['confirm_password'])) {
                $check = database::checkpass($set['password'], $set['confirm_password']);
                if ($check) {
                    return $set;
                } else {
                    $this->err = "yes";
                }
            } else {
                $this->err = "yes";
                database::message("IntErr: We can't confirm your password", "error");
            }
        } elseif ($this->err != "yes") {
            return $set;
        } else {
            return $this->err;
        }
    }

    private function checkpass($password, $cpass)
    {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        // $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || strlen($password) < 4) {
            database::message("Password should be at least 4 characters in length and should include at least one upper case letter and one number.", "error");
            return false;
        } else {
            if ($password == $cpass) {
                return true;
            } else {
                database::message("Password don't match. Check and try again", "error");
                return false;
            }
        }
    }
    public function message($message, $type, $method = "default")
    {
        if ($type == "error") {
            $type = "danger";
        } elseif ($type == "success") {
            $type = "success";
        }
        $message = str_replace("_", " ", $message);
        //     echo "<div class='bg-$type fade show mb-5' role='bg'>
        //     <!--  <div class='bg-icon'><i class='flaticon-$type'></i></div> -->
        //     <div class='bg-text'>$message</div>
        // </div>";
        if ($type == "success" && $method == "default") {
            echo "<div class='message $type' style='color:green!important'>
                <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
                $message
                </div>";
        } elseif ($type == "danger" && $method == "default") {
            echo "<div class='message $type' style='color:red!important'>
                <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
                $message
                </div>";
        }

        if ($type == "success" && $method == "json") {
            $return = [
                "message" => ["Success", "$message", "success"],
            ];
            return json_encode($return);
        } elseif ($type == "danger" && $method == "json") {
            $return = [
                "message" => ["Error", "$message", "error"],
            ];
            return json_encode($return);
        }
    }

    function sendverifyemail($userID)
    {
        $d    = new database;
        $user = $d->getall("users", "ID = ?", [$userID]);
        if (!is_array($user)) {
            $d->message("User not found please login and try again", "error");
            return false;
        }

        if ($user['email_verify'] == 1) {
            $d->message("Seems user account is verified please login into your account", "error");
            return false;
        }
        $token = $user['token'];
        if ($user['token'] == "0") {
            $token = $d->randcar(40);
            $d->update("users", "", "ID = '$userID'", ["token" => $token]);
        }
        $email     = $user['email'];
        $sendemail = $d->smtpmailer(1, $user['email'], "Account Email Verification", "Please verify your account with the link provided below <br> <a href='verify.php?token=$token&e=$email'>verify Account</a>");
        if ($sendemail) {
            $d->message("Email Sent Successfully", "success");
        } else {
            $d->message("Error sending email please try again later", "error");
        }
    }

    function getproductimage($id, $type = "")
    {
        $d = new database;
        if ($type == "") {
            $data = $d->getall("products", "ID = ?", [$id], fetch: "details");
            if (is_array($data)) {
                return $data['upload_image'];
            } else {
                return "preview.jpg";
            }
        } else {
            $data = $d->getall("products", "ID = ?", [$id], fetch: "moredetails");
            if (!empty($data)) {
                return $data;
            } else {
                return "preview.jpg";
            }
        }
    }

    // function verifyassign($adminid, $customerid)
    // {
    //     $d      = new database;
    //     $verify = $d->getall("admins", "ID = ?", [$adminid], fetch: "details");
    //     if ($verify['type'] == "admin") {
    //         return true;
    //     } else {
    //         // $verify = $d->getall("people_assign", "adminID = ? and userID = ?", ["$adminid", "$customerid"], "");
    //         if ($verify > 0) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }
    // }

    // function userID($type = "admin"){
//     if($type == "users" || $type == "customers"){
//         return  $this->userID = htmlspecialchars($_SESSION['userSession']);  
//     }else{
//         return  $this->userID = htmlspecialchars($_SESSION['adminSession']);  
//     }
// }

    function userID($type = "admin")
    {
        if ($type == "users" || $type == "customers") {
            return isset($_SESSION['userSession']) ? htmlspecialchars($_SESSION['userSession']) : null;
        } else {
            return isset($_SESSION['adminSession']) ? htmlspecialchars($_SESSION['adminSession']) : null;
        }
    }



    function randcar($no = 20)
    {
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, $no) as $k)
            $rand .= $seed[$k];
        return "3" . $rand;
    }

    function send_email($userID, $subject, $message)
    {
        $smessage = $this->get_email_template("default")['template'];
        $user     = $this->getall("users", "ID = ?", [$userID], "first_name, last_name, email");
        if (!is_array($user)) {
            return false;
        }
        // ${amount} ${reason} ${website_url} 
        $smessage    = $this->replace_word(['${first_name}' => $user['first_name'], '${last_name}' => $user['last_name'], '${message_here}' => $message, '${website_url}' => $this->get_settings("website_url")], $smessage);
        $sendmessage = $this->smtpmailer($user['email'], $subject, $smessage);
        if ($sendmessage) {
            return true;
        } else {
            return false;
        }
    }
    function smtpmailer($to, $subject, $body, $name = "", $message = '', $smtpid = 1)
    {
        // require_once "";
        $d = new database;
        $smtp = $d->getall("smtp_config", "ID = ?", ["$smtpid"]);
        if (!is_array($smtp)) {
            $d->message("SMTP selected not found please choose another one or refresh page and try again", "error");
            return false;
        }
        $server = $smtp['server'];
        $username = $smtp['username'];
        $password = $smtp['password'];
        $port = $smtp['port'];
        $smtp_from_email = $smtp['from_email'];

        // echo $body;
        try {
            $from = $username;
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = "$server";
            $mail->Port = "$port";
            $mail->Username = "$username";
            $mail->Password = "$password";

            //   $path = 'reseller.pdf';
            //   $mail->AddAttachment($path);

            $mail->IsHTML(true);
            $mail->From = "$username";
            $mail->FromName = $username;
            $mail->Sender = "$smtp_from_email";
            $mail->AddReplyTo("$username", $username);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($to);
            $send = $mail->Send();
            if ($send) {
                return true;
            }
        } catch (phpmailerException $e) {

            // echo $e->errorMessage(); //Pretty error messages from PHPMailer
            // $d->message("Error Sending message. You can try new SMTP", "error");
            return false;
        } catch (Exception $e) {
            // echo $e->getMessage(); //Boring error messages from anything else!
            // $d->message("Error Sending message. You can try new SMTP", "error");
            return false;
        }
    }

    protected function imageupload($name)
    {
        //��heck that we have a file
        if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
            //Check if the file is JPEG image and it's size is less than 350Kb
            $filename = basename($_FILES['uploaded_file']['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            if (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") &&
                ($_FILES["uploaded_file"]["size"] < 350000)
            ) {
                //Determine the path to which we want to save this file
                $name = $name . '.' . $ext;
                $newname = 'upload/' . $name;
                //Check if the file with the same name is already exists on the server
                // if (!file_exists($newname)) {
                //Attempt to move the uploaded file to it's new place
                if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname))) {
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

    protected function proccess_single_image($key, $value, $datas) 
{
    // Check if the required image is not set or empty
    if (!$this->check_if_required($value)) {

        // Verify that $_FILES contains the key before accessing it
        if (!isset($_FILES[$key]) || $_FILES[$key]['name'] == "") {
            if (isset($datas['input_data'][$key]) && $datas['input_data'][$key] != "") {
                return $datas['input_data'][$key];
            }

            return "no--value";
        }

        return "upload--this--file";
    }

    // Double-check that $_FILES[$key] exists before using it
    if (!isset($_FILES[$key]) || $_FILES[$key]['name'] == "") {
        $key_display = str_replace("_", " ", $key);
        database::message("You need to upload $key_display", "error");
        return false;
    }

    // Verify that 'path' is set in the $value array
    if (!isset($value['path']) || $value['path'] == "") {
        $key_display = str_replace("_", " ", $key);
        $this->message("Intr: No path set for $key_display. <br> Note: this error is an internal error, you are not the reason for the error. <br> Please report to us on <a href='mailto:" . $this->get_settings("support_email") . "' target='_BLANK'>" . $this->get_settings("support_email") . "</a>", "error");
        return false;
    }

    return "upload--this--file";
}

    protected function check_multiple_files($names)
    {
        $error = false;
        foreach ($names as $key => $value) {
            if ($this->check_if_required($value)) {
                if ($_FILES["$key"]['name'] == "" || !isset($_FILES["$key"]['name'])) {
                    $error = true;
                    database::message("You need to upload your $key", "error");
                } else {
                    $set["$key"] = ${$key} = htmlspecialchars($_FILES["$key"]['name']);
                }
            } else {
                $set["$key"] = ${$key} = htmlspecialchars($_FILES["$key"]['name']);
            }
        }

        if (!$error) {
            return $set;
        } else {
            return $this->err;
        }
    }
    function process_image($title, $path, $name = "uploaded_file", $i = 0, array $valid_formats1 = null)
    {
        // Default valid formats if none provided
        if ($valid_formats1 == null) {
            $valid_formats1 = ["JPG", "jpg", "png", "jpeg", "JPEG", "PNG", "svg", "SVG"];
        }
    
        // Check if a file is uploaded
        if (empty($_FILES["$name"]["name"])) {
            database::message("No file selected", "error");
            return false;
        }
    
        // For single file or multiple file upload handling
        if (is_array($_FILES["$name"]["name"])) {
            // Multiple files (access the file by index)
            $image = $_FILES["$name"]["name"][$i];
            $size  = $_FILES["$name"]["size"][$i];
            $tmp   = $_FILES["$name"]["tmp_name"][$i];
        } else {
            // Single file upload (no index needed)
            $image = $_FILES["$name"]["name"];
            $size  = $_FILES["$name"]["size"];
            $tmp   = $_FILES["$name"]["tmp_name"];
        }
    
        // If no file is selected
        if (empty($image)) {
            database::message("No file selected", "error");
            return false;
        }
    
        // Handle the file upload logic
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Validate file size (limit to 7MB)
            if ($size < 7500000) {
                // Get file extension using pathinfo
                $fileInfo = pathinfo($image);
                
                // Ensure we have an extension
                if (isset($fileInfo['extension'])) {
                    $ext = strtolower($fileInfo['extension']); // Convert to lowercase for consistency
    
                    // Check if the file extension is in the allowed formats
                    if (in_array($ext, $valid_formats1)) {
                        if ($path == "check") {
                            return true; // Just checking the file validity
                        }
    
                        // Sanitize the title and generate the actual image name
                        $titlename = str_replace(" ", "_", $title);
                        $actual_image_name = $titlename . "." . $ext;
    
                        // Move the uploaded file to the target directory
                        if (move_uploaded_file($tmp, $path . $actual_image_name)) {
                            return $actual_image_name;  // Return the file name if upload is successful
                        } else {
                            database::message('<b>' . $image . ': Image Not Uploaded. Try again', 'error');
                            return false;  // Failed to upload the image
                        }
                    } else {
                        // Invalid file type
                        database::message('<b>' . $image . ':</b> Image file Not Supported. We support: ' . implode(", ", $valid_formats1), 'error');
                        return false;
                    }
                } else {
                    // Unable to determine file extension
                    database::message('<b>' . $image . ':</b> Unable to determine file extension.', 'error');
                    return false;
                }
            } else {
                // File too large
                database::message("<b>$image</b>: Image too large. Make sure your image size is not above 7MB", "error");
                return false;
            }
        }
    }
    

    // addtion functions

    function get_settings($value = "company_name", $where = "settings", $who = "all")
    {
        $data = $this->getall("$where", "meta_name = ? and meta_for = ?", [htmlspecialchars($value), $who], "meta_value");
        if (!is_array($data)) {
            return "";
        }
        return $data['meta_value'];
    }

    function create_settings($data, $what)
    {
        if (!is_array($data)) {
            return null;
        }
        foreach ($data as $key => $value) {
            if ($this->getall($what, "meta_name = ?", [$key], fetch: "") > 0) {
                continue;
            }
            $this->quick_insert($what, ["meta_name" => $key, "meta_value" => "placeholder"]);
        }
    }

    function replace_word(array $data, $word)
    {
        // $word = $word;
        foreach ($data as $key => $value) {
            $value = htmlspecialchars($value);
            if (!strpos($word, $key)) {
                continue;
            }
            $word = str_replace($key, $value, $word);
        }
        // var_dump($word);
        return $word;
    }


    function get_email_template($name)
    {
        return $this->getall("email_template", "name = ?", [$name]);
    }
    function getcoins($coinID = "")
    {
        $service_url = 'https://api.coincap.io/v2/assets';
        if ($coinID) {
            $service_url = 'https://api.coincap.io/v2/assets/' . $coinID;
        }
        $json_objekat = $this->api_call($service_url);
        return $data = $json_objekat->data;
    }

    function api_call($service_url)
    {
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        return $json_objekat = json_decode($curl_response);
        // return $data = $json_objekat->data;
    }

    function newcoin()
    {
        $d     = new database;
        $check = $d->checkmessage(["coinID_null", "name", "short_name"]);
        if (!is_array($check)) {
            return false;
        }
        if ($d->getall("coins", "name = ?", [$check['name']], fetch: "") > 0) {
            $d->message("Coin with this name already exit", "error");
            return false;
        }
        $d->quick_insert("coins", $check, message: "Icon added successfully");
        // $icon = $d->process_image(uniqid(), "../upload/icon/", "uploaded_icon");
        // if($icon){
        //     $check['image_icon'] = $icon;
        // $d->quick_insert("coins", "", $check, "Icon added successfully");
        // }
    }
    function autogenerate()
    {
        $data = $this->getcoins();
        foreach ($data as $coin) {
            $_POST['coinID']     = $coin->id;
            $_POST['name']       = $coin->name;
            $_POST['short_name'] = $coin->symbol;
            $this->newcoin();
        }
    }

    function coins_options()
    {
        $coins = $this->getall("coins", fetch: "moredetails");
        if ($coins != "") {
            $options = [];
            foreach ($coins as $row) {
                $id = $row['coinID'];
                // var_dump($id);
                $options[$id] = $row['name'] . ' - ' . $row['short_name'];
            }
        }
        return $options;
    }

    function get_wallet($who = "admin")
    {
        $wallet = $this->getall("wallets", "userID  = ?", [$who], fetch: "moredetails");
        if ($wallet->rowCount() == 0) {
            return [];
        }
        $options = [];
        foreach ($wallet as $row) {
            $id   = $row['ID'];
            $coin = $this->getall("coins", 'coinID = ?', [$row['coin_name']]);
            if (!is_array($coin)) {
                continue;
            }
            $options[$id] = $coin['name'] . ' - ' . $coin['short_name'];
        }
        return $options;
    }

    function money_format($amount, $currency = '$')
    {
        $tamount = number_format((float) $amount, 2, );
        $parts   = explode(".", $tamount);
        if ($parts[1] == "00") {
            $tamount = number_format((float) $amount);
        }
        return $currency . $tamount;

    }

    function date_format($date)
    {
        $date = date_create($date);
        return date_format($date, "D, d M Y h:i:sa");
    }

    function calculateProfitPercentage($buyingPrice, $sellingPrice)
    {
        $profitPercentage = (($sellingPrice - $buyingPrice) / $buyingPrice) * 100;
        return $profitPercentage;
    }

    function calculateIncreasedValue($originalValue, $percentageIncrease)
    {
        $percentageIncrease = $percentageIncrease / 100;
        $hold               = $originalValue * $percentageIncrease;
        $increasedValue     = $originalValue + $hold;
        return $hold;
    }

    // function loadpage($url) {
    //     echo '<script>window.location.href = "'.$url.'";</script>';
    // }
    function loadpage($url, $type = "normal")
    {
        if ($type == "json") {
            $json = ["function" => ["loadpage", "data" => [$url, ""]]];
            return json_encode($json);
        }
        echo '<script>window.location.href = "' . $url . '";</script>';
    }

    // function ago($time)
    // {
    //     if ($time == "") {
    //         return "";
    //     }
    //     // $time = strtotime($time);
    //     $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    //     $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    //     $now     = time();

    //     $difference = $now - $time;
    //     $tense      = "ago";

    //     for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
    //         $difference /= $lengths[$j];
    //     }

    //     $difference = round($difference);
    //     if ($periods[$j] == "second") {
    //         return "Just now";
    //     }

    //     if ($difference != 1) {
    //         $periods[$j] .= "s";
    //     }



    //     $value = "$difference $periods[$j] ago";
    //     if ($value == "1 second ago") {
    //         return "Just now";
    //     } else {
    //         return $value;
    //     }
    // }

    function ago($time)
{
    if ($time == "") {
        return "Offline";
    }

    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    $now     = time();
    
    $difference = $now - $time;

    // Determine online status (within the last 5 minutes)
    if ($difference <= 300) { // 300 seconds = 5 minutes
        return "Online";
    }

    $tense = "ago";
    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
        $difference /= $lengths[$j];
    }

    $difference = round($difference);

    if ($periods[$j] == "second") {
        return "Just now";
    }

    if ($difference != 1) {
        $periods[$j] .= "s";
    }

    $value = "$difference $periods[$j] ago";
    if ($value == "1 second ago") {
        return "Just now";
    } else {
        return $value;
    }
}



    // short a text

    function short_text($text, $maxCharacters = 30)
    {
        if (strlen($text) > $maxCharacters) {
            $shortenedText = substr($text, 0, $maxCharacters) . "...";
        } else {
            $shortenedText = $text;
        }

        return $shortenedText;
    }

    function short_no($no, $maxno = 99)
    {
        if ($no == 0) {
            $no = "";
        }
        if ($no > $maxno) {
            $no = "$maxno+";
        }
    }

    function generateRandomDateTime($startDate = '2022-01-01 09:00:00', $endDate = null)
    {
        if ($endDate == null) {
            $endDate = date('Y-m-d H:i:s');
        }
        // '2022-01-01 09:00:00', date('Y-m-d H:i:s')
        $startTimestamp  = strtotime($startDate);
        $endTimestamp    = strtotime($endDate);
        $randomTimestamp = mt_rand($startTimestamp, $endTimestamp);
        $randomDateTime  = date('Y-m-d H:i:s', $randomTimestamp);

        return $randomDateTime;
    }


    function addMinutes($datetimeStr, $minutes)
    {
        // Create DateTime object from the input string
        $originalDatetime = new DateTime($datetimeStr);

        // Add the specified number of minutes
        $newDatetime = $originalDatetime->modify("+$minutes minutes");

        // Format the new datetime as desired
        $newDatetimeStr = $newDatetime->format('Y-m-d H:i:s');

        return $newDatetimeStr;
    }
}
