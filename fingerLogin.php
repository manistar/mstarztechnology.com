<?php require_once "inis/ini.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fingerprint Authentication</title>
<link rel="stylesheet" href="css/fingerprint.css">
</head>
<body>
    <div class="container">
        <h2>Fingerprint Authentication</h2>

        <!-- Login Section -->
        <div class="auth-section">
            <h3>Login with Fingerprint</h3>
            <form id="loginForm" action="passer" method="POST">
                <input type="hidden" name="fingerprint_auth" value="login">
                <!-- <input type="email" id="loginEmail" name="login_email" placeholder="Enter your email" required> -->
                <div id="loginFingerprint" class="fingerprint-button">
                    <!-- <span>Touch to Login</span> -->
                </div>
            </form>
        </div>

        <div id="message"></div>
    </div>

    <script src="js/fingerprint.js"></script>
</body>
</html>