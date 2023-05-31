<?php
require_once 'config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM mytable WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        session_start();
        // Store login status in session
        $_SESSION["loggedin"] = true;
        
        // Redirect to the content page
        header("Location: content.php");
        exit();
    } else {
        echo "Invalid Email or Password.";
        // Redirect back to the register page
        header("Location: register.php");
        exit();
    }
}
mysqli_close($conn);
?>


