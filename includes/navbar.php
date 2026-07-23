<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand" href="index.php">e_comm</a>

    <!-- Toggle button for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar items + Search -->
    <div class="collapse navbar-collapse" id="menu">
      <!-- Search box -->
      <form class="d-flex mx-auto search-box" action="search.php" method="GET">
        <input class="form-control" id="search" name="query" type="search" placeholder="Search Women's Fashion">
        <button class="btn btn-danger ms-2" type="submit">Search</button>
      </form>

      <!-- Right side links -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <li class="nav-item"><a class="btn btn-danger ms-2" href="register.php">Register</a></li>
      </ul>
    </div>
  </div>
</nav>
