<?php
$title = "Thanks!";
$description = "Order completed";

include_once("helpers/cart.php");
include_once("helpers/db_connection.php");
$order = new Order($db_connection);
$order->mark_completed();

include('include/header.php');
?>
<h2>THANK YOU!</h2>
<p>We'll take precious care of your money! &lt;3</p>
<?php
include('include/footer.php');
?>
