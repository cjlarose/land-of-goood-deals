<?php
include_once('helpers/products.php');
include_once('helpers/db_connection.php');

$p = new Products($db_connection);
$products = $p->get_all();

$title = "Adventure Time Merchandise";
$description = "Best products ever";
include('header.php');
?>
<h2>Products</h2>
<ul id="product-list">
<?php
foreach ($products as $product):
?>
    <li>
        <img src="images/<?php echo $product->image; ; ?>" alt="<?php echo $product->name ?>" />
        <a href="<?php echo $product->url(); ?>"><?php echo $product->name; ?></a>
    </li>
<?php
endforeach;
?>
</ul>
<?php
include('footer.php');
?>
