<?php
include 'adminbar.php';
///include 'matches.php';
///include 'featurematch.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background for the page */
        }
        .card {
            border-radius: 10px;
            background-color: #f0f9ff; /* Light blue background for the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #17a2b8; /* Teal color for card header */
            color: #fff;
            font-size: 1.25rem;
            font-weight: bold;
            border-bottom: none;
            border-radius: 10px 10px 0 0;
        }
        .card-footer {
            background-color: #f1f3f5; /* Light gray for card footer */
            border-top: none;
            border-radius: 0 0 10px 10px;
        }
        .btn-primary {
            background-color: #17a2b8; /* Matching the card header color */
            border-color: #17a2b8;
        }
        .btn-outline-secondary {
            border-color: #17a2b8; /* Matching the card header color */
            color: #17a2b8;
        }
        .btn-outline-secondary:hover {
            background-color: #17a2b8;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-5">Admin Panel</h1>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">Add Upcoming Series</div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="addseries.php" class="btn btn-primary">Add Series</a>
                    </div>
                    <div class="card-footer text-center">
                        <a href="seriesname.php" class="btn btn-outline-secondary">View Series</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">Add Team</div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="addteam.php" class="btn btn-primary">Add Team</a>
                    </div>
                    <div class="card-footer text-center">
                        <a href="teamname.php" class="btn btn-outline-secondary">View Teams</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">Add Match</div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="addmatch.php" class="btn btn-primary">Add Match</a>
                    </div>
                    <div class="card-footer text-center">
                        <a href="matchname.php" class="btn btn-outline-secondary">View Matches</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">Add News</div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="addnews.php" class="btn btn-primary">Add News</a>
                    </div>
                    <div class="card-footer text-center">
                        <a href="newsname.php" class="btn btn-outline-secondary">View News</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">Ranking</div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="adminranking.php" class="btn btn-primary">Add Ranking</a>
                    </div>
                    <div class="card-footer text-center">
                        <a href="rankname.php" class="btn btn-outline-secondary">View Ranking</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">Player</div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="addplayer.php" class="btn btn-primary">Add Player</a>
                    </div>
                    <div class="card-footer text-center">
                        <a href="playername.php" class="btn btn-outline-secondary">View Player</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">World Test Championhsip</div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="addrecord.php" class="btn btn-primary">Add Record</a>
                    </div>
                    <div class="card-footer text-center">
                        <a href="recordname.php" class="btn btn-outline-secondary">View Record</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">Shop</div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="addcat.php" class="btn btn-primary">Add Catagory</a>
                    </div>
                    <div class="card-footer text-center">
                        <a href="categorylist.php" class="btn btn-outline-secondary">View catagory</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">Order</div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                       
                    </div>
                    <div class="card-footer text-center">
                        <a href="order.php" class="btn btn-outline-secondary">View Order</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">Add User</div>
                   
                    <div class="card-footer text-center">
                        <a href="username.php" class="btn btn-outline-secondary">View User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
