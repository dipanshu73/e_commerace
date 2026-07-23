<?php
session_start();
include('conn.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
        $_SESSION['user'] = $row['username'];
        header("Location: products.php"); 
        exit;
    } else {
        $_SESSION['error'] = "Invalid password!";
        header("Location: login.php");
        exit;
    }
} else {
    $_SESSION['error'] = "User not found!";
    header("Location: login.php");
    exit;
}
?>
