<?php
include 'config.php';

include 'header.php';
include 'matches.php';// Include database configuration
// Include database configuration

// Fetch player data from the database
$playerId = $_GET['id']; // Assuming you are passing the player ID via URL
$query = "SELECT * FROM players WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $playerId);
$stmt->execute();
$result = $stmt->get_result();
$player = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
 
    <div class="row">
        <div class="col-md-4 text-center">
            <!-- Player Image -->
            <img src="uploads/<?php echo $player['image']; ?>" alt="<?php echo $player['playername']; ?>" class="img-fluid rounded-circle">
        </div>
        <div class="col-md-8">
            <!-- Player Profile Information -->
            <h2><?php echo $player['playername']; ?></h2>
            <p><strong>Team:</strong> <?php echo $player['teamname']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo date('d M, Y', strtotime($player['birth'])); ?></p>
            <p><strong>Role:</strong> <?php echo $player['role']; ?></p>
            <p><strong>Batting Style:</strong> <?php echo $player['batting_style']; ?></p>
            <p><strong>Bowling Style:</strong> <?php echo $player['bowling_style']; ?></p>
            <p><strong>Matches Played:</strong> <?php echo $player['matches_played']; ?></p>
            <p><strong>Runs Scored:</strong> <?php echo $player['runs_scored']; ?></p>
            <p><strong>Wickets Taken:</strong> <?php echo $player['wickets_taken']; ?></p>
            <p><strong>Profile:</strong> <?php echo $player['profile']; ?></p>
        </div>
    </div>
</div>

<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
