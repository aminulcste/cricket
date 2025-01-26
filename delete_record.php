<?php 
include 'config.php';
echo $p_id=$_GET['id'];

$sql="delete from wtc where id={$p_id}";
$result=mysqli_query($conn,$sql) or die("query fail ");

header("location:http://localhost/a/cricket/recordname.php");
mysqli_close($conn);


?>