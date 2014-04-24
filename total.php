<?php
include_once("helpers/cart.php");
include('include/cart_table.php');

$title = "Total";
$description = "Total price of things purchased on the best site ever";

$shipping_option = $_GET['date'];
$options = array(
    'next' => 12.00,
    'sec' => 6.00,
    'ground' => 3.99,
);

$shipping_price = $options[$shipping_option];

$cart = new CartSession();
$items = $cart->get_items();

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
