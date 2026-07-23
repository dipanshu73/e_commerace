<?php

include('admin/conn.php');
include('header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<div class="container my-5">
    <h2>My Profile</h2>
    
    <p>Name: <?php echo $user['username']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
    
</div>
<?php include('footer.php'); ?>