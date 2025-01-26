<?php

include 'header.php';
include 'matches.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feature Matches</title>
    
    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="img/cricket-logo-png-7553.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <style>
    .feature-match {
        padding: 40px 0;
        background-color: #f8f9fa;
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: #f0f9ff; /* Same light blue background as in adminseries.php */
    }

    .card-header {
        background-color: #17a2b8; /* Teal color for the card header */
        color: white;
        font-weight: bold;
    }

    .card-body {
        padding: 25px;
        background-color: #ffffff; /* White background for card body */
    }

    .team-name {
        font-weight: bold;
        color: #17a2b8; /* Teal color for team names */
    }

    .team-score {
        font-size: 12px;
        color: #343a40; /* Dark gray for team scores */
    }

    .card-title {
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
        color: #343a40; /* Dark gray for card title */
    }

    .border-right {
        border-right: 1px solid #ddd;
    }

    .text-muted {
        color: #6c757d;
    }

    .font-italic {
        font-style: italic;
    }

    .team-card {
        padding: 20px;
        background-color: #f0f9ff; /* Light blue background for the card */
        border-radius: 15px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    }

    @media (min-width: 768px) {
        .team-card {
            padding: 25px;
        }
    }
</style>

</head>

<body>
    <?php  
    include 'config.php';
    $sql = "SELECT team1, team2, team1score, team2score, result FROM featurematches";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    ?>

    <section class="feature-match">
        <div class="container">
            <h3 class="text-center mb-4">Feature Matches</h3>
            <div class="row">
                <?php   
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card team-card">
                        <div class="card-header text-center"><?php echo $row['team1']; ?> vs <?php echo $row['team2']; ?></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 text-center border-right">
                                    <div>
                                        <span class="team-name"><?php echo $row['team1']; ?></span>
                                        <br>
                                        <span class="team-score"><?php echo $row['team1score']; ?></span>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <div>
                                        <span class="team-name"><?php echo $row['team2']; ?></span>
                                        <br>
                                        <span class="team-score"><?php echo $row['team2score']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text text-muted text-center font-italic mt-3"><?php echo $row['result']; ?></p>
                        </div>
                    </div>
                </div>
                <?php  
                }
                ?>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <?php  
    }
    ?>
</body>

</html>
