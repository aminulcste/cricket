<?php
include 'adminbar.php';

// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("Connection failed");

$m_id = $_GET['id'];
$sql = "SELECT * FROM players WHERE id={$m_id}";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Player</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Update Player</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form class="card p-4 shadow-sm" action="updateplayer.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="mid" value="<?php echo $row['id']; ?>"/>

            <div class="form-group">
                <label for="teamname">Team</label>
                <input type="text" class="form-control" id="teamname" name="teamname" value="<?php echo $row['teamname']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="playername">Player</label>
                <input type="text" class="form-control" id="playername" name="playername" value="<?php echo $row['playername']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="birth">Date of Birth</label>
                <input type="date" class="form-control" id="birth" name="birth" value="<?php echo $row['birth']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $row['role']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="batting_style">Batting Style</label>
                <input type="text" class="form-control" id="batting_style" name="batting_style" value="<?php echo $row['batting_style']; ?>"/>
            </div>
            <div class="form-group">
                <label for="bowling_style">Bowling Style</label>
                <input type="text" class="form-control" id="bowling_style" name="bowling_style" value="<?php echo $row['bowling_style']; ?>"/>
            </div>
            <div class="form-group">
                <label for="matches_played">Matches Played</label>
                <input type="number" class="form-control" id="matches_played" name="matches_played" value="<?php echo $row['matches_played']; ?>"/>
            </div>
            <div class="form-group">
                <label for="runs_scored">Runs Scored</label>
                <input type="number" class="form-control" id="runs_scored" name="runs_scored" value="<?php echo $row['runs_scored']; ?>"/>
            </div>
            <div class="form-group">
                <label for="wickets_taken">Wickets Taken</label>
                <input type="number" class="form-control" id="wickets_taken" name="wickets_taken" value="<?php echo $row['wickets_taken']; ?>"/>
            </div>
            <div class="form-group">
                <label for="profile">Profile Description</label>
                <textarea class="form-control" id="profile" name="profile"><?php echo $row['profile']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="mimage">Upload Image</label>
                <input type="file" class="form-control-file" id="mimage" name="mimages"/>
                <input type="hidden" name="current_image" value="<?php echo $row['image']; ?>">
                <?php if ($row['image']): ?>
                    <img src="uploads/<?php echo $row['image']; ?>" alt="Current Image" width="150">
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php
            }
        } else {
            echo "<div class='alert alert-danger'>No player found with this ID.</div>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

