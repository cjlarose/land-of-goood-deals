<?php 
function cart_table($cart_items, $shipping_price = NULL) {
    ob_start();
    $total_price = Cart::total_price($cart_items);
    if ($shipping_price)
        $total_price += $shipping_price;
?>
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
        foreach ($cart_items as $cart_item):
        ?>
        <tr data-product-id="<?php echo $cart_item->product->id; ?>" data-line-total="<?php echo $cart_item->total_price(); ?>">
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
        <?php if ($shipping_price != NULL): ?>
        <tr>
            <td></td>
            <td></td>
            <td>Shipping</td>
            <td data-shipping-total="<?php echo $shipping_price; ?>">$<?php echo number_format($shipping_price, 2); ?></td>
            <td></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td></td>
            <td></td>
            <td class="carttotal">Total</td>
            <td id="total_price" class="carttotal">$<?php echo number_format($total_price, 2); ?></td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php
    return ob_get_clean();
}
