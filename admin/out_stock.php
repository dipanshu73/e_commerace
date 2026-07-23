<?php include('conn.php'); ?>
<?php include('header.php'); ?>

<div class="container mt-5">
    <h1>Out Stock</h1>

    <?php
        $edit_mode = false;
        $edit_id = "";
        $edit_product = "";
        $edit_qty = "";
        $edit_reason = "";
        $edit_remark = "";

        if (isset($_GET['edit_id'])) {
            $edit_id = $_GET['edit_id'];
            $edit_sql = "SELECT * FROM stocks_out WHERE id='$edit_id'";
            $edit_result = mysqli_query($conn, $edit_sql);
            if ($edit_result && mysqli_num_rows($edit_result) > 0) {
                $edit_row = mysqli_fetch_assoc($edit_result);
                $edit_mode = true;
                $edit_product = $edit_row['product_id'];
                $edit_qty = $edit_row['quantity_removed'];
                $edit_reason = $edit_row['reason'];
                $edit_remark = $edit_row['remark'];
            }
        }

        if (isset($_POST['save_out_stock'])) {
            $product_id = $_POST['product_id'];
            $quantity_removed = $_POST['quantity_removed'];
            $reason = $_POST['reason'];
            $remark = $_POST['remark'];

            if (!empty($_POST['edit_id'])) {
                $id = $_POST['edit_id'];
                $update_sql = "UPDATE stocks_out 
                               SET product_id='$product_id', quantity_removed='$quantity_removed', 
                                   reason='$reason', remark='$remark' 
                               WHERE id='$id'";
                if (mysqli_query($conn, $update_sql)) {
                    echo "<div class='alert alert-success'>Record updated successfully!</div>";
                    header("Refresh:1; url=out_stock.php");
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Error updating record: " . mysqli_error($conn) . "</div>";
                }
            } else {
                $insert_sql = "INSERT INTO stocks_out (product_id, quantity_removed, reason, remark, add_date)
                               VALUES ('$product_id', '$quantity_removed', '$reason', '$remark', NOW())";
                if (mysqli_query($conn, $insert_sql)) {
                    echo "<div class='alert alert-success'>Record added successfully!</div>";
                    header("Refresh:1; url=out_stock.php");
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Error adding record: " . mysqli_error($conn) . "</div>";
                }
            }
        }

        if (isset($_GET['delete_id'])) {
            $delete_id = $_GET['delete_id'];
            $del_sql = "DELETE FROM stocks_out WHERE id='$delete_id'";
            if (mysqli_query($conn, $del_sql)) {
                echo "<div class='alert alert-success'>Record deleted successfully!</div>";
                header("Refresh:1; url=out_stock.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error deleting record: " . mysqli_error($conn) . "</div>";
            }
        }

        $sql = "SELECT s.id, s.product_id, p.product_name, c.category_name, 
                       s.quantity_removed, s.reason, s.remark, s.add_date
                FROM stocks_out s
                JOIN products p ON s.product_id = p.id
                LEFT JOIN categories c ON p.category_id = c.id
                ORDER BY s.id DESC";
        $result = mysqli_query($conn, $sql);
    ?>

  
    <form method="POST" action="" class="p-4 border rounded shadow-sm bg-light mb-4">
        <input type="hidden" name="edit_id" value="<?php echo $edit_mode ? $edit_id : ''; ?>">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label fw-bold">Product</label>
                <select name="product_id" class="form-select" required>
                    <option value="">Select Product</option>
                    <?php
                        $prod_sql = "SELECT id, product_name FROM products ORDER BY product_name ASC";
                        $prod_result = mysqli_query($conn, $prod_sql);
                        while($prod = mysqli_fetch_assoc($prod_result)) {
                            $selected = ($edit_mode && $prod['id'] == $edit_product) ? "selected" : "";
                            echo "<option value='".$prod['id']."' $selected>".$prod['product_name']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Quantity Removed</label>
                <input type="number" name="quantity_removed" class="form-control" 
                       value="<?php echo $edit_mode ? $edit_qty : ''; ?>" required>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Reason</label>
                <input type="text" name="reason" class="form-control" 
                       value="<?php echo $edit_mode ? $edit_reason : ''; ?>" required>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Remark</label>
                <input type="text" name="remark" class="form-control" 
                       value="<?php echo $edit_mode ? $edit_remark : ''; ?>">
            </div>
            <div class="col-md-12">
                <button type="submit" name="save_out_stock" class="btn btn-<?php echo $edit_mode ? 'warning' : 'success'; ?> mt-3">
                    <?php echo $edit_mode ? 'Update Out Stock' : 'Add Out Stock'; ?>
                </button>
            </div>
        </div>
    </form>

  
    <table class="table table-bordered table-hover table-striped mt-3 shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Quantity Removed</th>
                <th>Reason</th>
                <th>Remark</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if ($result && mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['quantity_removed']; ?></td>
                            <td><?php echo $row['reason']; ?></td>
                            <td><?php echo $row['remark']; ?></td>
                            <td><?php echo date("d-m-Y H:i", strtotime($row['add_date'])); ?></td>
                            <td>
                                <a href="out_stock.php?edit_id=<?php echo $row['id']; ?>" 
                                   class="btn btn-warning btn-sm me-1">Edit</a>
                                <a href="out_stock.php?delete_id=<?php echo $row['id']; ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this record?');">
                                   Delete
                                </a>
                            </td>
                        </tr>
            <?php } } else { ?>
                        <tr>
                            <td colspan="8" class="text-center">No out stock records found</td>
                        </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include('footer.php'); ?>
