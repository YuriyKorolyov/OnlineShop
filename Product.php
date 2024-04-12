<?php
class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createProduct($name) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO products (ProductName) VALUES ('".$name."')");
        $stmt->execute();
    }

    public function readProducts() {
        $conn = $this->db->getConnection();
        $result = $conn->query("SELECT ProductID, ProductName, Price FROM products");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateProduct($product_id, $new_name, $new_price) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE products SET ProductName = :change1, Price = :change2 WHERE ProductID = :id");
        $stmt->bindParam(':change1', $new_name);
        $stmt->bindParam(':change2', $new_price);
        $stmt->bindParam(':id', $product_id);
        $stmt->execute();
    }

    public function deleteProduct($product_id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("DELETE FROM products WHERE ProductID = :id");
        $stmt->bindParam(':id', $product_id);
        $stmt->execute();
    }
}
?>