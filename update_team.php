<?php
include 'header.php';
include 'matches.php';
include 'featurematch.php';

// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint");
$t_id = $_GET['id'];
$sql = "SELECT * FROM team WHERE id={$t_id}";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Team</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Update Team</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form class="card p-4 shadow-sm" action="updateteam.php" method="post">
            <div class="form-group">
                <label for="tname">Team Name</label>
                <input type="hidden" name="tid" value="<?php echo $row['id']; ?>"/>
                <input type="text" class="form-control" id="tname" name="tname" value="<?php echo $row['teamname']; ?>" required/>
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
