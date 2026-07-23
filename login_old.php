<!DOCTYPE html>
<html>
<head>
    <title>New Collection Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: Arial, sans-serif; }
        .login-box {
            width: 380px;
            margin: 80px auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .login-box h3 {
            font-weight: bold;
            margin-bottom: 15px;
        }
        .login-box input {
            border-radius: 6px;
            height: 45px;
        }
        .btn-yellow {
            background-color: #ffd814;
            border: none;
            font-weight: bold;
            width: 100%;
            height: 45px;
            border-radius: 25px;
        }
        .btn-yellow:hover {
            background-color: #f7ca00;
        }
        .footer-links {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
        }
        .footer-links a {
            color: #0073bb;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-box text-center">
    <h3>Welcome to Woman New Collection Store</h3>
    <p class="text-muted">Enter your email or mobile number to explore our latest collections</p>

    <form action="login_check.php" method="POST">
        <input type="text" name="username" class="form-control mb-3" placeholder="Enter mobile number or email" required>
        <button type="submit" class="btn btn-yellow">Continue</button>
    </form>

    <p class="mt-3 small">
        By continuing, you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
    </p>

    <hr>
    <p class="fw-bold">New to our store?</p>
    <a href="register.php" class="btn btn-outline-dark w-100">Create a free account</a>
</div>

<div class="footer-links">
    <a href="#">Terms of Use</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Help</a>
    <p class="text-muted mt-2">© 2026 New Collection Store, India</p>
</div>

</body>
</html>
