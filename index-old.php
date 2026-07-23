<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  include('admin/conn.php');
  session_start();

  // Fetch products from database
  $fetch_sql = "SELECT * FROM products";
  $result = mysqli_query($conn, $fetch_sql);
?>

<?php include('header.php'); ?>

<!-- Hero Banner -->
<div class="hero-banner">
  <div class="container">
    <h1>New Women Clothing Collection</h1>
  </div>
</div>

<!-- Product Section -->
<div class="container mt-5">
  <h2 class="mb-4">Products</h2>

  <div class="products">
    <?php if (mysqli_num_rows($result) > 0) { ?>
    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-3 mb-4">
              

          <div class="card product-card p-0">
            <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['product_name']; ?>">
            <div class="card-body">
             
              

              <h3>₹<?php echo $row['price']; ?></h3>

              <p><?php echo $row['product_name']; ?></p>

              <div class="buttons">
                <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-success">
                  Add to Cart
                </a>

                <a href="buy_now.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">
                  Buy Now
                </a>
              </div>
            </div>
            
          </div>
        </div>
      <?php } ?>
    </div>
  
    <?php } else { ?>

      <p>No products found.</p>

    <?php } ?>
  </div>
</div>

<?php include('footer.php'); ?>