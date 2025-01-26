<?php
include 'config.php';
?>
<?php
  $sql2="select seriesname from series";
  $result2=mysqli_query($conn,$sql2) or die("query failed");
  if(mysqli_num_rows($result2)>0){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Navbar Styles */
        .navbar {
            background-color: #1c2331; /* Darker background */
        }
        .navbar-brand {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1.5rem;
            color: #00bcd4 !important; /* Stylish teal color */
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-size: 1.1rem;
            padding-right: 20px;
        }
        .navbar-nav .nav-link:hover {
            color: #00bcd4 !important; /* Hover effect */
            background-color: transparent;
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=UTF8,%3Csvg xmlns%3D"http://www.w3.org/2000/svg" viewBox%3D"0 0 30 30"%3E%3Cpath stroke%3D"%23ffffff" stroke-width%3D"2" d%3D"M4 7h22M4 15h22M4 23h22"%3E%3C/path%3E%3C/svg%3E');
        }
        .navbar-nav .nav-item.active .nav-link {
            color: #00bcd4 !important; /* Active link color */
        }
        .navbar-nav .nav-item.active .nav-link:hover {
            background-color: #00bcd4;
            color: #ffffff !important;
            border-radius: 5px;
        }
        .navbar-nav.ml-auto .nav-link {
            background-color: #00bcd4;
            color: #ffffff !important;
            border-radius: 5px;
            padding: 8px 15px;
            margin-left: 15px;
        }
        .navbar-nav.ml-auto .nav-link:hover {
            background-color: #008c9e;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="adminIndex.php">Cricpoint Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="score.php">Score</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminnews.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminseries.php">Series</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Archives</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teamname.php">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rankname.php">Ranking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminsearch.php">Search</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
<?php
  }
?>