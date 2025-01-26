<?php
include 'config.php'; // Include database connection
include 'adminbar.php'; // Optional, if you have a common header

// Get the product ID from the URL
$product_id = $_GET['id'];

// Fetch the product details
$product_query = "SELECT * FROM products WHERE id = {$product_id}";
$product_result = mysqli_query($conn, $product_query);

if (mysqli_num_rows($product_result) == 0) {
    echo "<script>alert('Product not found.'); window.location.href='category_list.php';</script>";
    exit();
}

$product = mysqli_fetch_assoc($product_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['product_name']; ?> - Product Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4"><?php echo $product['product_name']; ?></h1>
        <div class="card mb-4">
            <img src="<?php echo $product['product_image']; ?>" class="card-img-top" alt="<?php echo $product['product_name']; ?>" style="width: 200px; height: auto; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Price: $<?php echo $product['price']; ?></h5>
                <p class="card-text">Product ID: <?php echo $product['id']; ?></p>
                <div class="text-center">
                    <a href="update_product.php?id=<?php echo $product['id']; ?>" class="btn btn-warning">Update Product</a>
                    <a href="delete_product.php?id=<?php echo $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete Product</a>
                    <a href="category_detail.php?id=<?php echo $product['category_id']; ?>" class="btn btn-secondary">Back to Category</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
