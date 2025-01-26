<?php
include 'config.php';

// Correcting the assignment and echo statement
$teamNme = $_POST['teamName'];
echo $teamNme;

$sql = "INSERT INTO team (teamname) VALUES ('{$teamNme}')";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    header("Location:http://localhost/a/cricket/teamname.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
