<?php
include('helpers/products.php');
include('helpers/db_connection.php');

if (!array_key_exists('product', $_GET)) {
    echo "Bad request";
    http_response_code(400);
    exit();
}

$p = new Products($db_connection);
$name = urldecode($_GET['product']);
try {
    $product = $p->get($name);
} catch(Exception $e) {
    echo "Not Found";
    http_response_code(404);
    exit();
}

$title = $product->name;
$description = $product->name;
include('header.php');
?>
<h2><?php echo $product->name; ?></h2>

<aside id="product-sidebar">
    <img src="images/<?php echo $product->image; ?>" alt="<?php echo $product->name?>" id="product-image" />

    <form action="cart.php" method="GET" id="purchase-form">
        <fieldset>
            <legend>Add to Cart</legend>
            <span class="price">$<?php echo $product->price; ?></span><br />
            <label for="quantity">Quantity</label>
            <input type="text" id="quantity" name="quantity" />
            <input type="submit" value="Add" name="add_to_cart" />
        </fieldset>
    </form>
</aside>

<p><?php echo $product->description; ?></p>

<?php
include('footer.php');
?>
