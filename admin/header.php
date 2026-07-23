<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location:../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>
   
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Inventory</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="products.php">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="categories.php">Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="in_stock.php">In Stock</a></li>
        <li class="nav-item"><a class="nav-link" href="out_stock.php">Out Stock</a></li>
        <li class="nav-item"><a  class="nav-link"  href="order_list.php">Order List</a></li>
     


      </ul>

         <!-- Logout button (right side) -->
      <form class="d-flex">
        <a href="logout.php" class="btn btn-danger">Logout</a>
      </form>
    </div>
  </div>
</nav>

