<?php
$t_id = $_POST['tid'];
$t_name = $_POST['tname'];
echo $t_name;

$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("connection fail");

// Update query with corrected syntax
$sql = "UPDATE team SET teamname='{$t_name}' WHERE id='{$t_id}'";
$result = mysqli_query($conn, $sql) or die("query fail");

header("Location: http://localhost/a/cricket/teamname.php");
mysqli_close($conn);
?>
