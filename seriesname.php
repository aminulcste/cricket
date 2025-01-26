<?php
include 'config.php'; // Ensure config.php is included to establish the DB connection
include 'adminbar.php';

// Fetch distinct series from the database
$sql = "
    SELECT MIN(id) AS id, seriesname
    FROM seriess
    GROUP BY seriesname
";  // Query to get unique series names and their corresponding IDs

$result = mysqli_query($conn, $sql);

if (!$result) {
    // Handle query error
    die("Database query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series List</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Series List</h1>
        <div class="card mb-4">
            <div class="card-header">Series</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Series Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Example URL assignment based on series name
                                $seriesName = htmlspecialchars($row['seriesname']);
                                $seriesId = htmlspecialchars($row['id']);
                                
                                // Generate the URL dynamically
                                $detailsUrl = "series_details.php?seriesid=" . urlencode($seriesId);
                                
                                echo "<tr>";
                                echo "<td>" . $seriesId . "</td>";
                                echo "<td><a href='" . $detailsUrl . "'>" . $seriesName . "</a></td>";
                                echo "<td>
                                        <a href='update_series.php?id=" . $seriesId . "' class='btn btn-warning btn-sm'>Update</a>
                                        <a href='delete_series.php?id=" . $seriesId . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this series?\");'>Delete</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3' class='text-center'>No series found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
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

<?php
// Close the database connection
mysqli_close($conn);
?>
