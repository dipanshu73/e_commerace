<?php
session_start();
include('admin/conn.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$product_id = $_GET['id']; // product id from URL

// Handle review submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $review = mysqli_real_escape_string($conn, $_POST['review']);
    $rating = (int)$_POST['rating'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO product_reviews (product_id, user_id, rating, review, created_at) 
              VALUES ('$product_id', '$user_id', '$rating', '$review', NOW())";
    if (mysqli_query($conn, $query)) {
        echo "<p style='color:green'>Review submitted successfully!</p>";
    } else {
        echo "<p style='color:red'> Error: " . mysqli_error($conn) . "</p>";
    }
}

// Fetch product details
$product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id='$product_id'"));

// Fetch reviews
$reviews = mysqli_query($conn, "SELECT r.*, u.username 
                                FROM product_reviews r 
                                JOIN users1 u ON r.user_id = u.id 
                                WHERE product_id='$product_id' 
                                ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?> - Reviews</title>
    <style>
        body { font-family: Arial; background:#f9f9f9; }
        .container { width: 700px; margin: auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px #ccc; }
        .review-box { border-bottom:1px solid #ddd; padding:10px 0; }
        .rating { color: orange; font-weight:bold; }
        textarea, input { width:100%; padding:8px; margin:8px 0; }
        button { padding:10px 20px; background:#007bff; color:#fff; border:none; border-radius:5px; cursor:pointer; }
        button:hover { background:#0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h2><?php echo $product['name']; ?></h2>
    <p><?php echo $product['description']; ?></p>

    <h3>Leave a Review</h3>
    <form method="POST">
        <label>Rating (1-5):</label>
        <input type="number" name="rating" min="1" max="5" required>
        <textarea name="review" rows="4" placeholder="Write your review..." required></textarea>
        <button type="submit">Submit Review</button>
    </form>

    <h3>Customer Reviews</h3>
    <?php if(mysqli_num_rows($reviews) > 0) { ?>
        <?php while($r = mysqli_fetch_assoc($reviews)) { ?>
            <div class="review-box">
                <strong><?php echo $r['username']; ?></strong> 
                <span class="rating"><?php echo $r['rating']; ?>/5</span><br>
                <p><?php echo $r['review']; ?></p>
                <small><?php echo $r['created_at']; ?></small>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p>No reviews yet. Be the first to review!</p>
    <?php } ?>
</div>
</body>
</html>
