<?php 
include 'config.php';
echo $m_id=$_GET['id'];

$sql="delete from featurematches where fid={$m_id}";
$result=mysqli_query($conn,$sql) or die("query fail ");

header("location:http://localhost/a/cricket/matchname.php");
mysqli_close($conn);


?>