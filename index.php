<?php
include_once "config.php";
$host = "localhost";
$username = "root";
$password = "";
$database = "ehssg";

// Establish a database connection (example using MySQLi)
$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    // Handle database connection error
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_POST["btn_login"])) {
        // Query the database to check if the user exists
        $query = "SELECT * FROM mytable WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            // User exists, validate the password
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                // Password is correct, perform login logic here
                // For example, set session variables and redirect to content.php
                session_start();
                $_SESSION['id'] = $user['id'];
                header("Location: navbar.php");
                exit();
            } else {
                // Password is incorrect, display an error message
                echo "Invalid password";
            }
        } else {
            // User does not exist, display an error message or redirect to an error page
            echo "User not found";
        }
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

// Close the database connection
mysqli_close($connection);
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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                </li>
            </ul>
        </div>
    </div>
</nav>
<title>EHSSG Staff Portal</title>
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
    }
</style>
<div class="header">
    <h1>EHSSG STAFF PORTAL</h1>
</div>
<div class="container">
    <form method="post" action="" id="loginForm">
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" required/>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" required/>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="btn_login" value="Login" />
            <input type="submit" class="btn btn-primary" name="btn_register" value="Register" />
            <input type="submit" class="btn btn-primary" name="btn_forgot_password" value="Forgot Password" />
        </div>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    // Set the form action dynamically based on the button clicked
    document.querySelectorAll('input[type="submit"]').forEach(function(element) {
        element.addEventListener('click', function() {
            document.getElementById('loginForm').action = this.formAction;
        });
    });
</script>
</body>
</html>
