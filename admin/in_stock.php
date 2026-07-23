<?php include('conn.php'); ?>
<?php include('header.php'); ?>

<div class="container mt-5">
    <h1>In Stock</h1>

    <?php
        $edit_mode = false;
        $edit_id = "";
        $edit_product = "";
        $edit_size = "";
        $edit_qty = "";
        $edit_price = "";
        $edit_remark = "";

        if (isset($_GET['edit_id'])) {
            $edit_id = $_GET['edit_id'];
            $edit_sql = "SELECT * FROM in_stock WHERE id='$edit_id'";
            $edit_result = mysqli_query($conn, $edit_sql);
            if ($edit_result && mysqli_num_rows($edit_result) > 0) {
                $edit_row = mysqli_fetch_assoc($edit_result);
                $edit_mode = true;
                $edit_product = $edit_row['product_id'];
                $edit_size = $edit_row['size'];
                $edit_qty = $edit_row['quantity_added'];
                $edit_price = $edit_row['purchase_price'];
                $edit_remark = $edit_row['remarks'];
            }
        }

        if (isset($_POST['save_stock'])) {
            $product_id = $_POST['product_id'];
            $size = $_POST['size'];
            $quantity_added = $_POST['quantity_added'];
            $purchase_price = $_POST['purchase_price'];
            $remarks = $_POST['remarks'];
            $date = date('Y-m-d H:i:s');

            if (!empty($_POST['edit_id'])) {
                $id = $_POST['edit_id'];
                $update_sql = "UPDATE in_stock 
                               SET product_id='$product_id', size='$size', quantity_added='$quantity_added', 
                                   purchase_price='$purchase_price', remarks='$remarks' 
                               WHERE id='$id'";
                if (mysqli_query($conn, $update_sql)) {
                    echo "<div class='alert alert-success'>Stock updated successfully!</div>";
                    header("Refresh:1; url=in_stock.php");
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Error updating stock: " . mysqli_error($conn) . "</div>";
                }
            } else {
                $check_sql = "SELECT * FROM in_stock WHERE product_id='$product_id' AND size='$size'";
                $check_result = mysqli_query($conn, $check_sql);

                if (mysqli_num_rows($check_result) > 0) {
                    echo "<div class='alert alert-warning'>Stock for this product and size already exists!</div>";
                } else {
                    $insert_sql = "INSERT INTO in_stock (product_id, size, quantity_added, purchase_price, remarks, add_date) 
                                   VALUES ('$product_id', '$size', '$quantity_added', '$purchase_price', '$remarks', '$date')";
                    if (mysqli_query($conn, $insert_sql)) {
                        echo "<div class='alert alert-success'>Stock added successfully!</div>";
                        header("Refresh:1; url=in_stock.php");
                        exit;
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                    }
                }
            }
        }

        if (isset($_GET['delete_id'])) {
            $delete_id = $_GET['delete_id'];
            $del_sql = "DELETE FROM in_stock WHERE id='$delete_id'";
            if (mysqli_query($conn, $del_sql)) {
                echo "<div class='alert alert-success'>Stock deleted successfully!</div>";
                header("Refresh:1; url=in_stock.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error deleting stock: " . mysqli_error($conn) . "</div>";
            }
        }

        $sql = "SELECT s.id, p.product_name, c.category_name, s.size, s.quantity_added, 
                       s.purchase_price, s.add_date, s.remarks, s.product_id
                FROM in_stock s 
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
                        $prod_sql = "SELECT id, product_name FROM products";
                        $prod_result = mysqli_query($conn, $prod_sql);
                        while($prod = mysqli_fetch_assoc($prod_result)) {
                            $selected = ($edit_mode && $prod['id'] == $edit_product) ? "selected" : "";
                            echo "<option value='".$prod['id']."' $selected>".$prod['product_name']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-bold">Size</label>
                <input type="text" name="size" class="form-control" value="<?php echo $edit_mode ? $edit_size : ''; ?>">
            </div>
            <div class="col-md-2">
                <label class="form-label fw-bold">Quantity</label>
                <input type="number" name="quantity_added" class="form-control" value="<?php echo $edit_mode ? $edit_qty : ''; ?>" required>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-bold">Price</label>
                <input type="text" name="purchase_price" class="form-control" value="<?php echo $edit_mode ? $edit_price : ''; ?>" required>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Remarks</label>
                <input type="text" name="remarks" class="form-control" value="<?php echo $edit_mode ? $edit_remark : ''; ?>">
            </div>
            <div class="col-md-12">
                <button type="submit" name="save_stock" class="btn btn-<?php echo $edit_mode ? 'warning' : 'success'; ?> mt-3">
                    <?php echo $edit_mode ? 'Update Stock' : 'Add Stock'; ?>
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
                <th>Size</th>
                <th>Quantity</th>
                <th>Purchase Price</th>
                <th>Date Added</th>
                <th>Remarks</th>
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
                        <td><?php echo $row['size']; ?></td>
                        <td><?php echo $row['quantity_added']; ?></td>
                        <td><?php echo $row['purchase_price']; ?></td>
                        <td><?php if(isset($row['add_date'])) { echo date("d-m-Y H:i A", strtotime($row['add_date']));} ?></td>
                        <td><?php echo $row['remarks']; ?></td>
                        <td>
                            <a href="in_stock.php?edit_id=<?php echo $row['id']; ?>" 
                               class="btn btn-warning btn-sm me-1">Edit</a>
                            <a href="in_stock.php?delete_id=<?php echo $row['id']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this stock record?');">
                               Delete
                            </a>
                        </td>
                    </tr>
            <?php } } else { ?>
                    <tr>
                        <td colspan="9" class="text-center">No items in stock</td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include('footer.php'); ?>
