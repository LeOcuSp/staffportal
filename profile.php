<?php
require_once 'config.php';

// Assuming you have established a MySQL database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "ehssg";

// Create a PDO instance
$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page or handle accordingly
    header("Location: login.php");
    exit();
}

// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];

// Prepare and execute the database query
$query = "SELECT * FROM tbl_user WHERE user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

// Fetch the user's profile data
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the user exists
if (!$user) {
    // User does not exist, handle accordingly
    echo "User not found";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="./profilestyle.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script>
    $(function() {
        $(".toggle").on("click", function() {
            if ($(".item").hasClass("active")) {
                $(".item").removeClass("active");
            } else {
                $(".item").addClass("active");
            }
        });
    });
    </script>
    <style>
        th {
            border-bottom: 1px solid #364043;
            color: #1D4350;
            font-size: 0.85em;
            font-weight: 600;
            padding: 0.5em 1em;
            text-align: left;
        }
        
        table {
            background:  #3CD500;
            width: 95%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 10px;
            text-align: center;
        }
        
        body {
            background-color: #f8f9fa;
            /* Replace with your desired background color */
        }
        
        .navbar {
            background: linear-gradient(to right, #64e383, #18d649, #00d4ff);
            /* Update with your desired gradient colors */
            color: #fff;
            padding: 10px;
        }
    </style>
</head>
<body>
    <nav class="nav navbar">
        <ul class="menu">
            <li class="logo"><a href="#">Your Profile</a></li>
            <div class="logo"></div>
            <li class="item button"><a href="update.php">Update Profile</a></li>
            <li class="item button"><a href="login.php">Logout</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $user['user_name']; ?></td>
                <td><?php echo $user['user_date']; ?></td>
                <td><?php echo $user['user_email']; ?></td>
                <td><?php echo $user['user_phone']; ?></td>
                <td><?php echo $user['user_position']; ?></td>
                <td><?php echo $user['user_department']; ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
