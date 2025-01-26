<?php
 $f_id = $_POST['id'];
echo $tm1 = $_POST['nm'];
echo $tm2 = $_POST['snm'];
echo $tm1s = $_POST['em'];
echo $tm2s = $_POST['ps'];
echo $re = $_POST['usert'];


$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("connection fail");

// Update query with corrected syntax
$sql = "UPDATE users_info SET name='{$tm1}' ,surename='{$tm2}',email='{$tm1s}',password='{$tm2s}',user_type='{$re}' WHERE id='{$f_id}'";
$result = mysqli_query($conn, $sql) or die("query fail");

header("Location: http://localhost/a/cricket/username.php");
mysqli_close($conn);
?>
