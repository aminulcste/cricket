<?php
include 'adminbar.php';
// Fetch users from the database
$sql = "SELECT * FROM users_info";  // Assuming your table name is `users_info`
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f9ff; /* Light gray background for the page */
        }
        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: red; /* Light blue background for the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            padding: 20px;
            background-color: blanchedalmond; /* White background for card body */
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #343a40; /* Dark gray for card title */
        }
        .card-text {
            margin-bottom: 10px;
            color: #495057;
            font-weight: 500;
        }
        .btn {
            border-radius: 50px;
            padding: 5px 15px;
            font-weight: 600;
        }
        .container {
            padding-top: 20px;
        }
        .text-center {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="text-center mb-4">
        <a href="username.php" class="btn btn-secondary">Go to user list</a>
    </div>
    <div class="container">
        <h1 class="text-center my-4">Users List</h1>
        <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name'] . " " . $row['surename']; ?></h5>
                                <p class="card-text"><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                <p class="card-text"><strong>User Type:</strong> <?php echo $row['user_type']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center'>No users found</p>";
            }
            ?>
        </div>
    </div>
    
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
