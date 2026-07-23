<?php
session_start();
include('admin/conn.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
<div class="container" style="height: 100vh;">
    <div class="login-box d-flex h-100 align-items-center justify-content-center">
        <div style="width: 100%;">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card card-body">
                        <h2>Login</h2>
                        <form method="POST" action="">
                            <div class="form-group mb-4">
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="msg">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Initialize attempts if not set
                    if (!isset($_SESSION['login_attempts'])) {
                        $_SESSION['login_attempts'] = 0;
                    }

                    // Check lock
                    if (isset($_SESSION['lock_time']) && time() < $_SESSION['lock_time'] + 60) {
                        $remaining = ($_SESSION['lock_time'] + 60) - time();
                        echo "Too many attempts! Please wait $remaining seconds before trying again.";
                        exit;
                    }

                    $password = md5($password);

                    $query = "SELECT * FROM users  WHERE username='$username' AND password='$password' LIMIT 1";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);

                    if ($row) {
                        // Reset attempts
                        $_SESSION['login_attempts'] = 0;
                        unset($_SESSION['lock_time']);
                        
                        // Set session for user
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_name'] = $row['username'];
                        $_SESSION['priv'] = $row['priv'];
                        $_SESSION['gender'] = $row['gender'];
                        $_SESSION['profile_pic'] = $row['profile_pic'];


                         // Privilege check
                        if ($_SESSION['priv'] == 'admin') {
                         header("Location: admin/products.php"); // for admin
                          } else {
                          header("Location: profile.php");  //for Normal user 
                         }
                      
                        exit;
                        } else {
                        $_SESSION['login_attempts']++;

                        if ($_SESSION['login_attempts'] >= 3) {
                            $_SESSION['lock_time'] = time();
                            echo "Invalid credentials 3 times! Locked for 1 minute.";
                        } else {
                            echo "Invalid Username or Password. Attempt ".$_SESSION['login_attempts']." of 3.";
                        }
                    }
                }
                ?>
            </div>
        </div>
        
    </div>
</div>


</body>
</html>
