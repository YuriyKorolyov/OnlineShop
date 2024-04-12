<?php
class OrderDetail {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createOrderDetail($order_id, $product_id, $quantity) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO orderdetails (OrderID, ProductID, Quantity) VALUES (:change1, :change2, :change3)");
        $stmt->bindParam(':change1', $order_id);
        $stmt->bindParam(':change2', $product_id);
        $stmt->bindParam(':change3', $quantity);
        $stmt->execute();
    }

    public function readOrderDetails() {
        $conn = $this->db->getConnection();
        $result = $conn->query("SELECT orderdetails.OrderID, products.ProductName, orderdetails.Quantity FROM orderdetails INNER JOIN products ON orderdetails.ProductID = products.ProductID");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateOrderDetail($order_detail_id, $new_product_id, $new_quantity) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE orderdetails SET ProductID = :change1, Quantity = :change2 WHERE OrderID = :id");
        $stmt->bindParam(':change1', $new_product_id);
        $stmt->bindParam(':change2', $new_quantity);
        $stmt->bindParam(':id', $order_detail_id);
        $stmt->execute();
    }

    public function deleteOrderDetail($order_detail_id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("DELETE FROM orderdetails WHERE OrderID = :id");
        $stmt->bindParam(':id', $order_detail_id);
        $stmt->execute();
    }
}
?>