<?php
session_start();
include 'header.php';
include 'config.php';

$session_id = session_id();

// Handle order submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect user information from form
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);

    // Retrieve cart items for the session
    $cart_query = "SELECT * FROM cart WHERE session_id = '$session_id'";
    $cart_result = mysqli_query($conn, $cart_query);
    
    if (mysqli_num_rows($cart_result) > 0) {
        // Insert order into orders table
        $insert_order = "INSERT INTO orders (session_id, total_price, created_at, full_name, email, phone_number, address, city, state, country, pincode, payment_method) 
                         VALUES ('$session_id', 0, NOW(), '$full_name', '$email', '$phone_number', '$address', '$city', '$state', '$country', '$pincode', '$payment_method')";
        mysqli_query($conn, $insert_order);
        $order_id = mysqli_insert_id($conn);

        $total_price = 0;

        // Insert each item into order_items table and update the total price
        while ($item = mysqli_fetch_assoc($cart_result)) {
            $product_id = $item['product_id'];
            $quantity = $item['quantity'];

            $product_query = "SELECT price FROM products WHERE id = $product_id";
            $product_result = mysqli_query($conn, $product_query);
            $product = mysqli_fetch_assoc($product_result);
            $price = $product['price'];
            $total_price += $price * $quantity;

            $insert_item = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($order_id, $product_id, $quantity, $price)";
            mysqli_query($conn, $insert_item);
        }

        // Update total price in orders table
        $update_order = "UPDATE orders SET total_price = $total_price WHERE id = $order_id";
        mysqli_query($conn, $update_order);

        // Clear cart for the session
        mysqli_query($conn, "DELETE FROM cart WHERE session_id = '$session_id'");

        echo "<p class='alert alert-success text-center'>Order placed successfully! Your total: ₹" . number_format($total_price, 2) . "</p>";
    } else {
        echo "<p class='alert alert-warning text-center'>Your cart is empty.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Checkout</h1>
        <form method="POST" action="checkout.php">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="pincode">Pincode</label>
                <input type="text" class="form-control" id="pincode" name="pincode" required>
            </div>
            <div class="form-group">
                <label for="payment_method">Choose Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="Net Banking">Net Banking</option>
                    <option value="UPI">UPI</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Confirm Order</button>
                <a href="usercart.php" class="btn btn-primary">Back to Cart</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
