<?php
$con = mysqli_connect('localhost', 'root', '', 'ehssg');
if ($con) {
    echo('');
} else {
    echo('Failed to connect');
}
if (isset($_POST['btn'])) {
    $user_name = $_POST['user_name'];
    $user_date = $_POST['user_date'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $user_password = $_POST['user_password'];

    $hashedPassword = password_hash($user_password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_user (user_id, user_name, user_date, user_email, user_phone, user_password) 
            VALUES (NULL, '$user_name', '$user_date', '$user_email', '$user_phone', '$hashedPassword')";

    if ($con->query($sql) === TRUE) {
        echo('Registration Success');
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    header("Location: login.php");
exit();
}
$con->close();
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
                <form class="" user_id="" user_name="" method="post" action="">

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="user_name" required/>
                    </div>

                    <div class="form-group">
                        <label>Date of birth:</label>
                        <input type="date" class="form-control" name="user_date" required onChange="form.pass2.pattern=this.value" />
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="user_email" required/>
                    </div>

                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="phone" class="form-control" name="user_phone" required/>
                    </div>

                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="user_password" required onChange="form.pass2.pattern=this.value" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="btn" value="Register" />
                    </div>

                    <a href="login.php" class="btn btn-primary">Back to Login</a> <br /><br />

                    <input type="hidden" name="op" value="save" />
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>


