<?php
if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    
    if(!empty($name) && !empty($email) && !empty($message)){
        echo "<script>alert('Message sent successfully!'); window.location='contact.php';</script>";
    } else {
        echo "<script>alert('Please fill all fields');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Myntra</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .contact-box {
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
      width: 400px;
      text-align: center;
    }

    h1 {
      color: #333;
      font-size: 28px;
      margin-bottom: 20px;
    }

    p {
      font-size: 16px;
      color: #555;
      margin: 10px 0;
    }

    input, textarea {
      width: 90%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      transition: 0.3s;
      font-size: 15px;
    }

    input:focus, textarea:focus {
      border-color: #4CAF50;
      box-shadow: 0px 0px 8px rgba(76, 175, 80, 0.5);
    }

    button {
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

    button:hover {
      background: #45a049;
    }

    footer {
      margin-top: 25px;
      font-size: 13px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="contact-box">
    <h1>Contact Us</h1>
    <p>Email: <a href="mailto:support@myntra.com">support@myntra.com</a></p>
    <p>Phone: +91 9879000050</p>

    <form method="POST" action="">
      <input type="text" name="name" placeholder="Your Name" required><br>
      <input type="email" name="email" placeholder="Your Email" required><br>
      <textarea name="message" rows="4" placeholder="Your Message" required></textarea><br>
      <button type="submit" name="send">Send Message</button>
    </form>

    <footer>© 2026 Myntra Support Team</footer>
  </div>
</body>
</html>
