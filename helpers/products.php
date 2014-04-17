<?php

class Products {
    function __construct($conn) {
        $this->conn = $conn;
    }

    public static function make_product($attributes) {
        return new Product($attributes['id'], $attributes['name'],
                       $attributes['description'], $attributes['image'],
                       $attributes['price']);
    }

    function get_all() {
        $stmt = $this->conn->query("SELECT * FROM product"); 
        return array_map(array('Products', 'make_product'), $stmt->fetchAll());
    }

    function get($name) {
        $sql = "SELECT * FROM product WHERE name = :name";
        $statement = $this->conn->prepare($sql);
        $statement->execute(array(':name' => $name));
        return $statement->fetchOne();
    }

}

class Product {
    
    function __construct($id, $name, $description, $image, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
    }

    function url() {
        $name = urlencode($this->name);
        return "product.php?product={$name}";
    }

}
