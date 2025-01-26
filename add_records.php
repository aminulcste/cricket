<?php
include 'config.php';  // Database connection

// Collecting POST data
$teamname = $_POST['teamname'];
$matches = $_POST['matches'];
$won = $_POST['won'];
$lost = $_POST['lost'];
$drawn = $_POST['drawn'];
$point = $_POST['point'];

// SQL query to insert data into the table
$sql = "INSERT INTO wtc (teamname, matches, won, lost, drawn, point) 
        VALUES ('$teamname', '$matches', '$won', '$lost', '$drawn', '$point')";

// Executing the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    header("Location:http://localhost/a/cricket/recordname.php");  // Redirect on success
} else {
    echo "Error: " . mysqli_error($conn);  // Output the error
}

// Closing the connection
mysqli_close($conn);
?>
