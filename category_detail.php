<?php
include 'config.php'; // Include database connection
include 'adminbar.php'; // Optional, if you have a common header

// Get the category ID from the URL
$category_id = $_GET['id'];

// Fetch the category name
$category_query = "SELECT category_name FROM categories WHERE id = {$category_id}";
$category_result = mysqli_query($conn, $category_query);
$category = mysqli_fetch_assoc($category_result);

// Fetch products that belong to this category
$product_query = "SELECT * FROM products WHERE category_id = {$category_id}";
$product_result = mysqli_query($conn, $product_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $category['category_name']; ?> - Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4"><?php echo $category['category_name']; ?></h1>
        
        <div class="text-center mb-4">
            <a href="add_product.php?category_id=<?php echo $category_id; ?>" class="btn btn-success">Add New Jersey</a>
        </div>
        
        <?php if (mysqli_num_rows($product_result) > 0): ?>
            <div class="row">
                <?php while ($product = mysqli_fetch_assoc($product_result)): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo $product['product_image']; ?>" class="card-img-top" alt="<?php echo $product['product_name']; ?>" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                <p class="card-text">Price: $<?php echo $product['price']; ?></p>
                                <a href="product_detail.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">View Details</a>
                                <a href="update_product.php?id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                                <a href="delete_product.php?id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">No products found in this category.</div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
