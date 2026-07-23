<?php
session_start();
include('admin/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body { font-family: 'Poppins', sans-serif; margin: 0; background-color: #f9f9f9; }
    .checkout-container {
      width: 80%; margin: 50px auto; background: white; padding: 30px;
      border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h1 { text-align: center; color: #ff416c; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 12px; text-align: center; border-bottom: 1px solid #ddd; }
    th { background-color: #ff416c; color: white; }
    .total { text-align: right; font-size: 20px; font-weight: bold; margin-top: 20px; }
    .btn-place-order {
      display: block; width: 200px; margin: 30px auto; padding: 12px;
      background-color: #28a745; color: white; border: none; border-radius: 5px;
      font-size: 18px; cursor: pointer;
    }
    .btn-place-order:hover { background-color: #218838; }
  </style>
</head>
<body>

<div class="checkout-container">
  <h1>Checkout</h1>

  <table>
    <tr>
      <th>Product</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Subtotal</th>
    </tr>

    <?php
    $total = 0;
    if(!empty($_SESSION['cart'])){
      foreach($_SESSION['cart'] as $item){
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
        echo "<tr>
                <td>{$item['name']}</td>
                <td>₹{$item['price']}</td>
                <td>{$item['quantity']}</td>
                <td>₹{$subtotal}</td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='4'>Your cart is empty!</td></tr>";
    }
    ?>
  </table>

  <div class="total">Total Amount: ₹<?php echo $total; ?></div>

  <form action="place_order.php" method="POST">
    <button type="submit" class="btn-place-order">Place Order</button>
  </form>
</div>

</body>
</html>
