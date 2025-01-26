<?php 
include 'config.php';
echo $id=$_GET['id'];

$sql="delete from irevssa where id={$id}";
$result=mysqli_query($conn,$sql) or die("query fail ");

header("location:http://localhost/a/cricket/adminirevssa.php");
mysqli_close($conn);


?>