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
   <style >
   th {
        border-bottom: 1px solid #364043;
        color: #E2B842;
        font-size: 0.85em;
        font-weight: 600;
        padding: 0.5em 1em;
        text-align: left;
    }
    table {
        background: #006d6d;
        width: 95%;
        border-collapse: collapse;
    }

    th, td {
        padding: 20px;
        text-align: center;
    }

    body {
            background-color: #f8f9fa; /* Replace with your desired background color */
    }
    .navbar {
            background: linear-gradient(to right, #64e383, #18d649, #00d4ff); /* Update with your desired gradient colors */
            color: #fff;
            padding: px;
        }
    
    </style>
</head>
<body>
<nav class="nav navbar">
        <ul class="menu">
            <li class="logo"><a href="#">Welcome to EHSSG</a></li>
            </li>
            <li class="item button"><a href="profile.php">Your Profile</a></li>
            <li class="item button"><a href="logout.php">Logout</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
</body>
</html>


