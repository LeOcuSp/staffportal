<?php
require_once 'config.php';
require_once 'config.php';
// Assuming you have established a MySQL database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "ehssg";

// Create a PDO instance
$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
session_start();

require_once 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated values from the form
    $name = $_POST['name'];
    $position = $_POST['position'];
    $department = $_POST['department'];

    // Retrieve the user ID from the session
    $id = $_SESSION['id'];

    // Prepare and execute the database query to update the data
    $query = "UPDATE mytable SET name = :name, position = :position, department = :department WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':id', $id);

    // Execute the update query
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        // Update successful
        // Redirect to the profile.php page
        header("Location: profile.php");
        exit();
    } else {
        // Update failed, handle accordingly
        echo "You Have Not Done Any Changes.";
    }
}
// Fetch the user data from the database
$id = $_SESSION['id'];
$query = "SELECT * FROM mytable WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <style>
.department-select {
            width: 200px; /* Adjust the width as desired */
            height: 30px;
        }
nav {
            background: linear-gradient(to right, #64e383, #18d649, #00d4ff); /* Update with your desired gradient colors */
            color: #fff;
            padding: 1px;
        }
.menu li {
    font-size: 16px;
    padding: 15px 5px;
    white-space: nowrap;
  }
    </style>
</head>
<body>
    <nav>
        <ul class="menu">
            <li class="logo"><a href="#">Update Your Profile</a></li>
            </li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="update.php" method="POST">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="name" value="<?php echo isset($userData['name']) ? $userData['name'] : ''; ?>"></td>
                                <td>
                                    <select name="department" class="department-select">
                                        <option value="Management" <?php if (isset($userData['department']) && $userData['department'] == 'Management') echo 'selected'; ?>>Management</option>
                                        <option value="Account & Finance" <?php if (isset($userData['department']) && $userData['department'] == 'Account & Finance') echo 'selected'; ?>>Account & Finance</option>
                                        <option value="Admin & HR" <?php if (isset($userData['department']) && $userData['department'] == 'Admin & HR') echo 'selected'; ?>>Admin & HR</option>
                                        <option value="IT" <?php if (isset($userData['department']) && $userData['department'] == 'IT') echo 'selected'; ?>>IT</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </td>
                                <td><input type="text" name="position" value="<?php echo isset($userData['position']) ? $userData['position'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="navbar.php" class="btn btn-secondary">Cancel</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div> 
</body>
</html>
