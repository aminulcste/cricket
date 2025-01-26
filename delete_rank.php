<?php 
include 'config.php';
echo $series_id=$_GET['id'];

$sql="delete from rank where id={$series_id}";
$result=mysqli_query($conn,$sql) or die("query fail ");

header("location:http://localhost/a/cricket/rankname.php");
mysqli_close($conn);


?>