<?php
$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("Connection failed");

// Retrieve form data
$cat_id = $_POST['id'];
$category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
$current_image = $_POST['current_image'];

// File upload logic
if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["category_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($imageFileType, $allowed_types)) {
        if (move_uploaded_file($_FILES["category_image"]["tmp_name"], $target_file)) {
            $category_image = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
    }
} else {
    // If no new image was uploaded, use the current one
    $category_image = $current_image;
}

// Update query
$sql = "UPDATE categories SET category_name='$category_name', image='$category_image' WHERE id='$cat_id'";

if (mysqli_query($conn, $sql)) {
    header("Location: http://localhost/a/cricket/categorylist.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
