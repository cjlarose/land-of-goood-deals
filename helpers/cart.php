<?php
include_once(dirname(__FILE__) . '/products.php');
include_once(dirname(__FILE__) . '/db_connection.php');

class Cart {
    function __construct() {
        session_start();
        global $db_connection;
        $this->products = new Products($db_connection);
    }

    private function set_quantities($product_ids) {
        $_SESSION['products'] = $product_ids;
    }

    private function get_quantities() {
        if (!array_key_exists('products', $_SESSION) || $_SESSION['products'] == NULL)
            $_SESSION['products'] = array();
        return $_SESSION['products'];
    }

    function add_product($product_id, $quantity) {
        $quantities = $this->get_quantities();
        $quantities[$product_id] = $quantity;
        $this->set_quantities($quantities);
    }

    function remove_product($product_id) {
        $quantities = $this->get_quantities();
        unset($quantities[$product_id]);
        $this->set_quantities($quantities);
    }

    function get_items() {
        $quantities = $this->get_quantities();
        $products = $this->products->get_many(array_keys($quantities));

        $items = array();
        foreach ($products as $product) {
            $quantity = $quantities[$product->id];
            array_push($items, new CartItem($product, $quantity));
        }
        return $items;
    }

    public static function total_price($items) {
        $total = 0;
        foreach ($items as $item) {
            $total += $item->total_price();
        }
        return $total;
    }
}

class CartItem {
    function __construct($product, $quantity) {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    function total_price() {
        return $this->quantity * $this->product->price;
    }
}
