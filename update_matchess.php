<?php
include 'adminbar.php';


// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint");
$s_id = $_GET['id'];
$sql = "SELECT * FROM seriess WHERE id={$s_id}";
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
        <form class="card p-4 shadow-sm" action="updatematchess.php" method="post">
            <div class="form-group">
                <label for="tname">Series Name</label>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                <label for="tname">Date</label>
                <input type="date" class="form-control" id="sname" name="date" value="<?php echo $row['date']; ?>" required/>
                <label for="tname">Details</label>
                <input type="text" class="form-control" id="sname" name="details" value="<?php echo $row['matchsetails']; ?>" required/>
                <label for="tname">Time</label>
                <input type="time" class="form-control" id="sname" name="time" value="<?php echo $row['time']; ?>" required/>
                <label for="tname">Venue</label>
                <input type="text" class="form-control" id="sname" name="venue" value="<?php echo $row['venue']; ?>" required/>
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