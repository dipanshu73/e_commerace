<?php
session_start();
include('admin/conn.php'); // Database connection file

// --------------------
// Step 1: Check if user is logged in
// --------------------
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login to buy this product!'); window.location.href='login.php';</script>";
    exit;
}

$user_id   = $_SESSION['user_id'];   // Logged-in user ID
$user_name = $_SESSION['user_name']; // Logged-in user name
$product_id = $_GET['id'] ?? 0;      // Product ID from URL

// --------------------
// Step 2: Fetch product details
// --------------------
$product_sql    = "SELECT * FROM products WHERE id='$product_id'";
$product_result = mysqli_query($conn, $product_sql);
$product        = mysqli_fetch_assoc($product_result);

if (!$product) {
    echo "<script>alert('Product not found!'); window.location.href='index.php';</script>";
    exit;
}

// --------------------
// Step 3: Calculate order total
// --------------------
$quantity = 1; // Default quantity
$total    = (int)$product['price'] * $quantity; // Total price

// --------------------
// Step 4: Insert into orders table
// --------------------
$insert_order = "INSERT INTO orders 
                 (customer_id, order_date, total_amount, payment_status, delivery_status)
                 VALUES ('$user_id', NOW(), '$total', 'Prepaid', 'Processing')";
if (!mysqli_query($conn, $insert_order)) {
    die("Order insert error: " . mysqli_error($conn));
}
$order_id = mysqli_insert_id($conn); // Get last inserted order ID

// --------------------
// Step 5: Insert into order_items table
// --------------------
$product_name  = $product['product_name']; // Correct column name
$product_price = $product['price'];

$insert_order_items = "INSERT INTO order_items
                      (order_id, product_id, product_name, price, quantity, payment_method, subtotal, created_at)
                      VALUES ('$order_id', '$product_id', '$product_name', '$product_price', '$quantity', 'Online', '$total', NOW())";

if (!mysqli_query($conn, $insert_order_items)) {
    die("Order items insert error: " . mysqli_error($conn));
}

// --------------------
// Step 6: Update stock
// --------------------
$update_stock = "UPDATE in_stock 
                 SET quantity_added = quantity_added - $quantity 
                 WHERE product_id = '$product_id'";
if (!mysqli_query($conn, $update_stock)) {
    die("Stock update error: " . mysqli_error($conn));
}

// --------------------
// Step 7: Redirect to confirmation page
// --------------------
header("Location: place_order.php?order_id=$order_id&total=$total&product=".urlencode($product_name));
exit;
?>
