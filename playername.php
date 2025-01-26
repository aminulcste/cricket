<?php
include 'adminbar.php';
include 'config.php';

$sql = "SELECT * FROM players ";
$result = mysqli_query($conn, $sql);

// Organize players by team name
$playersByTeam = [];
while ($row = mysqli_fetch_assoc($result)) {
    $teamname = $row['teamname'];
    if (!isset($playersByTeam[$teamname])) {
        $playersByTeam[$teamname] = [];
    }
    $playersByTeam[$teamname][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player List</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .player-img {
            width: 80px; /* Reduced width */
            height: 80px; /* Reduced height */
            object-fit: cover;
            border-radius: 8px;
        }
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
        .btn-custom {
            margin: 2px;
        }
        @media (min-width: 992px) {
            .table-container {
                display: flex;
                flex-wrap: wrap;
            }
            .table-container .card {
                flex: 1;
                min-width: calc(33.333% - 20px);
                margin-right: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Player List</h1>
        <div class="table-container">
            <?php foreach ($playersByTeam as $teamname => $players): ?>
                <div class="card">
                    <div class="card-header"><?php echo htmlspecialchars($teamname); ?> Players</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Player Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($players as $row): ?>
                                    <?php
                                    $imagePath = 'uploads/' . $row['image'];
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                                        <td>
    <a href="player_details.php?id=<?php echo urlencode($row['id']); ?>">
        <?php echo htmlspecialchars($row['playername']); ?>
    </a>
</td>
<td>
    <a href="player_details.php?id=<?php echo urlencode($row['id']); ?>">
        <?php if (file_exists($imagePath)): ?>
            <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Player Image" class="player-img">
        <?php else: ?>
            <span class="text-danger">Image not found</span>
        <?php endif; ?>
    </a>
</td>

                                        <td>
                                            <a href="update_player.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-warning btn-sm btn-custom">Update</a>
                                            <a href="delete_player.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm btn-custom" onclick="return confirm('Are you sure you want to delete this player?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
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
