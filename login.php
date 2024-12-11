<?php require_once "include/auth-ini.php"; ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://accounts.google.com/gsi/client" async defer></script>
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
                        New to Login? <a href="register">Register Here</a>
                    </p>

                    <!-- Google SignIn -->
                    <!-- <div id="g_id_onload"
                        data-client_id="493309155609-osgql5qa7k30ea85impbqfp7oqb3l02l.apps.googleusercontent.com"
                        data-login_uri="https://mstarztech.com/auth/callback"></div>
                    <div class="g_id_signin" data-type="standard"></div> -->

                    <div id="g_id_onload"
                        data-client_id="109908398316-4qh8o3a339uqtrrtr5ngmi90mtdocop1.apps.googleusercontent.com"
                        data-callback="handleCredentialResponse" data-auto_prompt="false">
                    </div>
                    <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline"
                        data-text="signin_with" data-size="large" data-logo_alignment="left">
                    </div>

                </form>
            </div>
        </div>
        <!-- <script src="https://accounts.google.com/gsi/client" async defer></script> -->
        <!-- End of Google Call -->
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/my.js"></script>
        <script>
            // function handleCredentialResponse(response) {
            //     // Send the token to your server to handle the login
            //     fetch('/google_callback', {
            //         method: 'POST',
            //         headers: { 'Content-Type': 'application/json' },
            //         body: JSON.stringify({ token: response.credential })
            //     })
            //         .then(res => res.json())
            //         .then(data => {
            //             if (data.success) {
            //                 // Redirect or update the UI to indicate a successful login
            //                 window.location.href = "/dashboard";
            //             } else {
            //                 alert("Google login failed.");
            //             }
            //         });
            // }

            function handleCredentialResponse(response) {
    fetch('function/server', {  // Ensure the correct file extension is used
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ token: response.credential })
    })
        .then(res => {
            if (!res.ok) {  // Check if the response is OK
                throw new Error('Network response was not ok');
            }
            return res.json();  // Parse the JSON only if response is ok
        })
        .then(data => {
            console.log(data);
            if (data.success) {
                window.location.href = data.redirect;
            } else {
                alert(data.message || "Google login failed.");
            }
        })
        .catch(err => console.error("Error:", err));
}


        </script>
    </body>

</html>