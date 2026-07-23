<?php
session_start();
include('admin/conn.php'); // Database connection file

$order_id = $_GET['order_id'] ?? '';
$total    = $_GET['total'] ?? '';
$product  = $_GET['product'] ?? '';

$order_sql    = "SELECT * FROM orders WHERE id='$order_id'";
$order_result = mysqli_query($conn, $order_sql);
$order        = mysqli_fetch_assoc($order_result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #bbdefb);
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background-color: #ffffff;
        }
        .card h2 {
            color: #00796b;
            font-weight: 600;
        }
        .details p {
            font-size: 16px;
            margin-bottom: 8px;
        }
        .btn-primary {
            background-color: #00796b;
            border: none;
        }
        .btn-primary:hover {
            background-color: #004d40;
        }
        .thank-text {
            color: #555;
            font-size: 15px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width: 600px;">
        <h2 class="text-center mb-4">Order Confirmation</h2>
        <div class="details">
            <p><strong>Your Order ID:</strong> #<?php echo htmlspecialchars($order_id); ?></p>
            <p><strong>Product:</strong> <?php echo htmlspecialchars($product); ?></p>
            <p><strong>Total Amount:</strong> ₹<?php echo htmlspecialchars($total); ?></p>
            <p><strong>Payment Status:</strong> <?php echo $order['payment_status'] ?? 'Prepaid'; ?></p>
            <p><strong>Delivery Status:</strong> <?php echo $order['delivery_status'] ?? 'Processing'; ?></p>
        </div>
        <hr>
        <p class="text-center thank-text">Thank you for shopping with us!</p>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary px-4 py-2">Continue Shopping</a>
        </div>
    </div>
</div>
</body>
</html>
