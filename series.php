<?php
include 'header.php';
include 'matches.php';

// Fetch distinct series names from the database
$sql = "SELECT DISTINCT seriesname FROM seriess";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series List</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.25rem;
            font-weight: bold;
        }
        .table {
            margin-bottom: 0;
        }
        .thead-dark th {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Series List</h1>
        <div class="table-container">
            <div class="card">
                <div class="card-header">Available Series</div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <li class="list-group-item">
                                <a href="series_detail.php?name=<?php echo urlencode($row['seriesname']); ?>">
                                    <?php echo htmlspecialchars($row['seriesname']); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="adminIndex.php" class="btn btn-secondary">Go to Admin Panel</a>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
