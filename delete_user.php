<?php 
include 'config.php';
echo $m_id=$_GET['id'];

$sql="delete from users_info where id={$m_id}";
$result=mysqli_query($conn,$sql) or die("query fail ");

header("location:http://localhost/a/cricket/username.php");
mysqli_close($conn);


?>