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
    <h1 class="text-center">Add Player</h1>
    <div class="card mb-4">
        <div class="card-header">Add Player</div>
        <div class="card-body">
            <form action="add_players.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="teamName">Team Name:</label>
                    <input type="text" class="form-control" id="teamName" name="teamName" required>
                </div>
               


             



                <div class="form-group">
                    <label for="playerName">Player Name:</label>
                    <input type="text" class="form-control" id="playerName" name="playerName" required>
                </div>
                <div class="form-group">
                    <label for="birth">Date of Birth:</label>
                    <input type="date" class="form-control" id="birth" name="birth" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <input type="text" class="form-control" id="role" name="role" required>
                </div>
                <div class="form-group">
                    <label for="battingStyle">Batting Style:</label>
                    <input type="text" class="form-control" id="battingStyle" name="battingStyle">
                </div>
                <div class="form-group">
                    <label for="bowlingStyle">Bowling Style:</label>
                    <input type="text" class="form-control" id="bowlingStyle" name="bowlingStyle">
                </div>
                <div class="form-group">
                    <label for="matchesPlayed">Matches Played:</label>
                    <input type="number" class="form-control" id="matchesPlayed" name="matchesPlayed">
                </div>
                <div class="form-group">
                    <label for="runsScored">Runs Scored:</label>
                    <input type="number" class="form-control" id="runsScored" name="runsScored">
                </div>
                <div class="form-group">
                    <label for="wicketsTaken">Wickets Taken:</label>
                    <input type="number" class="form-control" id="wicketsTaken" name="wicketsTaken">
                </div>
                <div class="form-group">
                    <label for="playerImage">Player Image:</label>
                    <input type="file" class="form-control-file" id="playerImage" name="playerImage" required>
                </div>
                <div class="form-group">
                    <label for="profile">Profile Description:</label>
                    <textarea class="form-control" id="profile" name="profile"></textarea>
                </div>
                <button type="submit" value="save" class="btn btn-primary">Add Player</button>
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
