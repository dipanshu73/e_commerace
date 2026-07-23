<?php
include('admin/conn.php');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <h1 class="mb-4 text-center">New Women Collection</h1>

  <div class="row">
    <?php 
      $sql = "SELECT p.id, p.product_name, p.price, c.categories_name 
              FROM products p 
              LEFT JOIN categories c ON p.category_id = c.id
              ORDER BY p.id DESC";
      $result = mysqli_query($conn, $sql);

      if ($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>
          <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
              <img src="images/t_shirt.jpg/<?php echo $row['id']; ?>.jpg" 
                   class="card-img-top" 
                   alt="<?php echo $row['product_name']; ?>">

              <div class="card-body text-center">
                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                <p class="card-text fw-bold">$<?php echo $row['price']; ?></p>
                <small class="text-muted"><?php echo $row['categories_name']; ?></small><br><br>

                <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Add to Cart</a>
                <a href="product_details.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Buy Now</a>
              </div>
            </div>
          </div>
    <?php } 
      } else { ?>
        <p class="text-center">No products found</p>
    <?php } ?>
  </div>

 
  <div class="text-center mt-5">
    <h3>Explore Stylish Shoes</h3>
    <img src="images/shozie.webp" class="img-fluid rounded shadow-sm mt-3" alt="Beige Chunky Sneakers" style="max-width:300px;">
    <br>
    <a href="shoes.php" class="btn btn-outline-dark mt-3">View Shoes Collection</a>
  </div>
</div>