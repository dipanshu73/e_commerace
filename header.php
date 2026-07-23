
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Myntra Style E-Commerce</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3">
          <div class="logo">Myntra</div>
        </div>
        <div class="col-md-9">
          <div class="menu">
            <ul>
              <li>
                <a href="index.php">Home</a>
              </li>

              <li>
                <a href="about.php">About</a>
              </li>

              <li>
                <a href="gallery.php">Gallery</a>
              </li>

              <li>
                <a href="#contact">Contact Us</a>
              </li>

              <li>
                <a href="cart.php">Cart</a>
              </li>

              <?php if (!isset($_SESSION['user_id'])) { ?>
                <li>
                  <a href="login.php">Login</a>
                </li>
              <?php } else { ?>
                <li>
                  <a href="profile.php">My Profile</a>
                </li>

                <li>
                  <a href="logout.php">Logout</a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>



