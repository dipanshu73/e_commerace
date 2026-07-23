<?php
include("conn.php");
include("header.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$edit = false;
$editData = [];

// ---------------------- DELETE ----------------------
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    mysqli_query($conn,"DELETE FROM categories WHERE id=$id");
    header("Location: categories.php");
    exit;
}

// ---------------------- TOGGLE SHOW/HIDE ----------------------
if(isset($_GET['toggle'])){
    $id = intval($_GET['toggle']);
    $q = mysqli_query($conn,"SELECT show_on_home FROM categories WHERE id=$id");
    $d = mysqli_fetch_assoc($q);
    $newVal = $d['show_on_home']==1 ? 0 : 1;
    mysqli_query($conn,"UPDATE categories SET show_on_home=$newVal WHERE id=$id");
    header("Location: categories.php");
    exit;
}

// ---------------------- EDIT ----------------------
if(isset($_GET['edit'])){
    $id = intval($_GET['edit']);
    $edit = true;
    $res = mysqli_query($conn,"SELECT * FROM categories WHERE id=$id");
    $editData = mysqli_fetch_assoc($res);
}

// ---------------------- SAVE ----------------------
if(isset($_POST['save'])){
    $name = mysqli_real_escape_string($conn,trim($_POST['category_name']));
    $desc = mysqli_real_escape_string($conn,trim($_POST['description']));
    $show_home = isset($_POST['show_on_home']) ? 1 : 0;

    $image_path = "";
    if(isset($_FILES['image']) && $_FILES['image']['error']==0){
        $dir = "uploads/";
        if(!is_dir($dir)) mkdir($dir,0777,true);
        $filename = time()."_".basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'],$dir.$filename);
        $image_path = $dir.$filename;
    }

    mysqli_query($conn,"INSERT INTO categories(category_name,description,image,show_on_home,created_at)
        VALUES('$name','$desc','$image_path',$show_home,NOW())");
    header("Location: categories.php");
    exit;
}

// ---------------------- UPDATE ----------------------
if(isset($_POST['update'])){
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn,trim($_POST['category_name']));
    $desc = mysqli_real_escape_string($conn,trim($_POST['description']));
    $show_home = isset($_POST['show_on_home']) ? 1 : 0;

    $image_path = $editData['image'];
    if(isset($_FILES['image']) && $_FILES['image']['error']==0){
        $dir = "uploads/";
        if(!is_dir($dir)) mkdir($dir,0777,true);
        $filename = time()."_".basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'],$dir.$filename);
        $image_path = $dir.$filename;
    }

    mysqli_query($conn,"UPDATE categories SET category_name='$name',description='$desc',
        image='$image_path',show_on_home=$show_home WHERE id=$id");
    header("Location: categories.php");
    exit;
}
?>

<div class="container mt-5">

<h2 class="mb-4"><?php echo $edit ? "Edit Category" : "Add Category"; ?></h2>

<form method="POST" enctype="multipart/form-data">
<?php if($edit){ ?>
    <input type="hidden" name="id" value="<?php echo $editData['id']; ?>">
<?php } ?>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Category Name</label>
        <input type="text" name="category_name" class="form-control" required
               value="<?php echo $edit ? htmlspecialchars($editData['category_name']) : ''; ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label>Description</label>
        <input type="text" name="description" class="form-control"
               value="<?php echo $edit ? htmlspecialchars($editData['description']) : ''; ?>">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Category Image</label>
        <input type="file" name="image" class="form-control">
        <?php if($edit && !empty($editData['image'])){ ?>
            <br><img src="<?php echo $editData['image']; ?>" width="120" class="img-thumbnail">
        <?php } ?>
    </div>
    <div class="col-md-6 mb-3">
        <label class="mb-2">
            <input type="checkbox" name="show_on_home" value="1"
                <?php if($edit && $editData['show_on_home']==1) echo "checked"; ?>>
            Show Category On Home Page
        </label>
    </div>
</div>

<?php if($edit){ ?>
    <button type="submit" name="update" class="btn btn-success">Update Category</button>
    <a href="categories.php" class="btn btn-secondary">Cancel</a>
<?php } else { ?>
    <button type="submit" name="save" class="btn btn-primary">Add Category</button>
<?php } ?>
</form>

<hr class="my-5">

<h3>All Categories</h3>
<?php $result=mysqli_query($conn,"SELECT * FROM categories ORDER BY id DESC"); ?>
<table class="table table-bordered table-striped mt-3">
<thead class="table-dark">
<tr>
    <th>ID</th><th>Image</th><th>Name</th><th>Description</th>
    <th>Home</th><th>Created</th><th width="260">Action</th>
</tr>
</thead>
<tbody>
<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><img src="<?php echo $row['image']; ?>" width="70"></td>
    <td><?php echo htmlspecialchars($row['category_name']); ?></td>
    <td><?php echo htmlspecialchars($row['description']); ?></td>
    <td><?php echo $row['show_on_home']==1 ? "<span class='badge bg-success'>Visible</span>" : "<span class='badge bg-danger'>Hidden</span>"; ?></td>
    <td><?php echo $row['created_at']; ?></td>
    <td>
        <a href="categories.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="categories.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Category ?')">Delete</a>
        <a href="categories.php?toggle=<?php echo $row['id']; ?>" class="btn btn-info btn-sm text-white">Show / Hide Home</a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<?php include("footer.php"); ?>