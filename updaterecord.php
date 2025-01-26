<?php
// Retrieving POST data
$id = $_POST['mid'];  // Fixed the name to 'mid' as used in the form
$teamname = $_POST['teamname'];
$matches = $_POST['matches'];
$won = $_POST['won'];
$lost = $_POST['lost'];
$drawn = $_POST['drawn'];
$point = $_POST['point'];

// Connection to the database
$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("Connection failed");

// Update query for the wtc table
$sql = "UPDATE wtc SET teamname='{$teamname}', matches={$matches}, won={$won}, lost={$lost}, drawn={$drawn}, point={$point} WHERE id='{$id}'";

if (mysqli_query($conn, $sql)) {
    // Redirect to the admin page after successful update
    header("Location: http://localhost/a/cricket/recordname.php");
} else {
    echo "Error: " . mysqli_error($conn);  // Debugging line if query fails
}

mysqli_close($conn);
?>
