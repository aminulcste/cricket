<?php
include 'config.php';
include 'adminbar.php';

// Retrieve existing series (if necessary)
$sql = "SELECT * FROM seriess";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Add Series</h1>

        <!-- Add Upcoming Series Form -->
        <div class="card mb-4">
            <div class="card-header">Add Upcoming Series</div>
            <div class="card-body">
            <form action="add_series.php" method="post">
    <div class="form-group">
        <label for="seriesName">Series</label>
        <input type="text" class="form-control" id="seriesName" name="seriesName" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Series</button>
</form>

            </div>
        </div>

        <!-- Button to Admin Index Page -->
        <div class="text-center">
            <a href="adminIndex.php" class="btn btn-secondary">Go to Admin Panel</a>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
