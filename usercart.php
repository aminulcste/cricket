<?php
ob_start(); // Start output buffering
session_start(); // Start the session
include 'header.php'; // Include header file
include 'config.php'; // Include database connection

$session_id = session_id(); // Use session ID to track user's cart

// Handle adding to the cart
if (isset($_GET['add']) && isset($_GET['qty'])) {
    $product_id = intval($_GET['add']); // Sanitize input
    $quantity = intval($_GET['qty']); // Sanitize input

    // Check if the item has already been added in this session
    if ($quantity > 0) {
        // Add or update the product in the cart
        $query = "INSERT INTO cart (session_id, product_id, quantity) 
                  VALUES ('$session_id', $product_id, $quantity) 
                  ON DUPLICATE KEY UPDATE quantity = quantity + $quantity";
        
        if (!mysqli_query($conn, $query)) {
            die("Query Failed: " . mysqli_error($conn)); // Error handling
        }
    }

    // Redirect to the cart page to prevent re-adding on refresh
    header("Location: usercart.php");
    exit();
}

// Handle removing from the cart
if (isset($_GET['remove'])) {
    $product_id = intval($_GET['remove']); // Sanitize input
    $query = "DELETE FROM cart WHERE session_id = '$session_id' AND product_id = $product_id";
    
    if (!mysqli_query($conn, $query)) {
        die("Query Failed: " . mysqli_error($conn)); // Error handling
    }
}

// Fetch products in the cart along with quantities
$product_query = "SELECT p.*, c.quantity 
                  FROM cart c 
                  JOIN products p ON c.product_id = p.id 
                  WHERE c.session_id = '$session_id'";
$product_result = mysqli_query($conn, $product_query);

if (!$product_result) {
    die("Query Failed: " . mysqli_error($conn)); // Error handling
}

$products = mysqli_fetch_all($product_result, MYSQLI_ASSOC);
$total_price = 0; // Initialize total price
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Your Cart</h1>
        
        <?php if (!empty($products)): ?>
            <div class="row">
                <?php foreach ($products as $product): 
                    $total_price += $product['price'] * $product['quantity']; // Calculate total price
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo htmlspecialchars($product['product_image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['product_name']); ?>" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
                                <p class="card-text">Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                                <p class="card-text">Quantity: <?php echo htmlspecialchars($product['quantity']); ?></p>
                                <p class="card-text">Total: $<?php echo number_format($product['price'] * $product['quantity'], 2); ?></p>
                                <a href="usercart.php?remove=<?php echo $product['id']; ?>" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h4 class="text-right">Total Price: $<?php echo number_format($total_price, 2); ?></h4>

            <!-- Buttons for Proceed to Checkout and Back to Cart -->
            <div class="text-right mt-4">
                <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
                <a href="shop.php" class="btn btn-primary">Back to Shop </a>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">Your cart is empty.</div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn); // Close the database connection at the end
ob_end_flush(); // End output buffering
?>
