<?php
include 'header.php';
include 'matches.php';
include 'config.php';


// Fetch teams for each ranking type, ordered by rank
$sql_test = "SELECT * FROM rank ORDER BY test ASC"; // Ordering by 'test' for Test Rankings
$result_test = mysqli_query($conn, $sql_test);

$sql_odi = "SELECT * FROM rank ORDER BY odi ASC"; // Ordering by 'odi' for ODI Rankings
$result_odi = mysqli_query($conn, $sql_odi);

$sql_t20 = "SELECT * FROM rank ORDER BY t20 ASC"; // Ordering by 't20' for T20 Rankings
$result_t20 = mysqli_query($conn, $sql_t20);

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
        <h1 class="text-center">Team List</h1>
        
        <!-- Row for tables -->
        <div class="row">
            <!-- Test Ranking Table -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">Test Rankings</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    
                                    <th>Team Name</th>
                                    <th>Test</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result_test) > 0) {
                                    while ($row = mysqli_fetch_assoc($result_test)) {
                                        echo "<tr>";
                                       
                                        echo "<td>" . $row['team'] . "</td>";
                                        echo "<td>" . $row['test'] . "</td>";
                                       
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>No Test rankings found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- ODI Ranking Table -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">ODI Rankings</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    
                                    <th>Team Name</th>
                                    <th>ODI</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result_odi) > 0) {
                                    while ($row = mysqli_fetch_assoc($result_odi)) {
                                        echo "<tr>";
                                       
                                        echo "<td>" . $row['team'] . "</td>";
                                        echo "<td>" . $row['odi'] . "</td>";
                                       
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>No ODI rankings found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- T20 Ranking Table -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">T20 Rankings</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Team Name</th>
                                    <th>T20</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result_t20) > 0) {
                                    while ($row = mysqli_fetch_assoc($result_t20)) {
                                        echo "<tr>";
                                       
                                        echo "<td>" . $row['team'] . "</td>";
                                        echo "<td>" . $row['t20'] . "</td>";
                                       
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>No T20 rankings found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>

