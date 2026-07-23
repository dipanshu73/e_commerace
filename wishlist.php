<?php
include('admin/conn.php');
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login to add items to wishlist!'); window.location.href='login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id']; 
$product_id = $_GET['id'];

// Check if already added
$check_sql = "SELECT * FROM wishlist WHERE user_id='$user_id' AND product_id='$product_id'";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) == 0) {
    $insert_sql = "INSERT INTO wishlist (user_id, product_id) VALUES ('$user_id', '$product_id')";
    mysqli_query($conn, $insert_sql);
    echo "<script>alert('Added to Wishlist!'); window.location.href='wishlist.php';</script>";
} else {
    echo "<script>alert('Already in Wishlist!'); window.location.href='wishlist.php';</script>";
}
?>
