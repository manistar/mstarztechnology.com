<?php require_once "include/auth-ini.php"; ?>

<!-- HTML form to reset the password -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #1A1A2E;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .reset-container {
                background-color: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
            }

            h2 {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }

            label {
                font-size: 16px;
                margin-bottom: 8px;
                color: #555;
            }

            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                color: #333;
            }

            button {
                width: 100%;
                padding: 12px;
                background-color: #4CAF50;
                color: white;
                font-size: 16px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            button:hover {
                background-color: #45a049;
            }

            .message {
                text-align: center;
                color: red;
                margin-top: 20px;
            }

            .success {
                text-align: center;
                color: green;
                margin-top: 20px;
            }
        </style>
    </head>

    <body>

        <div class="reset-container">
            <h2>Reset Your Password</h2>

            <form action="passer" id="foo" class="login-form" onsubmit="return false">
                
                <!-- <label for="new_password">New Password:</label> -->
                <div class="form-group">
                    <!-- <span class="icon">👤</span> -->
                    <?= $c->create_form($pass); ?>
                </div>
                <input type="hidden" name="password" value="">
                <div id="custommessage"></div>
                <button type="submit" class="btn btn-primary btn-block" value="submit">Reset Password</button>
            </form>
        </div>
        <script>
            document.getElementById("foo").addEventListener("submit", function(event) {
                event.preventDefault();  // Prevent the default form submission

                var token = "<?php echo $_GET['token']; ?>"; // Get the token from the URL
                var password = document.querySelector("input[name='password']").value;

                var formData = new FormData();
                formData.append('token', token);
                formData.append('password', password);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "passer", true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        alert(xhr.responseText);
                    } else {
                        alert("Error resetting password.");
                    }
                };
                xhr.send(formData);
            });
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- <script src="js/my.js"></script> -->
    </body>

</html>