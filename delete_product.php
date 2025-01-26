<?php
include 'config.php'; // Include database connection
include 'adminbar.php'; // Optional, if you have a common header

// Get the product ID from the URL
$product_id = $_GET['id'];

// Fetch the product to get the category ID for redirection later
$product_query = "SELECT category_id FROM products WHERE id = {$product_id}";
$product_result = mysqli_query($conn, $product_query);
$product = mysqli_fetch_assoc($product_result);

// Check if the product exists
if ($product) {
    // Delete the product from the database
    $delete_query = "DELETE FROM products WHERE id = {$product_id}";
    
    if (mysqli_query($conn, $delete_query)) {
        // Redirect to category detail page after deletion
        header("Location: category_detail.php?id=" . $product['category_id']);
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Product not found.";
}

// Close the database connection
mysqli_close($conn);
?>
