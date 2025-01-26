<?php
include 'adminbar.php';
include 'config.php';

// Fetch series from the database
$sql = "SELECT * FROM seriess";  
$result = mysqli_query($conn, $sql);

// Organize series by seriesname
$seriesByName = [];
while ($row = mysqli_fetch_assoc($result)) {
    $seriesname = $row['seriesname'];
    if (!isset($seriesByName[$seriesname])) {
        $seriesByName[$seriesname] = [];
    }
    $seriesByName[$seriesname][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
        }
        .series-card {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            overflow: hidden;
        }
        .series-card:hover {
            transform: translateY(-5px);
        }
        .series-card .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.25rem;
            font-weight: 600;
            padding: 15px;
        }
        .series-card .card-body {
            padding: 15px;
            background-color: #ffffff;
        }
        .series-card .card-footer {
            background-color: #f7f9fc;
            padding: 10px;
        }
        .series-card .btn {
            width: 100%;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .series-card .btn:hover {
            background-color: #0056b3;
            color: white;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        @media (min-width: 992px) {
            .card-container {
                display: flex;
                flex-wrap: wrap;
            }
            .card-container .col-md-6 {
                margin-bottom: 20px;
            }
            .card-container .card {
                flex: 1 1 calc(33.333% - 20px);
                margin-right: 20px;
                margin-bottom: 20px;
            }
            .card-container .card:nth-child(3n) {
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Series List</h1>
        <div class="row card-container">
            <?php foreach ($seriesByName as $seriesname => $matches): ?>
                <div class="col">
                    <div class="card series-card">
                        <div class="card-header">
                            <?php echo htmlspecialchars($seriesname); ?>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Match Details</th>
                                        <th>Time</th>
                                        <th>Venue</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($matches as $match): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($match['id']); ?></td>
                                            <td><?php echo htmlspecialchars($match['date']); ?></td>
                                            <td><?php echo isset($match['matchsetails']) ? htmlspecialchars($match['matchsetails']) : 'N/A'; ?></td>
                                            <td><?php echo htmlspecialchars($match['time']); ?></td>
                                            <td><?php echo htmlspecialchars($match['venue']); ?></td>
                                            <td>
                                                <a href='update_series.php?id=<?php echo $match["id"]; ?>' class='btn btn-warning btn-sm'>Update</a>
                                                <a href='delete_series.php?id=<?php echo $match["id"]; ?>' class='btn btn-danger btn-sm' onclick='return confirm("Are you sure you want to delete this series?");'>Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
