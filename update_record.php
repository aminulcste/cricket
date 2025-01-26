<?php
include 'adminbar.php';

// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("Connection failed");

$id = $_GET['id'];
$sql = "SELECT * FROM wtc WHERE id={$id}";
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
        <h2 class="text-center mb-4">Update Record</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form class="card p-4 shadow-sm" action="updaterecord.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="mid" value="<?php echo $row['id']; ?>"/>

            <div class="form-group">
                <label for="teamname">Team</label>
                <input type="text" class="form-control" id="teamname" name="teamname" value="<?php echo $row['teamname']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="playername">Matches</label>
                <input type="text" class="form-control" id="playername" name="matches" value="<?php echo $row['matches']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="birth">Won</label>
                <input type="" class="form-control" id="birth" name="won" value="<?php echo $row['won']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="birth">Lost</label>
                <input type="" class="form-control" id="birth" name="lost" value="<?php echo $row['lost']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="role">Drawn</label>
                <input type="text" class="form-control" id="role" name="drawn" value="<?php echo $row['drawn']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="batting_style">Point</label>
                <input type="text" class="form-control" id="batting_style" name="point" value="<?php echo $row['point']; ?>"/>
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

