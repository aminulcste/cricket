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
    $match_dates = $_POST['match_date'];
    $match_details = $_POST['match_details'];
    $match_times = $_POST['match_time'];
    $match_venues = $_POST['match_venue'];

    for ($i = 0; $i < $num_matches; $i++) {
        $date = $match_dates[$i];
        $details = $match_details[$i];
        $time = $match_times[$i];
        $venue = $match_venues[$i];

        $sql = "INSERT INTO irevssa(date, details, time, venue) VALUES ('$date', '$details', '$time', '$venue')";
        mysqli_query($conn, $sql);
    }

    header("Location: http://localhost/a/cricket/adminirevssa.php");
    exit(); // Use exit() after header redirection to stop further script execution.
}
?>
<!------------------------------------->
<!--IREVSSA-->

