<?php
include('admin/conn.php'); 
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if($password == $confirm){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO users(username, email, password) VALUES('$name', '$email', '$hash')";
        $run = mysqli_query($conn, $query);

        if($run){
          
            echo "<script>alert('Registration successful!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Error: Could not register');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            font-weight: bold;
        }
        .container input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }
        .container input:focus {
            border-color: #4CAF50;
            box-shadow: 0px 0px 8px rgba(76, 175, 80, 0.5);
        }
        .container button {
            width: 95%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        .container button:hover {
            background: #45a049;
        }
        .container p {
            margin-top: 15px;
            font-size: 14px;
        }
        .container a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Account</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Full Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm" placeholder="Confirm Password" required><br>
            <button type="submit" name="register">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
