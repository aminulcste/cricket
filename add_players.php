<?php
include 'config.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teamname = $_POST['teamName'] ?? null;
    $playername = $_POST['playerName'] ?? null;
    $birth = $_POST['birth'] ?? null;
    $role = $_POST['role'] ?? null;
    $batting_style = $_POST['battingStyle'] ?? null;
    $bowling_style = $_POST['bowlingStyle'] ?? null;
    $matches_played = $_POST['matchesPlayed'] ?? null;
    $runs_scored = $_POST['runsScored'] ?? null;
    $wickets_taken = $_POST['wicketsTaken'] ?? null;
    $profile = $_POST['profile'] ?? null;

    if ($teamname && $playername && isset($_FILES['playerImage'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["playerImage"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["playerImage"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["playerImage"]["tmp_name"], $target_file)) {
                $playerimage = basename($_FILES["playerImage"]["name"]);

                // Prepare the SQL statement with the additional attributes
                $stmt = $conn->prepare("INSERT INTO players (teamname, playername, image, birth, role, batting_style, bowling_style, matches_played, runs_scored, wickets_taken, profile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssiiss", $teamname, $playername, $playerimage, $birth, $role, $batting_style, $bowling_style, $matches_played, $runs_scored, $wickets_taken, $profile);

                if ($stmt->execute()) {
                        header("Location: playername.php");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "All fields are required!";
    }
} else {
    echo "Invalid request method.";
}

mysqli_close($conn);
?>
