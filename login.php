<?php
require_once 'config.php';
session_start();

// Check if the user is already logged in
if (isset($_SESSION['email'])) {
    // User is already logged in, redirect to the content page
    header("Location: content.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'ehssg');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the query
    $sql = "SELECT * FROM mytable WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        // User exists, verify the password
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            // Password is correct, set the session variables and redirect to the content page
            $_SESSION['email'] = $email;
            header("Location: content.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid email or password.";
        }
    } else {
        // User does not exist
        echo "Invalid email or password.";
    }

    mysqli_close($con);
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
        <form method="post" action="">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required/>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" required/>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="btn" value="Login" />
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
