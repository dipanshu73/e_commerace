<?php include('conn.php'); ?>
<?php include('header.php'); ?>

<div class="container mt-5">
    <h1 class="mb-4">Products Management</h1>

    <?php
        $edit_mode = false;
        $edit_id = "";
        $edit_name = "";
        $edit_category = "";
        $edit_price = "";
        $edit_display = "category_list";

        $image_path = "";
        if(isset($_FILES['image_path']) && $_FILES['image_path']['error']==0){
            $dir = "../uploads/";
            if(!is_dir($dir)){ mkdir($dir,0777,true); }
            $name = time()."_".basename($_FILES['image_path']['name']);
            if(move_uploaded_file($_FILES['image_path']['tmp_name'],$dir.$name)){
                $image_path = "uploads/".$name;
            }
        }


        if (isset($_GET['edit_id'])) {
            $edit_id = $_GET['edit_id'];
            $edit_sql = "SELECT * FROM products WHERE id='$edit_id'";
            $edit_result = mysqli_query($conn, $edit_sql);
            if ($edit_result && mysqli_num_rows($edit_result) > 0) {
                $edit_row = mysqli_fetch_assoc($edit_result);
                $edit_mode = true;
                $edit_name = $edit_row['product_name'];
                $edit_category = $edit_row['category_id'];
                $edit_price = $edit_row['price'];
                $edit_display = $edit_row['display_location'];
            }
        }

        if (isset($_POST['save_product'])) {
            $product_name = $_POST['product_name'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $display_location = $_POST['display_location'];

            if (!empty($_POST['edit_id'])) {
                $id = $_POST['edit_id'];

                if($image_path!=""){
                    $update_sql = "UPDATE products SET
                    product_name='$product_name',
                    category_id='$category_id',
                    price='$price',
                    display_location='$display_location',
                    image_path ='$image_path'
                    WHERE id='$id'";
                }else{
                    $update_sql = "UPDATE products SET
                    product_name='$product_name',
                    category_id='$category_id',
                    price='$price',
                    display_location='$display_location'
                    WHERE id='$id'";
                }

                if (mysqli_query($conn, $update_sql)) {
                    echo "<div class='alert alert-success'>Product updated successfully!</div>";
                    header("Refresh:1; url=products.php");
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Error updating product: " . mysqli_error($conn) . "</div>";
                }
            } else {
                $insert_sql="INSERT INTO products
                (product_name,category_id,price,image_path,display_location,created_at)
                VALUES
                ('$product_name','$category_id','$price','$image_path','$display_location',NOW())";

                if (mysqli_query($conn, $insert_sql)) {
                    echo "<div class='alert alert-success'>Product added successfully!</div>";
                    header("Refresh:1; url=products.php");
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Error adding product: " . mysqli_error($conn) . "</div>";
                }
            }
        }

        if (isset($_GET['delete_id'])) {
            $delete_id = $_GET['delete_id'];
            $del_sql = "DELETE FROM products WHERE id='$delete_id'";

            if (mysqli_query($conn, $del_sql)) {
                echo "<div class='alert alert-success'>Product deleted successfully!</div>";
                header("Refresh:1; url=products.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error deleting product: " . mysqli_error($conn) . "</div>";
            }
        }

        $sql = "SELECT p.id, p.product_name, c.category_name, p.price,
                       p.created_at, p.category_id, p.display_location,
                       p.image_path
                FROM products p
                LEFT JOIN categories c ON p.category_id = c.id
                ORDER BY p.id DESC";

        $result = mysqli_query($conn, $sql);
    ?>

    <form method="POST" action="" enctype="multipart/form-data"
          class="p-4 border rounded shadow-sm bg-light mb-4">

        <input type="hidden" name="edit_id"
               value="<?php echo $edit_mode ? $edit_id : ''; ?>">

        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label fw-bold">Product Name</label>

                <input type="text" name="product_name"
                       class="form-control"
                       value="<?php echo $edit_mode ? $edit_name : ''; ?>"
                       required>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">Category</label>

                <select name="category_id" class="form-select">
                    <option value="">Select Category</option>

                    <?php
                        $cat_sql = "SELECT id, category_name FROM categories";
                        $cat_result = mysqli_query($conn, $cat_sql);

                        while($cat = mysqli_fetch_assoc($cat_result)) {
                            $selected =
                                ($edit_mode && $cat['id'] == $edit_category)
                                ? "selected"
                                : "";

                            echo "<option value='".$cat['id']."' $selected>".
                                 $cat['category_name'].
                                 "</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label fw-bold">Price</label>

                <input type="text" name="price"
                       class="form-control"
                       value="<?php echo $edit_mode ? $edit_price : ''; ?>"
                       required>
            </div>

            <div class="col-md-2">
                <label class="form-label fw-bold">Display Location</label>

                <select name="display_location" class="form-select">
                    <option value="category_list"
                        <?php if($edit_display=='category_list') echo 'selected'; ?>>
                        Show in Category List
                    </option>

                    <option value="separate_list"
                        <?php if($edit_display=='separate_list') echo 'selected'; ?>>
                        Show in Separate List
                    </option>

                    <option value="hidden"
                        <?php if($edit_display=='hidden') echo 'selected'; ?>>
                        Hide for now
                    </option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">Product Image</label>

                <input type="file" name="image_path"
                       class="form-control" accept="image/*">

                <?php if($edit_mode && !empty($edit_row['image_path'])) { ?>
                    <img src="../<?php echo $edit_row['image_path']; ?>"
                         width="80" class="mt-2">
                <?php } ?>
            </div>

            <div class="col-md-2">
                <button type="submit" name="save_product"
                        class="btn btn-<?php echo $edit_mode ? 'warning' : 'primary'; ?> w-100 mt-4">

                    <?php echo $edit_mode ? 'Update Product' : 'Add Product'; ?>
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
                <th>Price</th>
                <th>Display Location</th>
                <th>Image</th>
                <th>Date Added</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
            ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['price']; ?></td>

                    <td>
                        <?php
                            if($row['display_location']=='category_list') {
                                echo "Category List";
                            } elseif($row['display_location']=='separate_list') {
                                echo "Separate List";
                            } else {
                                echo "Hidden";
                            }
                        ?>
                    </td>

                    <td>
                        <?php if($row['image_path']!=""){ ?>
                            <img src="../<?php echo $row['image_path']; ?>"
                                 width="70">
                        <?php } ?>
                    </td>

                    <td>
                        <?php
                            if(isset($row['created_at'])){
                                echo date(
                                    "d-m-Y H:i A",
                                    strtotime($row['created_at'])
                                );
                            }
                        ?>
                    </td>

                    <td>
                        <a href="products.php?edit_id=<?php echo $row['id']; ?>"
                           class="btn btn-warning btn-sm me-1">
                            Edit
                        </a>

                        <a href="products.php?delete_id=<?php echo $row['id']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this product?');">
                            Delete
                        </a>
                    </td>
                </tr>

            <?php
                    }
                } else {
            ?>

                <tr>
                    <td colspan="8" class="text-center">
                        No products found
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <h3 class="mt-5">Separate List Products</h3>

    <table class="table table-bordered table-striped shadow-sm">
        <thead class="table-secondary">
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $sep_sql = "SELECT p.product_name, p.price, c.category_name
                            FROM products p
                            JOIN categories c ON p.category_id=c.id
                            WHERE p.display_location='separate_list'";

                $sep_result = mysqli_query($conn, $sep_sql);

                if ($sep_result && mysqli_num_rows($sep_result) > 0) {
                    while($sep_row = mysqli_fetch_assoc($sep_result)) {
            ?>

                <tr>
                    <td><?php echo $sep_row['product_name']; ?></td>
                    <td><?php echo $sep_row['category_name']; ?></td>
                    <td><?php echo $sep_row['price']; ?></td>
                </tr>

            <?php
                    }
                } else {
            ?>

                <tr>
                    <td colspan="3" class="text-center">
                        No separate list products found
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>