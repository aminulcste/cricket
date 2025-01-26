<?php

include 'adminbar.php';  // Including the admin bar for navigation
include 'config.php';  // Including the database configuration

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Player</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center">Add Record</h1>
    <div class="card mb-4">
        <div class="card-header">Add Record</div>
        <div class="card-body">
            <form action="add_records.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="teamName">Team Name:</label>
                    <input type="text" class="form-control" id="teamName" name="teamname" required>
                </div>
                <div class="form-group">
                    <label for="playerName">Matches:</label>
                    <input type="text" class="form-control" id="playerName" name="matches" required>
                </div>
=
                <div class="form-group">
                    <label for="playerName">Won:</label>
                    <input type="text" class="form-control" id="playerName" name="won" required>
                </div>
                <div class="form-group">
                    <label for="birth">Lost:</label>
                    <input type="" class="form-control" id="" name="lost" required>
                </div>
                <div class="form-group">
                    <label for="role">Drawn:</label>
                    <input type="text" class="form-control" id="role" name="drawn" required>
                </div>
                <div class="form-group">
                    <label for="battingStyle">Point:</label>
                    <input type="text" class="form-control" id="battingStyle" name="point">
                </div>
               
                <button type="submit" value="save" class="btn btn-primary">Add Record</button>
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
