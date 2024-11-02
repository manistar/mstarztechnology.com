<?php require_once "include/auth-ini.php"; ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Form</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        
        <div class="container">
            <div class="login-card">
            <!-- <br /><br /><br /> -->
                <h1 class="title">Create Your Account</h1>
                <!-- <p class="subtitle">Create Your Account</p> -->

                <form action="passer" id="foo" onsubmit="return false">
                    <div class="input-group">
                        <?= $c->create_form($user_registration); ?>
                    </div>
                    <input type="hidden" name="userRegister" value="">
                    <div id="custommessage"></div>

                    <!-- <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="remember" required>
                        <label class="custom-control-label" for="remember">I agree with this <a href="#">terms &
                                conditions</a>.</label>
                    </div> -->
                    
                    <input type="submit" class="login-btn" value="REGISTER">
                    <p class="register-text">
                        Already have an account? <a href="login">Login</a>.
                    </p>
                </form>

            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/my.js"></script>
    </body>

</html>