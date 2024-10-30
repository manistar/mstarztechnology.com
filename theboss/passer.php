<?php 
    require_once "include/database.php"; 
    $d = new Database;
    if(isset($_POST['makeID'])){
        $makeID = htmlspecialchars($_POST['makeID']);
       $model = $d->fastgetwhere("model", "makeID = ?", $makeID, "moredetails");
       foreach($model as $row){
            echo "<option value='".$row['ID']."'>".$row['name']."</option>";
       }
    }

    if(isset($_POST['modelID'])){
        $modelID = htmlspecialchars($_POST['modelID']);
        $year = $d->fastgetwhere("year", "modelID = ?", $modelID, "details");
        $no = (int)$year['to_year'] - (int)$year['from_year'];
        $date =  (int)$year['from_year'];
        for ($i=0; $i < $no ; $i++) { 
            echo "<option value='".$date."'>".$date."</option>";
            $date = $date + 1;
        }
     }
?>