<?php
include("db_connect.php");

if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Correct query for your table
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "<h4 class='text-center text-danger mt-5'>Product Not Found</h4>";
        exit();
    }
} else {
    echo "<h4 class='text-center text-danger mt-5'>Invalid Product</h4>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($product['product_name']); ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<?php include(__DIR__ . "/includes/navbar.php"); ?>

<div class="container mt-5">
    <div class="row">

        <!-- Product Image -->
        <div class="col-md-6">
            <img src="<?php echo !empty($product['image_path']) ? $product['image_path'] : 'default.jpg'; ?>" 
                 class="img-fluid rounded shadow" width="400">
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
            <h4 class="text-success">₹<?php echo $product['price']; ?></h4>

            <p>
                <?php echo isset($product['display_location']) 
                    ? nl2br(htmlspecialchars($product['display_location'])) 
                    : 'No description available.'; ?>
            </p>

            <p>
                <?php 
                    if (isset($product['quantity']) && $product['quantity'] > 0) {
                        echo "<span class='text-success'>In Stock: ".$product['quantity']."</span>";
                    } else {
                        echo "<span class='text-danger'>Out of Stock</span>";
                    }
                ?>
            </p>

            <?php if (isset($product['quantity']) && $product['quantity'] > 0) { ?>
                <form action="cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="number" name="quantity" value="1" min="1" class="form-control mb-3" style="width:100px;">
                    <button type="submit" name="add_cart" class="btn btn-primary">Add To Cart</button>
                </form>
            <?php } else { ?>
                <button class="btn btn-secondary" disabled>Out of Stock</button>
            <?php } ?>
        </div>
    </div>
</div>

<?php include(__DIR__ . "/includes/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
