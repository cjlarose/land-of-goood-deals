<?php
	include 'header.php';
	$title = "Cart";
	$description = "This is the cart";
?>
    </header>
    <div id="content">
<!-- end header -->
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
        <tr>
            <td>Product 1</td>
            <td>$15.00</td>
            <td>1</td>
            <td>$15.00</td>
            <td><a class="delete-item" href="remove.php">remove</a></td>
        </tr>
        <tr>
            <td>Product 2</td>
            <td>$15.00</td>
            <td>1</td>
            <td>$15.00</td>
            <td><a class="delete-item" href="remove.php">remove</a></td>
        </tr>
        <tr>
            <td>Product 3</td>
            <td>$15.00</td>
            <td>1</td>
            <td>$15.00</td>
            <td><a class="delete-item" href="remove.php">remove</a></td>
        </tr>
        <tr>
            <td>Product 4</td>
            <td>$15.00</td>
            <td>1</td>
            <td>$15.00</td>
            <td><a class="delete-item" href="remove.php">remove</a></td>
        </tr>
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
            <td class="carttotal">$235.95</td>
            <td></td>
        </tr>
    </tbody>
</table>

<input type="submit" value="Continue" name="continue" class="button-primary" />

</form>
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/remove_element.js"></script>
<!-- begin footer -->
    </div>
<?php
	include 'footer.php';
?>
