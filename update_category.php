<?php
include 'adminbar.php';

// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint");
$cat_id = $_GET['id'];
$sql = "SELECT * FROM categories WHERE id={$cat_id}";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Update Category</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form class="card p-4 shadow-sm" action="updatecat_process.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                <input type="text" class="form-control" id="categoryName" name="category_name" value="<?php echo $row['category_name']; ?>" required/>
            </div>
            <div class="form-group">
                <label for="categoryImage">Upload Image</label>
                <input type="file" class="form-control-file" id="categoryImage" name="category_image"/>
                <input type="hidden" name="current_image" value="<?php echo $row['image']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php
            }
        } else {
            echo "<div class='alert alert-danger'>No category found with this ID.</div>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
