<?php
include_once("helpers/cart.php");

$cart = new Cart();

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
include 'header.php';
?>
<h2>Shopping Cart</h2>
<form method="GET" action="shipping.php">

<table class="zebra-stripes" id="cart-items">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Line Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($items as $cart_item):
        ?>
        <tr data-product-id="<?php echo $cart_item->product->id; ?>">
            <td><?php echo $cart_item->product->name; ?></td>
            <td>$<?php echo number_format($cart_item->product->price, 2); ?></td>
            <td><?php echo $cart_item->quantity; ?></td>
            <td>$<?php echo number_format($cart_item->total_price(), 2); ?></td>
            <td><a class="delete-item" href="#">remove</a></td>
        </tr>
        <?php
        endforeach;
        ?>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="carttotal">Total</td>
            <td class="carttotal">$<?php echo number_format(Cart::total_price($items), 2); ?></td>
            <td></td>
        </tr>
    </tbody>
</table>

<input type="submit" value="Continue" name="continue" class="button-primary" />

</form>
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/remove_element.js"></script>
<?php
	include 'footer.php';
?>
