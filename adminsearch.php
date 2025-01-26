<?php
 ///////include 'config.php';
 include 'adminbar.php';
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
   
   
    <!-- Bootstrap CSS -->
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="img/cricket-logo-png-7553.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <title>Search Box </title>

    <!-- Custom CSS -->
    <style>
        .search-box {
            margin: 50px auto;
            max-width: 600px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .search-box input[type="text"] {
            border: none;
            border-radius: 0;
            box-shadow: none;
        }
        .search-box input[type="text"]:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .search-box .input-group-append .btn {
            background-color: #007bff;
            color: #fff;
            border-radius: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-box">
            <form action="search1.php" method="GET">
                <div class="input-group">
                <input type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" class="form-control" placeholder="Search for players..." required>

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
