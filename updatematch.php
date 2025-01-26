<?php
$f_id = $_POST['fid'];
$tm1 = $_POST['t1'];
$tm2 = $_POST['t2'];
$tm1s = $_POST['t1s'];
$tm2s = $_POST['t2s'];
$re = $_POST['res'];

echo $tm1;
echo $tm2;
echo $tm1s;
echo $tm2s;
echo $re;

$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("connection fail");

// Update query with corrected syntax
$sql = "UPDATE featurematches SET team1='{$tm1}' ,team2='{$tm2}',team1score='{$tm1s}',team2score='{$tm2s}',result='{$re}' WHERE fid='{$f_id}'";
$result = mysqli_query($conn, $sql) or die("query fail");

header("Location: http://localhost/a/cricket/matchname.php");
mysqli_close($conn);
?>
