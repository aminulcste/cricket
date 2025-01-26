<?php 
include 'config.php';
echo $p_id=$_GET['id'];

$sql="delete from players where id={$p_id}";
$result=mysqli_query($conn,$sql) or die("query fail ");

header("location:http://localhost/a/cricket/playername.php");
mysqli_close($conn);


?>