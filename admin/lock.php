<?php require_once "inis/ini.php"; ?>
<!DOCTYPE html>
<html lang="en" class="lockscreen">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Music Web | Log in</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylessheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.html"><b>Mstarz</b> Admin Login</a>
      </div>
      <!-- /.login-logo -->

      <div class="card">
        <div class="card-body login-card-body">
          <p class="logins-box-msg">Screen Locked</p>

          <form action="passer" id="foo" onsubmit="return false">
          <!-- <?= $c->create_form($user_validating);?>  -->
            <?= $c->create_form($lockscreen); ?>
            <input type="hidden" name="unlock" value="">
            <div id="custommessage"></div>
            <button type="submit" class="btn btn-primary btn-block">Unlock</button>
          </form>
          <div class="new-account text-center mt-3">
            <a class="text-primary" href="lock.php?logout">
              <h5>I'm not
                <?= $data['first_name'] . '' . $data['last_name']; ?>
              </h5>
            </a>
          </div>

        </div>
      </div>

      <center>Powered by <a href="mstarztech.com"> MSTARZTECH.COM</a></center>
      <!-- Search JS -->
      <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
      <script src="js/my.js"></script>
      <!-- Search JS End -->

      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
  </body>

</html>