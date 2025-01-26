<?php
$s_id = $_POST['sid'];
$s_name = $_POST['sname'];
echo $s_name;

$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("connection fail");

// Update query with corrected syntax
$sql = "UPDATE seriess SET seriesname='{$s_name}' WHERE id='{$s_id}'";
$result = mysqli_query($conn, $sql) or die("query fail");

header("Location: http://localhost/a/cricket/adminseries.php");
mysqli_close($conn);
?>
