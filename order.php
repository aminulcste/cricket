<?php
session_start();
include 'adminbar.php';
include 'config.php';

$session_id = session_id();

// Retrieve user orders based on session ID
$order_query = "SELECT * FROM orders WHERE session_id = '$session_id' ORDER BY created_at DESC";
$order_result = mysqli_query($conn, $order_query);

// Handle payment confirmation (only for admin panel)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_payment'])) {
    $order_id = $_POST['order_id'];
    $confirm_query = "UPDATE orders SET payment_confirmed = 1 WHERE id = $order_id";
    
    if (mysqli_query($conn, $confirm_query)) {
        echo "<p class='alert alert-success text-center'>Payment for Order ID $order_id confirmed!</p>";
    } else {
        echo "<p class='alert alert-danger text-center'>Error confirming payment: " . mysqli_error($conn) . "</p>";
    }
}

// Handle order deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_order'])) {
    $order_id = $_POST['order_id'];
    $delete_query = "DELETE FROM orders WHERE id = $order_id";

    if (mysqli_query($conn, $delete_query)) {
        echo "<p class='alert alert-success text-center'>Order ID $order_id has been deleted!</p>";
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
    <title>My Orders</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-header { background-color: #007bff; color: #fff; }
        .card-body ul { list-style-type: none; padding: 0; }
        .order-items { background-color: #f8f9fa; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">My Orders</h1>

        <?php if (mysqli_num_rows($order_result) > 0): ?>
            <?php while ($order = mysqli_fetch_assoc($order_result)): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Order ID: <?= $order['id']; ?> 
                            <?php if (isset($order['payment_confirmed']) && $order['payment_confirmed']): ?>
                                <span class="badge badge-success float-right">Payment Confirmed</span>
                            <?php else: ?>
                                <span class="badge badge-warning float-right">Pending Payment</span>
                            <?php endif; ?>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Customer Details:</strong></p>
                        <ul>
                            <li><strong>Name:</strong> <?= $order['full_name']; ?></li>
                            <li><strong>Email:</strong> <?= $order['email']; ?></li>
                            <li><strong>Phone:</strong> <?= $order['phone_number']; ?></li>
                            <li><strong>Address:</strong> <?= $order['address']; ?>, <?= $order['city']; ?>, <?= $order['state']; ?>, <?= $order['country']; ?>, <?= $order['pincode']; ?></li>
                        </ul>

                        <p><strong>Order Details:</strong></p>
                        <ul class="order-items">
                            <?php
                            $order_id = $order['id'];
                            $items_query = "SELECT oi.*, p.product_name FROM order_items oi
                                            JOIN products p ON oi.product_id = p.id
                                            WHERE oi.order_id = $order_id";
                            $items_result = mysqli_query($conn, $items_query);
                            while ($item = mysqli_fetch_assoc($items_result)):
                            ?>
                                <li><?= $item['product_name']; ?> - Quantity: <?= $item['quantity']; ?> - Price: ₹<?= number_format($item['price'], 2); ?></li>
                            <?php endwhile; ?>
                        </ul>

                        <p><strong>Total Price:</strong> ₹<?= number_format($order['total_price'], 2); ?></p>
                        <p><strong>Payment Method:</strong> <?= $order['payment_method']; ?></p>

                        <?php if (!isset($order['payment_confirmed']) || !$order['payment_confirmed']): ?>
                            <!-- Checkbox for admin to confirm payment -->
                            <form method="POST" action="order.php">
                                <input type="hidden" name="order_id" value="<?= $order['id']; ?>">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="confirm_payment" id="confirm_payment_<?= $order['id']; ?>">
                                    <label class="form-check-label" for="confirm_payment_<?= $order['id']; ?>">
                                        Confirm Payment
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Update Payment Status</button>
                            </form>
                        <?php endif; ?>

                        <!-- Delete Button -->
                        <form method="POST" action="order.php" class="mt-3">
                            <input type="hidden" name="order_id" value="<?= $order['id']; ?>">
                            <button type="submit" name="delete_order" class="btn btn-danger">Delete Order</button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="alert alert-warning text-center">You have no orders yet.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
