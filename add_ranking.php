<?php
include 'config.php';

// Check if form data is set
if (isset($_POST['team']) && isset($_POST['test']) && isset($_POST['odi']) && isset($_POST['t20'])) {
    // Retrieve POST data
    $tm = $_POST['team'];
    $tst = $_POST['test'];
    $od = $_POST['odi'];
    $t20 = $_POST['t20'];

    // Prepare SQL statement
    $sql = "INSERT INTO rank (team, test, odi, t20) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Bind parameters and execute statement
        mysqli_stmt_bind_param($stmt, "ssss", $tm, $tst, $od, $t20);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("location:http://localhost/a/cricket/rankname.php");
            exit();
        } else {
            echo "Error executing query: " . mysqli_stmt_error($stmt);
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
} else {
    echo "Form data is missing.";
}

// Close connection
mysqli_close($conn);
?>


