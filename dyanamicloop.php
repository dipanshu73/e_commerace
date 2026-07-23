<div class="row">
<?php 
  if ($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="images/<?php echo $row['id']; ?>.jpg" class="card-img-top" alt="<?php echo $row['product_name']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
            <p class="card-text">$<?php echo $row['price']; ?></p>
            <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Add to Cart</a>
            <a href="product_details.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Buy Now</a>
          </div>
        </div>
      </div>
<?php } } ?>
</div>
