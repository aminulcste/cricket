<?php
include 'adminbar.php';
$num_matches = isset($_POST['num_matches']) ? intval($_POST['num_matches']) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series Match Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Enter Match Details</h2>

    <?php if ($num_matches == 0): ?>
        <!-- First Form: Ask for number of matches -->
        <form action="" method="post">
            <div class="form-group">
                <label for="num_matches">Number of Matches:</label>
                <input type="number" id="num_matches" name="num_matches" class="form-control" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    <?php else: ?>
        <!-- Second Form: Show fields based on number of matches -->
        <form action="save_matches.php" method="post">
            <input type="hidden" name="num_matches" value="<?= htmlspecialchars($num_matches) ?>">
            <?php for ($i = 1; $i <= $num_matches; $i++): ?>
                <div class="form-group">
                    <h4>Match <?= $i ?></h4>
                    <label for="series_name_<?= $i ?>">Series Name:</label>
                    <input type="text" id="series_name_<?= $i ?>" name="series_name[]" class="form-control" required>
                    <label for="match_date_<?= $i ?>">Date:</label>
                    <input type="date" id="match_date_<?= $i ?>" name="match_date[]" class="form-control" required>
                    <label for="match_details_<?= $i ?>">Match Details:</label>
                    <input type="text" id="match_details_<?= $i ?>" name="match_details[]" class="form-control" required>
                    <label for="match_time_<?= $i ?>">Time:</label>
                    <input type="time" id="match_time_<?= $i ?>" name="match_time[]" class="form-control" required>
                    <label for="match_venue_<?= $i ?>">Venue:</label>
                    <input type="text" id="match_venue_<?= $i ?>" name="match_venue[]" class="form-control" required>
                </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
