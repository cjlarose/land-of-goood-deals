<?php 
function cart_table($cart_items) { 
    ob_start();
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
        <tr>
            <td></td>
            <td></td>
            <td class="carttotal">Total</td>
            <td id="total_price" class="carttotal">$<?php echo number_format(Cart::total_price($cart_items), 2); ?></td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php
    return ob_get_clean();
}
