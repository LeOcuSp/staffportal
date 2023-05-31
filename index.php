<?php

$con = mysqli_connect('localhost', 'root', '', 'ehssg');
if ($con) {
    echo('');
} else {
    echo('Failed to connect');
}
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_POST["btn_login"])) {
        // Perform login logic here
        // If login is successful, redirect to content.php
        // Otherwise, display an error message or redirect to an error page
        header("Location: content.php");
        exit();
    } elseif (isset($_POST["btn_register"])) {
        // Redirect to register.php
        header("Location: register.php");
        exit();
    } elseif (isset($_POST["btn_forgot_password"])) {
        // Redirect to forgot_password.php
        header("Location: forgot_password.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h1>EHSSG STAFF PORTAL</h1>
        <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .header {
            text-align: center;
            margin-top: 20px; /* Adjust the margin-top value as needed */
        }
    </style>
    </div>
    <div class="container">
        <form method="post" action="">
            <!-- Your form fields for login, registration, forgot password here -->

            <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" required/>
            </div>

            <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="Password" required/>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="btn_login" value="Login" />
            </div>

            <div class="form-group">
              <!--<input type="button" class="btn btn-primary" name="btn_register" value="Register" /> -->
            </div>
            
            <a href="register.php" class="btn btn-primary">Register</a> <br /><br />

            <a href="forgot_password.php" class="btn btn-primary">Forgot Password</a> <br /><br />
            
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>


