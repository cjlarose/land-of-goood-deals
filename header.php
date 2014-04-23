<?php
include_once('helpers/products.php');
include_once('helpers/db_connection.php');

$p = new Products($db_connection);
$products = $p->get_all();
?>
<!DOCTYPE html>
<!-- Chris LaRose & Dave Fei -->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $description; ?>">
    <title>Land of Goood Deals: <?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
    <header>
        <h1>
            <a href="index.php">Land of Goood Deals</a>
            <span id="tagline">Quality <em>Adventure Time</em> Merchandise</span>
        </h1>
        <nav id="navigation">
            <ul>
                <li>
                    <a href="products.php">Products</a>
                    <ul>
                        <?php
                        foreach ($products as $product):
                        ?>
                        <li><a href="<?php echo $product->url(); ?>"><?php echo $product->name; ?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </nav>
    </header>
    <div id="content">
<!-- end header -->
