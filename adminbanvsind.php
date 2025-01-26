<?php
include 'config.php';
include 'adminbar.php';

// Fetch all distinct series names
$sql = "SELECT DISTINCT seriesname FROM seriess";
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
        body {
            background-color: #f2f5f9;
        }
        .custom-table {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        .custom-table thead th {
            background-color: #17a2b8;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 12px;
        }
        .custom-table tbody tr {
            transition: all 0.3s ease;
        }
        .custom-table tbody tr:hover {
            background-color: #e3f2fd;
            transform: scale(1.02);
            cursor: pointer;
        }
        .custom-table td {
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .btn-update {
            background-color: #28a745;
            color: #ffffff;
            border-radius: 4px;
            padding: 5px 10px;
            text-decoration: none;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #ffffff;
            border-radius: 4px;
            padding: 5px 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<?php
    // Loop through each series
    while ($seriesRow = mysqli_fetch_assoc($result)) {
        $seriesname = $seriesRow['seriesname'];

        // Fetch all matches for the current series
        $sqlMatches = "SELECT * FROM seriess WHERE seriesname = '$seriesname'";
        $resultMatches = mysqli_query($conn, $sqlMatches);
?>

    <section class="py-3 bg-light">
        <div class="container">
            <h3 class="text-center"><?php echo htmlspecialchars($seriesname); ?></h3>
        </div>
    </section>

    <section class="container mt-5">
        <div class="table-responsive">
            <table class="table custom-table table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Match Details</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($resultMatches)) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td><?php echo htmlspecialchars($row['matchsetails']); ?></td> <!-- Corrected column name -->
                        <td><?php echo htmlspecialchars($row['time']); ?></td>
                        <td><?php echo htmlspecialchars($row['venue']); ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="update_matchess.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn-update">Update</a>
                                <a href="delete_matchess.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this match?');">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

<?php
    }
?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
} else {
    echo "<p>No series found.</p>";
}
?>
