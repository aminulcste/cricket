<?php
include 'config.php';
include 'adminbar.php';

// Fetch data from rank table
$sql = "SELECT * FROM rank";
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
    <div class="container">
        <h1 class="text-center">Add News</h1>
        <div class="card mb-4">
            <div class="card-header">Add News</div>
            <div class="card-body">
                <form action="add_ranking.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="newsHead">Team:</label>
                        <input type="text" class="form-control" id="newsHead" name="team" required>
                    </div>
                    <div class="form-group">
                        <label for="newsTitle">Test:</label>
                        <input type="text" class="form-control" id="newsTitle" name="test" required>
                    </div>
                    <div class="form-group">
                        <label for="newsTitle">Odi:</label>
                        <input type="text" class="form-control" id="newsTitle" name="odi" required>
                    </div>
                    <div class="form-group">
                        <label for="newsTitle">T20:</label>
                        <input type="text" class="form-control" id="newsTitle" name="t20" required>
                    </div>
                    <button type="submit" value="save" class="btn btn-primary">Add Ranking</button>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="adminIndex.php" class="btn btn-secondary">Go to Admin Panel</a>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
