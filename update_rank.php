<?php
include 'adminbar.php';

// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint");

// Check if ID is provided
if (isset($_GET['id'])) {
    $t_id = intval($_GET['id']); // Sanitize input
    $sql = "SELECT * FROM rank WHERE id={$t_id}";
    $result = mysqli_query($conn, $sql);
}
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
        if (isset($result) && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form class="card p-4 shadow-sm" action="updaterank.php" method="post">
            <div class="form-group">
                <label for="team">Team Name</label>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                <input type="text" class="form-control" id="team" name="team" value="<?php echo $row['team']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="test">Test</label>
                <input type="text" class="form-control" id="test" name="test" value="<?php echo $row['test']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="odi">ODI</label>
                <input type="text" class="form-control" id="odi" name="odi" value="<?php echo $row['odi']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="t20">T20</label>
                <input type="text" class="form-control" id="t20" name="t20" value="<?php echo $row['t20']; ?>" required/>
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
