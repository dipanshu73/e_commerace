<?php
include("db_connect.php");

// Fetch all products
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Women's Collection - View List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<style>
.card {
  border: none;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
  transition: transform 0.2s;
}
.card:hover { transform: scale(1.03); }
.btn-cart {
  background-color: #dc3545;
  color: #fff;
  border: none;
}
.btn-cart:hover { background-color: #b71c1c; }
</style>
</head>
<body>

<?php include("includes/navbar.php"); ?>

<div class="container mt-5">
  <h2 class="mb-4 text-center">All Products</h2>
  <div class="row">
    <?php while($product = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="assets/images/<?php echo !empty($product['image_path']) ? $product['image_path'] : 'default.jpg'; ?>" 
               class="card-img-top" height="250">
          <div class="card-body text-center">
            <h5><?php echo htmlspecialchars($product['product_name']); ?></h5>
            <h4 class="text-danger">₹<?php echo $product['price']; ?></h4>
            <p>
              <?php 
                if ($product['quantity'] > 0) {
                  echo "<span class='text-success'>In Stock: ".$product['quantity']."</span>";
                } else {
                  echo "<span class='text-danger'>Out of Stock</span>";
                }
              ?>
            </p>
            <a href="product_details.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-dark">View Details</a>
            <form action="cart.php" method="POST" class="d-inline">
              <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
              <input type="hidden" name="quantity" value="1">
              <button type="submit" name="add_cart" class="btn btn-cart">Add To Cart</button>
            </form>
          </div>
          <div class="category-buttons text-center mb-4">
           <a href="view_dresses.php">
            <button class="cat-btn">Dresses</button>
          </a>
           <a href="view_tops.php">
            <button class="cat-btn">Tops & Tees</button>
          </a>
              <a href="view_footwear.php">
             <button class="cat-btn">Footwear</button>
             </a>
              <a href="view_bags.php">
           <button class="cat-btn">Bags & Accessories</button>
          </a>
           </div>

        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php include("includes/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
