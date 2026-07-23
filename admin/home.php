<?php
include('conn.php');
$result = mysqli_query($conn, "SELECT * FROM categories WHERE show_on_home=1 ORDER BY id DESC");
?>

<div class="container mt-5">
    <h2>Featured Categories</h2>
    <div class="row">
        <?php if ($result && mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['category_name']); ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['category_name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                        </div>
                    </div>
                </div>
        <?php } } else {
            echo "<p>No categories selected for homepage.</p>";
        } ?>
    </div>
</div>
