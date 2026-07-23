<?php include('admin/conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Myntra - Women's Collection</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
/* ====== GLOBAL STYLES ====== */
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f9f9f9;
  margin: 0;
  padding: 0;
}

/* ====== HERO SECTION ====== */
.hero {
  position: relative;
  background: url('images/hero-bg.jpg') center/cover no-repeat;
  height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  text-align: center;
  overflow: hidden;
}
.hero::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.2);
}
.hero .container {
  position: relative;
  z-index: 1;
  animation: fadeIn 2s ease-in-out;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* ====== NAVBAR BUTTONS ====== */
.btn-danger {
  background-color: #dc3545 !important;
  border: none !important;
  color: #fff !important;
  font-size: 14px;
  padding: 6px 16px;
  border-radius: 6px;
  transition: all 0.3s ease;
  margin: 0 6px;
  box-shadow: 0 3px 6px rgba(220, 53, 69, 0.3);
}
.btn-danger:hover {
  background-color: #b71c1c !important;
  transform: scale(1.05);
  box-shadow: 0 5px 10px rgba(183, 28, 28, 0.4);
}

/* ====== CATEGORY BUTTONS ====== */
.category-buttons {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 15px;
  margin: 20px 0 30px;
}
.cat-btn {
  background-color: #dc3545;
  color: #fff;
  border: none;
  border-radius: 25px;
  padding: 10px 20px;
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
}
.cat-btn:hover {
  background-color: #b71c1c;
  transform: translateY(-3px);
  box-shadow: 0 6px 12px rgba(183, 28, 28, 0.4);
}

/* ====== PRODUCT BUTTONS ====== */
.btn-cart {
  background-color: #dc3545;
  color: #fff;
  border: none;
  font-size: 13px;
  padding: 5px 12px;
  border-radius: 6px;
  transition: 0.3s;
  margin: 4px;
  box-shadow: 0 2px 5px rgba(220, 53, 69, 0.3);
}
.btn-cart:hover {
  background-color: #b71c1c;
  transform: scale(1.05);
}

/* ====== CARD IMAGE ====== */
.card img {
  object-fit: cover;
  border-radius: 6px 6px 0 0;
}

/* ====== FOOTER ====== */
footer {
  background-color: #222;
  color: #fff;
  text-align: center;
  padding: 15px;
  font-size: 14px;
}

</body>
</style>      
<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-danger" href="#">Myntra</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <form method="GET" action="search.php" class="d-flex mx-auto search-box">
        <input name="keyword" class="form-control" id="search" type="search" placeholder="Search Women's Fashion">
      </form>

      <ul class="navbar-nav ms-auto">
        <a href="index.php" class="btn btn-danger btn-lg">Home</a>
        <a href="contact.php" class="btn btn-danger btn-lg">Contact</a>
        <a href="register.php" class="btn btn-danger btn-lg">Register</a>
        <a href="login.php" class="btn btn-danger btn-lg">Login</a>
        <a href="about.php" class="btn btn-danger btn-lg">About</a>
        <a href="gallery.php" class="btn btn-danger btn-lg">View Gallery</a>
      </ul>
    </div>
  </div>
</nav>

<!-- ================= HERO SECTION ================= -->
<section class="hero">
  <div class="container">
    <h1>Explore Our Gallery</h1>
    <p>Stylish Collections, Elegant Designs & Trendy Looks</p>
    <a href="gallery.php" class="btn btn-danger">View Gallery</a>
  </div>
</section>

<!-- ================= CATEGORIES ================= -->
<div class="container my-5">
  <h2 class="text-center mb-4">Shop By Category</h2>

  
  <?php $result_cat =mysqli_query($conn,"SELECT * FROM categories WHERE show_on_home = 1 ORDER BY id DESC LIMIT 4"); ?>
  <div class="row">
    <!-- Dresses -->
    <?php while($category =  mysqli_fetch_array($result_cat)) { ?>
    <div class="col-md-3 mb-4">
      <a href="category.php?id=<?php echo $category['id']; ?>" style="text-decoration:none; color:inherit;">
        <div class="card shadow">
          <img src="admin/<?php echo $category['image']; ?>" class="card-img-top" height="220">
          <div class="card-body text-center">
            <button class="cat-btn"><?php echo $category['category_name']; ?></button>
          </div>

          
        </div>
      </a>
    </div>
    <?php } ?>

    <!-- Tops & Tees -->
    <!-- <div class="col-md-3 mb-4">
      <a href="view_tops.php" style="text-decoration:none; color:inherit;">
        <div class="card shadow">
          <img src="images/shirt.webp" class="card-img-top" height="220">
          <div class="card-body text-center">
            <button class="cat-btn">Tops & Tees</button>
          </div>
        </div>
      </a>
    </div> -->

    <!-- Footwear -->
    <!-- <div class="col-md-3 mb-4">
      <a href="view_footwear.php" style="text-decoration:none; color:inherit;">
        <div class="card shadow">
          <img src="images/Streetfit enterprises Canvas Shoes For Women (Black , 4).webp" class="card-img-top" height="220">
          <div class="card-body text-center">
             <button class="cat-btn">Footwear</button>
          </div>
        </div>
      </a>
    </div> -->

    <!-- Bags & Accessories -->
    <!-- <div class="col-md-3 mb-4">
      <a href="view_bags.php" style="text-decoration:none; color:inherit;">
        <div class="card shadow">
          <img src="images/bag anda.jpg" class="card-img-top" height="220">
          <div class="card-body text-center">
            <button class="cat-btn">Bags & Accessories</button>
          </div>
        </div>
      </a>
    </div> -->
  </div>
</div>


<!-- ================= FEATURED PRODUCTS ================= -->
<div class="container mb-5">
  <h2 class="text-center mb-4">Featured Women's Products</h2>
  <div class="row">
    <?php
      $sql = "SELECT * FROM products ORDER BY id";
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

<!-- ================= FOOTER ================= -->
<footer>
  <p class="mb-0">© 2026 Myntra | Women's Collection | All Rights Reserved</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
