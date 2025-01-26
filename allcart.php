<?php
session_start();
include 'header.php';
include 'config.php';

$session_id = session_id();

// Retrieve all items from the cart based on session ID
$cart_query = "
    SELECT oi.*, p.product_name 
    FROM order_items oi
    JOIN products p ON oi.product_id = p.id
    JOIN orders o ON oi.order_id = o.id
    WHERE o.session_id = '$session_id'
    ORDER BY oi.order_id DESC
";
$cart_result = mysqli_query($conn, $cart_query);

// Handle payment confirmation and deletion (similar as before)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_payment'])) {
    $order_id = $_POST['order_id'];
    $confirm_query = "UPDATE orders SET payment_confirmed = 1 WHERE id = $order_id";
    if (mysqli_query($conn, $confirm_query)) {
        echo "<p class='alert alert-success text-center'>Payment for Order ID $order_id confirmed!</p>";
    } else {
        echo "<p class='alert alert-danger text-center'>Error confirming payment: " . mysqli_error($conn) . "</p>";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_order'])) {
    $order_id = $_POST['order_id'];
    $delete_query = "DELETE FROM orders WHERE id = $order_id";
    if (mysqli_query($conn, $delete_query)) {
        echo "<p class='alert alert-success text-center'>Order ID $order_id deleted successfully!</p>";
    } else {
        echo "<p class='alert alert-danger text-center'>Error deleting order: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">My Cart</h1>

        <?php if (mysqli_num_rows($cart_result) > 0): ?>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_cart_price = 0;
                    while ($cart_item = mysqli_fetch_assoc($cart_result)): 
                        $total_item_price = $cart_item['quantity'] * $cart_item['price'];
                        $total_cart_price += $total_item_price;
                    ?>
                        <tr>
                            <td><?= $cart_item['product_name']; ?></td>
                            <td><?= $cart_item['quantity']; ?></td>
                            <td>₹<?= number_format($cart_item['price'], 2); ?></td>
                            <td>₹<?= number_format($total_item_price, 2); ?></td>
                        </tr>
                    <?php endwhile; ?>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total Cart Price:</strong></td>
                        <td><strong>₹<?= number_format($total_cart_price, 2); ?></strong></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p class="alert alert-warning text-center">Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
