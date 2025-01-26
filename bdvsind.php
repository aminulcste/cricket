<?php
include 'config.php';
include 'header.php';
include 'matches.php';

$sql = "SELECT * FROM matchess";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/cricket-logo-png-7553.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Series Schedule</title>
    <style>
        .custom-table {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .custom-table th {
            background-color: #343a40;
            color: white;
        }
        .custom-table tbody tr:nth-child(odd) {
            background-color: #e9ecef;
        }
        .custom-table tbody tr:hover {
            background-color: #dee2e6;
        }
        .navbar-custom {
            background-color: #6c757d;
        }
        .navbar-custom .nav-link {
            color: #f8f9fa;
        }
        .navbar-custom .nav-link:hover {
            color: #adb5bd;
        }
    </style>
</head>
<body>
    <section class="py-3 bg-light">
        <div class="container">
            <h3 class="text-center">
                <?php
                $sql1 = "SELECT * FROM series WHERE sid = 1";
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                    $row1 = mysqli_fetch_assoc($result1);
                    echo $row1['seriesname'];
                }
                ?>
            </h3> 
        </div>
    </section>

    <nav class="navbar navbar-expand-lg navbar-custom mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Schedule</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Videos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Squads</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Photos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Stats</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Venues</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container mt-5">
        <div class="table-responsive">
            <table class="table custom-table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Match Details</th>
                        <th>Time</th>
                        <th>Venue</th>
                       

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <td><?php echo $row['date'] ;?></td>
                        <td><?php echo $row['details'] ;?></td>
                        <td><?php echo $row['time'] ;?></td>
                        <td><?php echo $row['venue'] ;?></td>
                       

                        <?php
                        echo "</tr>";
                            }
                    ?>

                </tbody>
                <!-- <tbody>
                    <?php 
                    while($data = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td> <?php echo $data['date']; ?></td>
                            <td> <?php echo $data['details']; ?></td>
                            <td> <?php echo $data['time']; ?></td>
                            <td> <?php echo $data['venue']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody> -->
            </table>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
}
?>
