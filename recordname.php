<?php
include 'adminbar.php';
include 'config.php';  // Including the database configuration for connection

// Fetch teams from the database in ascending order of points
$sql = "SELECT * FROM wtc ORDER BY point DESC";  // Sorting teams based on 'point' in ascending order
$result = mysqli_query($conn, $sql);

// Check for any connection issues
if (!$result) {
    echo "Error fetching teams: " . mysqli_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team List</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center">World Test Championship</h1>
        <div class="card mb-4">
            <div class="card-header">Teams</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                           
                            <th>Team Name</th>
                            <th>Matches</th>
                            <th>Won</th>
                            <th>Lost</th>
                            <th>Drawn</th>
                            <th>Points</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                             
                                echo "<td>" . $row['teamname'] . "</td>";
                                echo "<td>" . $row['matches'] . "</td>";
                                echo "<td>" . $row['won'] . "</td>";
                                echo "<td>" . $row['lost'] . "</td>";
                                echo "<td>" . $row['drawn'] . "</td>";
                                echo "<td>" . $row['point'] . "</td>";
                                echo "<td>
                                        <a href='update_record.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Update</a>
                                        <a href='delete_record.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this team?\");'>Delete</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>No teams found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="addrecord.php" class="btn btn-secondary">Add Record</a>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
