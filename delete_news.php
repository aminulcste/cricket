<?php 
include 'config.php';
echo $news_id=$_GET['id'];

$sql="delete from midnews where mid={$news_id}";
$result=mysqli_query($conn,$sql) or die("query fail ");

header("location:http://localhost/a/cricket/newsname.php");
mysqli_close($conn);


?>