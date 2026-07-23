<?php
session_start();
include('admin/conn.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$profile_pic = $_FILES['profile_pic']['name'];
$target = "uploads/" . basename($profile_pic);

// Move uploaded file to uploads folder
if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target)) {
    // Update database
    $query = "UPDATE users SET profile_pic='$profile_pic' WHERE id='$id'";
    mysqli_query($conn, $query);

    // Update session
    $_SESSION['profile_pic'] = $profile_pic;

    header("Location: profile.php");
    exit;
} else {
    echo "Error uploading file.";
}
?>
