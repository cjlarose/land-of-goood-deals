<?php
include_once(dirname(__FILE__) . '/products.php');
include_once(dirname(__FILE__) . '/db_connection.php');

session_start();

class CartSession {
    function __construct() {
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

class Order {
    function __construct($conn) {
        $this->conn = $conn;
    }

    function save_order($name, $address, $city, $state, $email, $phone,
        $shipping) {
        $stmt = $this->conn->prepare("INSERT INTO `order` (name, address, city, state, email, phone, shipping, order_time, completed) VALUES (:name, :address, :city, :state, :email, :phone, :shipping, NOW(), 0)");
        $success = $stmt->execute(array(
            ':name' => $name,
            ':address' => $address,
            ':city' => $city,
            ':state' => $state,
            ':email' => $email,
            ':phone' => $phone,
            ':shipping' => $shipping
        ));
        $order_id = $this->conn->lastInsertId();
        $_SESSION['last_order_id'] = $order_id;
        return $order_id;
    }

    function add_products($order_id, $items) {
        // LOL insert statements in a loop. Should probably be done in a
        // single build insert query. But this is PHP. There are no rules
        foreach ($items as $item) {
            $stmt = $this->conn->prepare("INSERT INTO order_product (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)");
            $stmt->execute(array(
                ':order_id' => $order_id,
                ':product_id' => $item->product->id,
                ':quantity' => $item->quantity
            ));
        }
    }

    function mark_completed() {
        $last_order_id = $_SESSION['last_order_id'];
        $stmt = $this->conn->prepare("UPDATE `order` SET completed = 1 WHERE id = :order_id");
        $stmt->execute(array(
            ':order_id' => $last_order_id
        ));
    }
}
