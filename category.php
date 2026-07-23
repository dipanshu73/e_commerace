<?php
include('admin/conn.php'); 
$category_id = (isset($_GET['id']))?$_GET['id'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dresses, Sarees & Kurtis - Myntra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#f9f9f9; font-family:"Segoe UI",Tahoma,Verdana,sans-serif; }
    .card { border:none; box-shadow:0 0 10px rgba(0,0,0,0.1); transition:transform 0.2s; }
    .card:hover { transform:scale(1.03); }
    .card-img-top { object-fit:cover; height:250px; }
    .btn-cart { background:#dc3545; color:#fff; border:none; }
    .btn-cart:hover { background:#b71c1c; }
    footer { background:#222; color:#fff; text-align:center; padding:15px; margin-top:40px; }
    .navbar a:hover { color:#dc3545 !important; }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-danger" href="index.php">Myntra</a>
  </div>
</nav>
<div class="container mb-5">
  <h2 class="text-center mb-4">Featured Women's Products</h2>
  <div class="row">
    <?php
      $sql = "SELECT * FROM products WHERE category_id  = '$category_id'  ORDER BY id";
      $pro_result = mysqli_query($conn,$sql);
    ?>
   
    <!-- Product List Fetch From DB -->
     <?php while($product = mysqli_fetch_array($pro_result)){ ?>
    <div class="col-md-3 mb-4">
      <div class="card shadow">
        <img src="<?php echo $product['image_path']; ?>" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5><?php echo $product['product_name']; ?></h5>
          <h4 class="text-danger">₹<?php echo $product['price']; ?></h4>
          <a href="product_details.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=<?php echo $product['id']; ?>" class="btn btn-cart">Add To Cart</a>
        </div>
      </div>
    </div>
   <?php } ?>

   

  </div> <!-- row end -->
</div> <!-- container end -->

<footer>
  <p class="mb-0">© 2026 Myntra | Women's Collection | All Rights Reserved</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showMore() {
  document.getElementById("more-dresses").classList.remove("d-none");
  document.querySelector("button.btn-danger").style.display = "none";
}
</script>
</body>
</html>