<?php

header('Content-type: application/json');

if (!array_key_exists('product_id', $_POST)) {
    echo "{\"success\": false}";
    http_response_code(400);
    exit();
}

include_once('helpers/cart.php');
$product_id = $_POST['product_id'];
$cart = new CartSession();
$cart->remove_product($product_id);

echo "{\"success\": true}";
