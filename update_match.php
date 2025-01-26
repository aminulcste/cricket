<?php
include 'header.php';
include 'matches.php';
include 'featurematch.php';

// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint");
$s_id = $_GET['id'];
$sql = "SELECT * FROM featurematches WHERE fid={$s_id}";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Series</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Update Match</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form class="card p-4 shadow-sm" action="updatematch.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="mheading">Team1</label>
        <input type="hidden" name="fid" value="<?php echo $row['fid']; ?>"/>
        <input type="text" class="form-control" id="mheading" name="t1" value="<?php echo $row['team1']; ?>" required/>
    </div>
    <div class="form-group">
        <label for="snewss">Team2</label>
        <input type="text" class="form-control" id="snewss" name="t2" value="<?php echo $row['team2']; ?>" required/>
    </div>
    <div class="form-group">
        <label for="snewss">Team1Score</label>
        <input type="text" class="form-control" id="snewss" name="t1s" value="<?php echo $row['team1score']; ?>" required/>
    </div>
    <div class="form-group">
        <label for="snewss">Team2Score </label>
        <input type="text" class="form-control" id="snewss" name="t2s" value="<?php echo $row['team2score']; ?>" required/>
    </div>
    <div class="form-group">
        <label for="snewss">Result</label>
        <input type="text" class="form-control" id="snewss" name="res" value="<?php echo $row['result']; ?>" required/>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>
        <?php
            }
        } else {
            echo "<div class='alert alert-danger'>No team found with this ID.</div>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>