<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint");

// Check if POST data is provided
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']); // Sanitize input
    $team = mysqli_real_escape_string($conn, $_POST['team']);
    $test = mysqli_real_escape_string($conn, $_POST['test']);
    $odi = mysqli_real_escape_string($conn, $_POST['odi']);
    $t20 = mysqli_real_escape_string($conn, $_POST['t20']);

    // Update query with corrected syntax
    $sql = "UPDATE rank SET team='{$team}', test='{$test}', odi='{$odi}', t20='{$t20}' WHERE id={$id}";

    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/a/cricket/rankname.php");
    } else {
        die("Query failed: " . mysqli_error($conn));
    }

    mysqli_close($conn);
}
?>
