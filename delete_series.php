<?php 
include 'config.php';

// Get the series ID from the URL
$series_id = $_GET['id'];

// Ensure $series_id is an integer to prevent SQL injection
$series_id = intval($series_id);

// SQL query to delete the series with the given ID
$sql = "DELETE FROM seriess WHERE id={$series_id}";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Redirect to admin series page after successful deletion
    header("Location: http://localhost/a/cricket/adminseries.php");
    exit(); // Make sure to exit after redirection
} else {
    // Display an error message if the deletion fails
    die("Query failed: " . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);
?>
