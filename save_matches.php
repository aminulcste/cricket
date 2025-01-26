<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cricpoint";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_matches = $_POST['num_matches'];
    $series_names = $_POST['series_name'];
    $match_dates = $_POST['match_date'];
    $match_details = $_POST['match_details'];
    $match_times = $_POST['match_time'];
    $match_venues = $_POST['match_venue'];

    // Use prepared statements for secure insertion
    $stmt = $conn->prepare("INSERT INTO seriess (seriesname, date, matchsetails, time, venue) VALUES (?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $series, $date, $details, $time, $venue);

    for ($i = 0; $i < $num_matches; $i++) {
        $series = $series_names[$i];
        $date = $match_dates[$i];
        $details = $match_details[$i];
        $time = $match_times[$i];
        $venue = $match_venues[$i];

        if (!$stmt->execute()) {
            echo "Execute failed: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();

    header("Location: http://localhost/a/cricket/adminbanvsind.php");
    exit();
}
?>
