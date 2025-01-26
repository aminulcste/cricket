<?php

 include 'header.php';
 include 'matches.php';
 include 'featurematch.php';
 $sql="select * from latestnews";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Add Team</h1>
        <!-- Add Team Form -->
        <div class="card mb-4">
            <div class="card-header">Add Team</div>
            <div class="card-body">
                <form action="add_team.php" method="post">
                    <div class="form-group">
                        <label for="teamName">Team Name:</label>
                        <input type="text" class="form-control" id="teamName" name="teamName" required>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary submit">Add Team</button>
                    
                </form>
            </div>
        </div>

        <!-- Add News Form -->
        
    </div>
    <div class="text-center">
            <a href="adminIndex.php" class="btn btn-secondary">Go to Admin Panel</a>
        </div>
    <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
<?php

    }
?>
