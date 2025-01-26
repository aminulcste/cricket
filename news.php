<?php
include 'header.php';
include 'matches.php';
include 'featurematch.php';
include 'config.php';

$sql = "SELECT * FROM midnews";  // Assuming your table name is `midnews`
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the news cards */
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .card-title {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1.25rem;
            font-weight: bold;
            color: #007bff;
        }
        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }
        .card-body {
            padding: 20px;
            background-color: #ffffff;
        }
        .text-muted {
            font-size: 0.875rem;
        }
        h1.text-center {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #343a40;
            margin-bottom: 30px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1 class="text-center">Latest News</h1>
        <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card mb-4'>";
                    echo "<img src='" . $row['mimage'] . "' class='card-img-top' alt='News Image'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['mhead'] . "</h5>";
                    echo "<p class='card-text'>" . substr($row['mnews'], 0, 100) . "...</p>";
                    echo "<p class='card-text'>" . $row['mcontent'] . "</p>";
                    echo "<p class='card-text'><small class='text-muted'>" . $row['snews'] . "</small></p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div class='col-12'><p class='text-center'>No news found</p></div>";
            }
            ?>
        </div>
    </div>
   
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
