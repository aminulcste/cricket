<?php
ob_start(); // Start output buffering
include 'config.php'; // Include database connection
include 'adminbar.php'; // Optional, if you have a common header

// Get the product ID from the URL
$product_id = $_GET['id'];

// Fetch the product details from the database
$product_query = "SELECT * FROM products WHERE id = {$product_id}";
$product_result = mysqli_query($conn, $product_query);
$product = mysqli_fetch_assoc($product_result);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // Handle image upload
    $product_image = $_FILES['product_image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($product_image);

    // Check if an image was uploaded
    if (!empty($product_image)) {
        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
        
        // Update the product with the new image
        $update_query = "UPDATE products SET product_name = '$product_name', price = '$price', product_image = '$target_file', category_id = '$category_id' WHERE id = {$product_id}";
    } else {
        // If no new image, update without changing the image
        $update_query = "UPDATE products SET product_name = '$product_name', price = '$price', category_id = '$category_id' WHERE id = {$product_id}";
    }

    // Execute the update query
    if (mysqli_query($conn, $update_query)) {
        header("Location: category_detail.php?id=" . $category_id); // Redirect to category detail page
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Update Product</h1>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <!-- Populate categories dynamically -->
                    <?php
                    $category_query = "SELECT * FROM categories";
                    $category_result = mysqli_query($conn, $category_query);
                    while ($category = mysqli_fetch_assoc($category_result)) {
                        $selected = ($category['id'] == $product['category_id']) ? 'selected' : '';
                        echo "<option value='" . $category['id'] . "' $selected>" . $category['category_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="product_image">Product Image (Leave empty to keep current image)</label>
                <input type="file" class="form-control-file" id="product_image" name="product_image">
                <?php if ($product['product_image']): ?>
                    <img src="<?php echo $product['product_image']; ?>" alt="Current Image" style="width: 100px; height: auto;" class="mt-2">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
ob_end_flush(); // Flush the output buffer
?>
