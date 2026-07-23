$customer_name = $_SESSION['customer_name'];
$query = "SELECT * FROM order_list WHERE customer_name = '$customer_name' ORDER BY order_date DESC";
