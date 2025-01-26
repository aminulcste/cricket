<?php
include 'config.php';
echo $seriesNme=$_POST['seriesName'];
$sql="insert into seriess(seriesname) 
values ('{$seriesNme}')";
$result=mysqli_query($conn,$sql);
header("location:http://localhost/a/cricket/seriesname.php");
mysqli_close($conn);
?>