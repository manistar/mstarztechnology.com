<?php require_once "head.php";?>
<!DOCTYPE html>
<html lang="en" class="lockscreen">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $fname = $acct["name"]." ".$acct["status"]; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/dist/css/adminlte.min.css">
  <style>
      .logins-box-msg{
              font-size: 18px;
              margin-bottom: 0px;
      }
      
      .form-group .form-control {
    border-radius: 5px;
    min-height: 50px;
    border: 1px solid #D6D5FA;
    padding: 0px 22px;
    font-size: 16px;
    font-weight: 500;
    color: #515184;
    transition: all 0.3s ease-in-out;
}
      
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Mstarz Tech</b> Locked</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="logins-box-msg">Screen Locked</p>
                        <form action="lock.php" method="post">
                        <!--<input type="text" name="lockscreen" placeholder="" value="1" style="display: none"/>-->
                          <!-- <input type="hidden" name="lockscreen" id=""> -->
                          
                                   <?php 
                                        if(isset($_POST['unlock'])){
                                            $correct = $_SESSION['lockscreen'];
                                          
                                            $pass = $_POST['password'];
                                            if(password_verify($pass, $correct)){
                                                unset($_SESSION['lockscreen']);
                                                $url ="index.php";
                                                echo "<script language=\"Javascript\" type=\"text/javascript\">
                                                window.location=\"$url\";
                                                </script>";
                                            }else{
                                                echo   $error = '<div class="alert alert-danger">
                                                <strong>Warning!</strong> Password Incorect
                                            </div>'; 
                                            }

                                           
                                        }
                                        // print_r($_POST);
                                   ?>
        <div class="input-group mb-3">
          <input type="password" name="password" value="Password" placeholder="Enter Password to continue" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         <button type="submit" name="unlock" class="btn btn-primary btn-block">Unlock</button>
   
        <!--<div class="row">-->
        <!--  <div class="col-8">-->
        <!--    <div class="icheck-primary">-->
              <!-- <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label> -->
          <!--  </div>-->
          <!--</div>-->
          <!-- /.col -->
        <!--  <div class="col-4">-->
        <!--    <button type="submit" name="unlock" class="btn btn-primary btn-block">Unlock</button>-->
        <!--  </div>-->
          <!-- /.col -->
        <!--</div>-->
      </form>
      <div class="new-account text-center mt-3">
                                    <a class="text-primary" href="lock.php?logout">
                                        <h5>I'm not <?php echo $fname; ?></h5>
                                    </a>
                                </div>
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1"> -->
        <!-- <a href="forget.php">I forgot my password</a> -->
      <!-- </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<center>Powered by <a href="mstarztech.com">mstarztech.com</a></center>
<!-- jQuery -->
<script src="plugins/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/dist/js/adminlte.min.js"></script>
</body>
</html>
