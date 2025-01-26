<?php
include 'config.php'; // Include your database configuration file

// Retrieve form data
$categoryName = $_POST['categoryName'];

// Handle file upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["categoryImage"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is an actual image or fake image
$check = getimagesize($_FILES["categoryImage"]["tmp_name"]);
if ($check !== false) {
    if (move_uploaded_file($_FILES["categoryImage"]["tmp_name"], $target_file)) {
        $categoryImage = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }
} else {
    echo "File is not an image.";
    exit();
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO categories (category_name, image) VALUES (?, ?)");
$stmt->bind_param("ss", $categoryName, $categoryImage);

// Execute the statement
if ($stmt->execute()) {
    header("Location: http://localhost/a/cricket/categorylist.php"); // Redirect to category list page
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
mysqli_close($conn);
?>
