<?php
include('admin/conn.php'); 
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

<div class="container mt-5">
  <h2 class="text-center mb-4">Dresses, Sarees & Kurtis</h2>

   <!-- First 10 Products -->
  <div class="row" id="dress-list">

    <!-- Product 1 -->
    <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/red_suit1.jpg" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Red Designer Suit</h5>
          <h4 class="text-danger">₹2499</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

    
    <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/saaaree.webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Elegant Silk Saree</h5>
          <h4 class="text-danger">₹2999</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

  
      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/shopping (4).webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti</h5>
          <h4 class="text-danger">₹1499</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/shopping (6).webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti</h5>
          <h4 class="text-danger">₹3299</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/puple_suit2.webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti multi colur</h5>
          <h4 class="text-danger">₹1249</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/suittt.jpg" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Red Kurti</h5>
          <h4 class="text-danger">₹1560</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/yellowsuit.webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Yellow Kurti</h5>
          <h4 class="text-danger">₹1799</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/sareeeaa.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Saree with Unstitched Blouse</h5>
          <h4 class="text-danger">₹3299</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/suit.webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti</h5>
          <h4 class="text-danger">₹1349</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/sd.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Saree with Unstitched Blouse</h5>
          <h4 class="text-danger">₹12399</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
  <div class="card">
    <img src="images/2.avif" class="card-img-top" height="250">
    <div class="card-body text-center">
      <h5>One Piece Skirt</h5>
      <h4 class="text-danger">₹1329</h4>
       <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
      <a href="#" class="btn btn-outline-dark">View Details</a>
      <button class="btn btn-cart">Add To Cart</button>
    </div>
  </div>
</div>


      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/punjabi-suit-for-women-9.jpg" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti</h5>
          <h4 class="text-danger">₹1599</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
       </div>
        <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/pink-orange-yellow-red-multicolor.webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Saree with Unstitched Blouse</h5>
          <h4 class="text-danger">₹4299</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>
  

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/l-mp-kimora-lemon-vaidehi-fashion-original-imahzhpdnxaf4f4y.webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti</h5>
          <h4 class="text-danger">₹1329</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
  <div class="card">
    <img src="images/brown.webp" class="card-img-top" height="250">
    <div class="card-body text-center">
      <h5>One Piece Skirt</h5>
      <h4 class="text-danger">₹529</h4>
       <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
       <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
      <a href="#" class="btn btn-outline-dark">View Details</a>
      <button class="btn btn-cart">Add To Cart</button>
    </div>
  </div>
</div>

    <!-- Add more products till 10 -->
  </div>

  <!-- Hidden Products -->
  <div class="row d-none" id="more-dresses">
  
      <!-- Product 11 -->
    <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/ss.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Saree with Unstitched Blouse</h5>
          <h4 class="text-danger">₹1679</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/s-sara-decizeclothing-original-imahjnfnhguzrans.webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti</h5>
          <h4 class="text-danger">₹1359</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

         <div class="col-md-3 mb-4">
  <div class="card">
    <img src="images/baby_pink.jpg" class="card-img-top" height="250">
    <div class="card-body text-center">
      <h5>One Piece Skirt</h5>
      <h4 class="text-danger">₹729</h4>
       <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
      <a href="#" class="btn btn-outline-dark">View Details</a>
      <button class="btn btn-cart">Add To Cart</button>
    </div>
  </div>
</div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/20ecf2fVNANDTanviRed_1.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Saree with Unstitched Blouse</h5>
          <h4 class="text-danger">₹1688</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/sky.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti</h5>
          <h4 class="text-danger">₹1429</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>
      
              <div class="col-md-3 mb-4">
  <div class="card">
    <img src="images/red.avif" class="card-img-top" height="250">
    <div class="card-body text-center">
      <h5>One Piece Skirt</h5>
      <h4 class="text-danger">₹456</h4>
       <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
      <a href="#" class="btn btn-outline-dark">View Details</a>
      <button class="btn btn-cart">Add To Cart</button>
    </div>
  </div>
</div>

    <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/3xl-rohita-skyliner-original-imahfwz9nmrmtm7c.webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti</h5>
          <h4 class="text-danger">₹3329</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/s.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Saree with Unstitched Blouse</h5>
          <h4 class="text-danger">₹1698</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/sareee.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Saree with Unstitched Blouse</h5>
          <h4 class="text-danger">₹2679</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/puplee.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Saree with Unstitched Blouse</h5>
          <h4 class="text-danger">₹1569</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/yy.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Saree with Unstitched Blouse</h5>
          <h4 class="text-danger">₹1779</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

     <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/ww.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti</h5>
          <h4 class="text-danger">₹1559</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

     <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/-resized-original-imaheybwwgmgg5uf.webp" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Printed Kurti</h5>
          <h4 class="text-danger">₹1559</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>

      <div class="col-md-3 mb-4">
      <div class="card">
        <img src="images/PINK_1.avif" class="card-img-top" height="250">
        <div class="card-body text-center">
          <h5>Saree with Unstitched Blouse</h5>
          <h4 class="text-danger">₹1679</h4>
           <a href="product_details.php?id=11" class="btn btn-outline-dark">View Details</a>
          <a href="add_to_cart.php?id=11" class="btn btn-cart">Add To Cart</a>
          <a href="#" class="btn btn-outline-dark">View Details</a>
          <button class="btn btn-cart">Add To Cart</button>
        </div>
      </div>
    </div>


    <!-- Continue till Product 50 -->
  </div>

  <!-- See More Button -->
  <button class="btn btn-danger d-block mx-auto mt-4" onclick="showMore()">See More Dresses</button>
</div>

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