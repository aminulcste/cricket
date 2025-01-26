<?php
include 'adminbar.php';

// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint");

// Get the series ID from the URL
$s_id = $_GET['id'];

// Fetch the series details for the given ID
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
        <h2 class="text-center mb-4">Update Series</h2>
        
        <?php
        // Check if any series is found
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        
        <!-- Form to update the series details -->
        <form class="card p-4 shadow-sm" action="updateseries.php" method="post">
            <input type="hidden" name="sid" value="<?php echo $row['id']; ?>"/>
            
            <!-- Series Name -->
            <div class="form-group">
                <label for="sname">Series Name</label>
                <input type="text" class="form-control" id="sname" name="sname" value="<?php echo $row['seriesname']; ?>" required/>
            </div>

            <!-- Date -->
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date']; ?>" required/>
            </div>

            <!-- Match Details -->
            <div class="form-group">
                <label for="matchdetails">Match Details</label>
                <input type="text" class="form-control" id="matchdetails" name="matchdetails" value="<?php echo $row['matchsetails']; ?>" required/>
            </div>

            <!-- Time -->
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" value="<?php echo $row['time']; ?>" required/>
            </div>

            <!-- Venue -->
            <div class="form-group">
                <label for="venue">Venue</label>
                <input type="text" class="form-control" id="venue" name="venue" value="<?php echo $row['venue']; ?>" required/>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <?php
            }
        } else {
            echo "<div class='alert alert-danger'>No series found with this ID.</div>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
