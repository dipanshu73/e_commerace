<?php
    session_start();
    include('admin/conn.php'); 
?>
<?php 

    $username = $_POST['username'];
    $password = $_POST['password'];
    $encrypt_passwoord = md5($password);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$encrypt_passwoord' LIMIT 1 ";
    $result = mysqli_query($conn,$sql);
    $row =  mysqli_fetch_assoc($result);

    if($row){
        $_SESSION['auth'] = true;
        $_SESSION['username'] = $row['username'];

        header("Location:admin/categories.php");
    }else{
        header("Location:login.php?msg=Invalid username and password");
    }
?> 