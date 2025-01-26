<?php
include 'header.php'; // Include header file
include 'config.php'; // Include database connection



// Get the category ID from the URL and sanitize it
$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Ensure it's an integer

// Fetch the category name
$category_query = "SELECT category_name FROM categories WHERE id = {$category_id}";
$category_result = mysqli_query($conn, $category_query);

if (!$category_result) {
    die("Query Failed: " . mysqli_error($conn)); // Error handling
}

$category = mysqli_fetch_assoc($category_result);

// Fetch products that belong to this category
$product_query = "SELECT * FROM products WHERE category_id = {$category_id}";
$product_result = mysqli_query($conn, $product_query);

if (!$product_result) {
    die("Query Failed: " . mysqli_error($conn)); // Error handling
}

// Check if the user has a cart
$session_id = session_id(); // Use session ID to track user's cart
$cart_items = [];
$cart_query = "SELECT product_id, quantity FROM cart WHERE session_id = '$session_id'";
$cart_result = mysqli_query($conn, $cart_query);

if ($cart_result) {
    while ($row = mysqli_fetch_assoc($cart_result)) {
        $cart_items[$row['product_id']] = $row['quantity']; // Store quantities in an array
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category['category_name']); ?> - Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .quantity-box {
            display: flex;
            align-items: center;
        }
        .quantity-box input {
            width: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4"><?php echo htmlspecialchars($category['category_name']); ?></h1>
        
        <?php if (mysqli_num_rows($product_result) > 0): ?>
            <div class="row">
                <?php while ($product = mysqli_fetch_assoc($product_result)): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo htmlspecialchars($product['product_image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['product_name']); ?>" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
                                <p class="card-text">Price: $<span class="product-price" id="price_<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['price']); ?></span></p>
                                
                                <div class="quantity-box">
                                    <button class="btn btn-secondary btn-sm" onclick="changeQuantity(<?php echo $product['id']; ?>, -1)">-</button>
                                    <input type="number" id="qty_<?php echo $product['id']; ?>" value="<?php echo isset($cart_items[$product['id']]) ? $cart_items[$product['id']] : 0; ?>" min="0" readonly>
                                    <button class="btn btn-secondary btn-sm" onclick="changeQuantity(<?php echo $product['id']; ?>, 1)">+</button>
                                </div>
                                
                                <p class="card-text">Total Price: $<span id="total-price-<?php echo $product['id']; ?>">0.00</span></p>
                                <a href="#" class="btn btn-success mt-2" onclick="addToCart(<?php echo $product['id']; ?>)">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <script>
                        // Calculate initial total price on page load
                        updateTotalPrice(<?php echo $product['id']; ?>);
                    </script>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">No products found in this category.</div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeQuantity(productId, change) {
            var qtyInput = document.getElementById('qty_' + productId);
            var currentQty = parseInt(qtyInput.value) || 0; // Get current quantity
            var newQty = Math.max(currentQty + change, 0); // Prevent negative quantity
            qtyInput.value = newQty;

            // Update total price
            updateTotalPrice(productId);
        }

        function updateTotalPrice(productId) {
            var qtyInput = document.getElementById('qty_' + productId);
            var productPrice = parseFloat(document.getElementById('price_' + productId).innerText); // Get specific product price
            var totalPriceElement = document.getElementById('total-price-' + productId);
            var quantity = parseInt(qtyInput.value) || 0; // Get the current quantity
            var totalPrice = (productPrice * quantity).toFixed(2); // Calculate total price
            totalPriceElement.innerText = totalPrice; // Update the total price display
        }

        function addToCart(productId) {
            var qtyInput = document.getElementById('qty_' + productId);
            var quantity = parseInt(qtyInput.value) || 0; // Get the quantity from the input
            if (quantity > 0) {
                // Redirect to usercart.php with the product ID and quantity
                window.location.href = 'usercart.php?add=' + productId + '&qty=' + quantity;
            } else {
                alert('Please select a quantity greater than 0.');
            }
        }
    </script>
</body>
</html>

<?php
mysqli_close($conn); // Close the database connection at the end
?>
