<?php  
include 'config.php';
$sql = "SELECT team1, team2, team1score, team2score, result FROM featurematches ORDER BY fid DESC LIMIT 4";

$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){

?>

<section class="feature-match mt-2">
    <div class="pl-5">
      <h3 >Feature matches</h3>
   
      <div class="row mt-3">
          <?php   
        while($row=mysqli_fetch_assoc($result)){
        
        ?>
 
        <div class="col">
          <div id="scoreboard"></div> 
         
          <span><?php echo $row['team1'] ?></span><span class="pl-5"> <?php echo $row['team1score'] ?></span><br>
          <span><?php echo $row['team2'] ?></span><span class="pl-5"><?php echo $row['team2score']  ?></span><p></p>
          <p><?php echo $row['result']  ?></p> 
        
        </div>
 <?php  
        }
    ?>
      </div>

 

    </div>


  </section>
  <?php  
}
  ?>