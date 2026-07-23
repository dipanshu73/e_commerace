<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Collection Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 text-center">
    <h2 class="fw-bold">Welcome, <?php echo $_SESSION['user']; ?> </h2>
    <p class="text-muted">Explore our latest collections below!</p>
    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
</div>
</body>
</html>
