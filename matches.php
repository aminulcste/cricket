<?php    
include 'config.php';
$sql="select matchname from matches";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){

?>
<section class="matches">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a style="color:white ;font-weight: 700;" class="navbar-brand" href="#">Matches</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-space-between" id="navbarNav">
          <ul class="navbar-nav">
            <?php
            while($row=mysqli_fetch_assoc($result)){
            ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">  <?php echo $row['matchname'] ?>     </a>
            </li>  
            <?php   
            }
            ?>
            <li style="margin-left: 100px !important;" class="nav-item dropdown d-flex pl-5 ml-5">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                All
              </a>
              <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">All</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </section>
  <?php
}   
  
  ?>