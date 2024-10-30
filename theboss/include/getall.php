<?php

    $userID = htmlspecialchars($_SESSION['AdminSession']);
    $acct = database::getInstance()->fastgetwhere($what_to_get="admin", $where="adminID = ?", $userID, $status="details");
    
      $admindata = $d->fastgetcount("admin",  "ID", ";");
      $contact = $d->fastgetcount("contact",  "ID", ";");
      $studentdata = $d->fastgetcount("form_data",  "ID", ";");
    //   $id = $_POST["ID"];
    
      $viewstudentdata = $d->fastget("form_data", "userID", ";");
?> 