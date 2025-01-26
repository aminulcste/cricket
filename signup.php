<?php
include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Sname = mysqli_real_escape_string($conn, $_POST['Surename']);
    $email = mysqli_real_escape_string($conn, $_POST['Gmail']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cPassword']);
    $user_type = $_POST['user_type'];

    $select_user = $conn->query("SELECT * FROM users_info WHERE email='$email'");
    if(mysqli_num_rows($select_user) != 0){
        $message[] = "User already exists";
    } else {
        if($password != $cpassword){
            $message[] = "Passwords do not match";
        } else {
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users_info(name, surename, email, password, user_type) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $Sname, $email, $password_hashed, $user_type);

            if($stmt->execute()){
                $message[] = "Signup successful";
            } else {
                $message[] = "Signup failed: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .signup-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h3 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }

        .form-control, .form-select {
            border-radius: 8px;
            background-color: #f1f1f1;
            border: 1px solid #ced4da;
            transition: background-color 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            box-shadow: none;
            border-color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .link {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .link:hover {
            color: #0056b3;
        }

        .text-muted {
            text-align: center;
            margin-top: 20px;
        }

        p.text-danger {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="signup-container col-md-6">
            <h3>Create an Account</h3>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="Name" class="form-control" id="name" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="Surename" class="form-control" id="surname" placeholder="Enter your surname" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="Gmail" class="form-control" id="gmail" placeholder="Enter your Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="Password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="cPassword" class="form-control" id="confirmPassword" placeholder="Confirm your password" required>
                </div>
                <div class="mb-4">
                    <select class="form-select" name="user_type" id="userType" required>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Signup</button>
                <p class="text-muted">Already have an account? 
                    <a class="link" href="login.php">Login</a>
                </p>
            </form>
            <?php
            if(isset($message) && !empty($message)){
                foreach($message as $msg){
                    echo "<p class='text-danger'>$msg</p>";
                }
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
