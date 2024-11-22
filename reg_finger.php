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

        <!-- Registration Section -->
        <div class="auth-section">
            <h3>Register Fingerprint</h3>
            <form id="registerForm" action="passer" method="POST">
                <input type="hidden" name="fingerprint_auth" value="register">
                <!-- <input type="email" id="registerEmail" name="email" placeholder="Enter your email" required> -->
                <div id="registerFingerprint" class="fingerprint-button">
                    <!-- <span>Touch to Register</span> -->
                </div>
            </form>
        </div>

        <div id="message"></div>
    </div>

    <script src="js/fingerprint.js"></script>
</body>
</html>