<?php require_once "include/auth-ini.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
        <div class="login-card">
            <h1 class="title">Log In</h1>
        <form action="passer" id="foo" class="login-form" onsubmit="return false">
            <div class="input-group">
                <!-- <span class="icon">👤</span> -->
            <?= $c->create_form($user_validating); ?>
            </div>
            <input type="hidden" name="userLogin" value="">
            <div id="custommessage"></div>
           
            <button type="submit" class="login-btn" value="submit">LOGIN</button>
            <p class="register-text">
                New to Login? <a href="register.php">Register Here</a>
            </p>
        </form>
    </div>
</div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/my.js"></script>
</body>
</html>
