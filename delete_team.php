<?php 
include 'config.php';
echo $team_id=$_GET['id'];

$sql="delete from team where id={$team_id}";
$result=mysqli_query($conn,$sql) or die("query fail ");

header("location:http://localhost/a/cricket/teamname.php");
mysqli_close($conn);


?>