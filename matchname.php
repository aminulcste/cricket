<?php
include 'adminbar.php';


// Fetch teams from the database
$sql = "SELECT * FROM featurematches";  // Assuming your table name is `featurematches`
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match List</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Match List</h1>
        <div class="card mb-4 shadow-sm">
            <div class="card-header ">Match Details</div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Team 1</th>
                            <th>Team 2</th>
                            <th>Team 1 Score</th>
                            <th>Team 2 Score</th>
                            <th>Result</th>
                            <th>Actions</th>   
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['team1'] . "</td>";
                                echo "<td>" . $row['team2'] . "</td>";
                                echo "<td>" . $row['team1score'] . "</td>";
                                echo "<td>" . $row['team2score'] . "</td>";
                                echo "<td>" . $row['result'] . "</td>";
                                echo "<td>
                                        <a href='update_match.php?id=" . $row['fid'] . "' class='btn btn-warning btn-sm'>Update</a>
                                        <a href='delete_match.php?id=" . $row['fid'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this match?\");'>Delete</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No matches found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center mb-4">
        <a href="adminIndex.php" class="btn btn-secondary">Go to Admin Panel</a>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
