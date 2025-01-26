<?php
$id = $_POST['id'];
$date = $_POST['date'];
$details = $_POST['details'];
$time = $_POST['time'];
$venue = $_POST['venue'];

echo $s_name;

$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("connection fail");

// Update query with corrected syntax
$sql = "UPDATE seriess SET date='{$date}',details='{$matchsetails}',time='{$time}',venue='{$venue}' WHERE id='{$id}'";
$result = mysqli_query($conn, $sql) or die("query fail");

header("Location: http://localhost/a/cricket/adminbanvsind.php");
mysqli_close($conn);
?>
