
<?php require_once "include/auth-ini.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
     <style>
        body {
    background-color: #f0f2f5; /* Change this to your desired background color */
    font-family: 'Poppins', sans-serif;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full height to center vertically */
}

.login-card {
    background-color: #fff; /* Card background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px; /* Limit width */
}

.title {
    text-align: center;
    margin-bottom: 10px;
}

.subtitle {
    text-align: center;
    margin-bottom: 20px;
    color: #666; /* Lighter color for subtitle */
}

.input-group {
    margin-bottom: 15px;
}

.login-btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff; /* Primary button color */
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-btn:hover {
    background-color: #0056b3; /* Darker shade on hover */
}

.register-text {
    text-align: center;
    margin-top: 15px;
}

     </style>
</head>
<body>
<div class="container">
    <div class="login-card">
        <h1 class="title">Register</h1>
        <p class="subtitle">Create Your Account</p>
        <form action="passer" id="foo" class="login-form" onsubmit="return false">
            <div class="input-group">
                <?= $c->create_form($user_registration); ?>
            </div>
            <div class="custom-control custom-checkbox">
                <input type=