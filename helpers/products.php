<?php

class Products {
    function __construct($conn) {
        $this->conn = $conn;
    }

    function get_products() {
        $results = $this->conn->query("SELECT * FROM product"); 
        return $results;
    }

    function get_product($name) {
        $sql = "SELECT * FROM product WHERE name = :name";
        $statement = $this->conn->prepare($sql);
        $statement->execute(array(':name' => $name));
        return $statement->fetchOne();
    }
}
