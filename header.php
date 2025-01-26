<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="img/cricket-logo-png-7553.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <title>CricPoint</title>
  <style>
    .match {
        border: 1px solid #ccc;
        margin: 10px;
        padding: 10px;
        border-radius: 5px;
    }
  </style>
</head>
<body>
  
<?php
// Fetch data from the 'team' table
$sql = "SELECT teamname FROM team";
$result = mysqli_query($conn, $sql) or die("Query failed");
if (mysqli_num_rows($result) > 0) {
    // Fetch data from the 'ranking' table
    $sql1 = "SELECT rankname FROM ranking";
    $result1 = mysqli_query($conn, $sql1) or die("Query failed");
    if (mysqli_num_rows($result1) > 0) {
        // Fetch data from the 'series' table
        $sql2 = "SELECT DISTINCT seriesname, id FROM seriess";
        $result2 = mysqli_query($conn, $sql2) or die("Query failed");
        if (mysqli_num_rows($result2) > 0) {
            // Fetch data from the 'more' table
            $sql3 = "SELECT morename FROM more";
            $result3 = mysqli_query($conn, $sql3) or die("Query failed");
            if (mysqli_num_rows($result3) > 0) {
                ?>
                <header>
                    <nav class="navbar navbar-expand-lg navbar- bg-success">
                        <div class="container-fluid">
                            <a style="font-size: 25px;color: white;font-weight: 700;" id="criclogo" class="navbar-brand" href="index.php">CricPoint</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <div id="" class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="userscore.php">Live Score</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="news.php">News</a>
                                    </li>
                                    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Series
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
        // Fetch unique series names from the 'seriess' table
        $sql2 = "SELECT DISTINCT seriesname FROM seriess";
        $result2 = mysqli_query($conn, $sql2) or die("Query failed");

        // Generate the dropdown menu items
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $seriesName = $row2['seriesname'];

            // Display the series name in the dropdown menu
            // Note: You might want to fetch the ID in a separate query or include it in the DISTINCT query if needed
            echo '<li><a class="dropdown-item" href="series_detail.php?name=' . urlencode($seriesName) . '">' . htmlspecialchars($seriesName) . '</a></li>';
        }
        ?>
    </ul>
</li>


                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Archives</a>
                                    </li>
                                    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Team
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
        include 'config.php';
        $sql = "SELECT DISTINCT teamname FROM players";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $teamname = $row['teamname'];
            $url = "pname.php?team=" . urlencode($teamname);
            echo '<li><a class="dropdown-item" href="' . htmlspecialchars($url) . '">' . htmlspecialchars($teamname) . '</a></li>';
        }
        ?>
    </ul>
</li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Ranking
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                echo '<li><a class="dropdown-item" href="userrank.php">' . $row1['rankname'] . '</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            More
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                echo '<li><a class="dropdown-item" href="wtc.php">' . $row3['morename'] . '</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                                                                <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="shop.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Shop
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="shop.php">Category</a></li>
                                                    <li><a class="dropdown-item" href="allcart.php">Cart</a></li>
                                                    <li><a class="dropdown-item" href="userorder.php">Order</a></li>
                                                </ul>
                                            </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="signup.php" tabindex="-1" aria-disabled="true">Signup</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Logout</a>
                                    </li>
                                </ul>
                                <form method="get" action="p_serach.php" class="d-flex">
                                      
                                        <button class="btn btn-dark" type="submit">Search</button>
                                </form>


                            </div>
                        </div>
                    </nav>
                </header>
                <?php
            }
        }
    }
}
mysqli_close($conn);
?>


</body>
</html>
