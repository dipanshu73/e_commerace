<?php
session_start();
$order_id = $_GET['order_id'] ?? '';
$total    = $_GET['total'] ?? '';
$product  = $_GET['product'] ?? '';
?>

<h2>Order Successful!</h2>
<p>Order ID: <?php echo $order_id; ?></p>
<p>Product: <?php echo $product; ?></p>
<p>Total Amount: ₹<?php echo $total; ?></p>
<p>Status: Processing</p>
<a href="index.php">Continue Shopping</a>
<p>Thank you for your order!</p>
<a href="product_review.php?id=<?php echo $product_id; ?>">Leave a Review for this Product</a>
