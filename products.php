<?php
$title = "Adventure Time Merchandise";
$description = "Best products ever";
include('header.php');
include('helpers/products.php');
include('helpers/db_connection.php');

$p = new Products($db_connection);
$products = $p->get_products();

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
<?
endforeach;
?>
</ul>
<?php
include('footer.php');
?>
