<?php 
    require_once "header.php";

    $id = $_GET['pID'];
    $data = $d->fastgetwhere("form_data", "userID = ?", $id, "details");
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<div class=''>
    <div class='cnt223'>
        <!-- <h1 style="text-align:center;">Hello!! <?=$data['fname'];?></h1>
        <p style="text-align:center;">Welcome to Mstarz Tech Training class</p> -->
    
        <!-- <hr/> -->
        <br/> <br/>
        
    
     
            <div class="wrapper">
                <div class="card">
                    
                <div class="img">
                    <img src="upload/idcard/<?=$data['img'];?>" alt="Image" width="100%">
                </div>

                <div class="cnt">
                    <div class="name"><?=$data['fname'];?> <?=$data['lname'];?></div>
                    <div class="txt" style="font-weight: 200;"><?=$data['course'];?> In
                    <strong>Mstarz Tech</strong>
                    </div>
                    <i class="fas fa-thumbtack"></i>
                    <strong><?=$data['address'];?></strong>

                    <div class="card-inf">
                    <div class="item">
                    <h3 class="ref">Kindly keep your reference number shown below for future reference</h3>
                    <!-- <div class="txt">Reference Number</div> -->
                    <hr/>
                        <div class="title">REF- <?=$data['reference'];?></div>
                        
                    </div>

                    
                   

                  
                    </div>

                    <!-- <div class="card-social">
                    <a href="https://www.facebook.com/codingplayfb/" class="facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/codingplay.insta/" class="instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://github.com/jamshidelmi" class="github">
                        <i class="fab fa-github"></i>
                    </a>
                    </div> -->

                    <div class="card-button">
                    <button class="btn-blue" onclick="location.href='https://mstarztech.com/contact.php';">Message</button>
                    <button class="btn-orange" onclick="location.href='https://facebook.com/manistar1';">Follow</button>
                    </div>

                </div>
                </div>

                </div>
    <br/>
            <!-- <a href='' class='close'>Close</a> -->
        </p>
    </div>
</div>
<?php require_once "js.js" ?> 