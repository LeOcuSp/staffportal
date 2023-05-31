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
    </div>
    <div class="container">
        <form method="post" action="login.php">
            <!-- Login form content -->

                     <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" required/>
                    </div>
            
            
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="phone" class="form-control" name="phone" required/>
                    </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="btn" value="Login">
            </div>
        </form>

        <form method="post" action="register.php">
            <!-- Registration form content -->

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="btn" value="Register">
            </div>
        </form>

        <form method="post" action="forgot_password.php">
            <!-- Forgot password form content -->

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="btn" value="Forgot Password">
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
