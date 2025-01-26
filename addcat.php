<?php
include 'adminbar.php';
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);

    // Handle image upload
    $imagePath = '';
    if (isset($_FILES['categoryImage']) && $_FILES['categoryImage']['error'] == 0) {
        $targetDir = "uploads/";
        $imagePath = $targetDir . basename($_FILES['categoryImage']['name']);
        move_uploaded_file($_FILES['categoryImage']['tmp_name'], $imagePath);
    }

    // Insert new category with image path
    $sql = "INSERT INTO categories (category_name, image) VALUES ('$categoryName', '$imagePath')";

    if (mysqli_query($conn, $sql)) {
        echo "<p class='text-success text-center'>Category added successfully!</p>";
    } else {
        echo "<p class='text-danger text-center'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Add Category</h1>
        <div class="card mb-4">
            <div class="card-header">New Category</div>
            <div class="card-body">
                <form action="add_cat.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="categoryName">Category Name:</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryImage">Category Image:</label>
                        <input type="file" class="form-control-file" id="categoryImage" name="categoryImage" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
        <div class="text-center">
            <a href="adminIndex.php" class="btn btn-secondary">Go to Admin Panel</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
