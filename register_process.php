<?php
session_start();
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $gender = trim($_POST['gender']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $pincode = trim($_POST['pincode']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password check
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: register.php");
        exit();
    }

    // Email check
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['error'] = "Email already exists.";
        header("Location: register.php");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql = "INSERT INTO users(full_name,email,phone,gender,address,city,pincode,password)
            VALUES('$full_name','$email','$phone','$gender','$address','$city','$pincode','$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Registration Successful. Please login.";
        header("Location: login.php");
    } else {
        $_SESSION['error'] = "Registration Failed.";
        header("Location: register.php");
    }
    exit();
}
?>
