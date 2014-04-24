<?php
include_once("helpers/cart.php");

$cart = new CartSession();

if (array_key_exists('product_id', $_POST)) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    if (!is_numeric($quantity)) {
        echo "Bad request";
        http_response_code(400);
        exit();
    }
    $quantity = intval($quantity);
    $cart->add_product($product_id, $quantity);
}

$items = $cart->get_items();

$title = "Cart";
$description = "This is the cart";
include 'include/header.php';
include 'include/cart_table.php';
?>
<h2>Shopping Cart</h2>
<form method="GET" action="shipping.php">

<?php echo cart_table($items); ?>

<input type="submit" value="Continue" name="continue" class="button-primary" />

</form>
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/remove_element.js"></script>
<?php
	include 'include/footer.php';
?>
