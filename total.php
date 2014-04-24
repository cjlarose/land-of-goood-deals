<?php
include_once("helpers/cart.php");
include_once("helpers/db_connection.php");
include('include/cart_table.php');

$title = "Total";
$description = "Total price of things purchased on the best site ever";

$shipping_option = $_POST['date'];
$options = array(
    'next' => 12.00,
    'sec' => 6.00,
    'ground' => 3.99,
);

$shipping_price = $options[$shipping_option];

$cart = new CartSession();
$items = $cart->get_items();

$order = new Order($db_connection);
$order_id = $order->save_order($_POST['nameText'], $_POST['addText'], $_POST['cityText'], $_POST['state'], $_POST['emailText'], $_POST['phoneText'], $_POST['date']);
$order->add_products($order_id, $items);

include('include/header.php');
?>
<h2>Total</h2>
<form method="GET" action="thankyou.php">

<?php echo cart_table($items, $shipping_price); ?>

<input type="submit" value="Complete Order" name="complete_order" class="button-primary" />

</form>
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/remove_element.js"></script>
<?php
include('include/footer.php');
?>
