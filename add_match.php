<?php
include 'config.php';
echo $tm1=$_POST['team1'];
echo $tm2=$_POST['team2'];
echo $tm1s=$_POST['team1s'];
echo $tm2s=$_POST['team2s'];
echo $res=$_POST['result'];





$sql="insert into featurematches(team1,team2,team1score,team2score,result) 
values ('{$tm1}','{$tm2}','{$tm1s}','{$tm2s}','{$res}')";
$result=mysqli_query($conn,$sql);
header("location:http://localhost/a/cricket/matchname.php");
mysqli_close($conn);
?>