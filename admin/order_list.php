<?php
include('conn.php');
include('header.php');

// Search filter
$search = "";
if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM order_list 
              WHERE customer_name LIKE '%$search%' 
              OR product_name LIKE '%$search%' 
              OR payment_method LIKE '%$search%' 
              OR status LIKE '%$search%' 
              ORDER BY order_date DESC";
} else {
    $query = "SELECT * FROM order_list ORDER BY order_date DESC";
}

$result = mysqli_query($conn, $query);
?>

<div class="container mt-5">
    <h2 class="mb-4">Order List</h2>

    <!-- Search Form -->
    <form class="d-flex mb-3" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search orders..." value="<?php echo $search; ?>">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['payment_method']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo date('d-m-Y H:i', strtotime($row['order_date'])); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include('footer.php'); ?>
