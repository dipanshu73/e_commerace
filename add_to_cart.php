<?php
include('admin/conn.php');
session_start();

// Get product ID safely
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Fetch product details
    $sql = "SELECT id, product_name, price, image_path FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        // Initialize cart if not exists
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add or update product quantity
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$id] = [
                'id'       => $product['id'],
                'name'     => $product['product_name'],
                'price'    => $product['price'],
                'image'    => $product['image_path'],
                'quantity' => 1
            ];
        }

        // Redirect to cart page
        header("Location: cart.php");
        exit();
    } else {
        echo "<h3>Product not found!</h3>";
    }
} else {
    echo "<h3>Invalid product ID!</h3>";
}
?>
