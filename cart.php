<?php
session_start();
include('admin/conn.php');
include('header.php');
?>
<section class="py-5">
  <div class="container">
    <h1>Your Shopping Cart</h1>

    <div class="card">
      <div class="card-body">
        <?php if(!empty($_SESSION['cart'])) { ?>
        <table class="table table-striped">
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
          <?php 
          $total_amount = 0; 
          foreach($_SESSION['cart'] as $id => $item) { 
            $item_total = $item['price'] * $item['quantity'];
            $total_amount += $item_total;
          ?>
          <tr>
            <td><?php echo $item['name']; ?></td>
            <td>₹<?php echo $item['price']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>₹<?php echo $item_total; ?></td>
            <td>
              <a href="remove_item.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Remove</a>
            </td>
          </tr>
          <?php } ?>
        </table>
        <h4 class="mt-3">Grand Total: <span class="text-success">₹<?php echo $total_amount; ?></span></h4>

        <div class="cart-links mt-4">
          <a href="place_order.php" class="btn btn-primary">Proceed to Checkout</a>
          <a href="index.php" class="btn btn-warning">Continue Shopping</a>
        </div>

      <?php } else { ?>
        <p>Your cart is empty.</p>
        <a href="index.php" class="btn btn-warning">Shop Now</a>
      <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php include('footer.php'); ?>
