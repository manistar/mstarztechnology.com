<?php require_once "include/auth-ini.php"; ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="css/style.css"> -->
        <style>
            body {
                background-color: #1A1A2E;
                /* Light gray background */
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .card {
                background-color: rgb(255, 255, 255);
                /* White card background */
                border: 1px solid rgb(200, 200, 200);
                /* Light gray border */
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .card-header {
                background-color: rgb(109, 9, 9);
                /* Dark red */
                color: white;
                border-bottom: none;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .btn-primary {
                background-color: rgb(109, 9, 9);
                /* Dark red */
                border-color: rgb(109, 9, 9);
            }

            .btn-primary:hover {
                background-color: rgb(150, 30, 30);
                /* Slightly brighter red on hover */
            }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Forgot Password</h3>
                        </div>
                        <div class="card-body">
                            <form action="passer" id="foo" class="login-form" onsubmit="return false">
                                <!-- <div class="form-group">
                                    <label for="email">Enter your email address</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email Address" required>
                                </div> -->
                                <!-- <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button> -->

                                <div class="form-group">
                                    <!-- <span class="icon">👤</span> -->
                                    <?= $c->create_form($forgetPass); ?>
                                </div>
                                <input type="hidden" name="forgetPass" value="">
                                <div id="custommessage"></div>

                                <button type="submit" class="btn btn-primary btn-block" value="submit">Send Reset Link</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/my.js"></script>
    </body>

</html>