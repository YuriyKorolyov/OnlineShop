<?php
class Order {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createOrder($user_id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO orders (UserID) VALUES ('".$user_id."')");
        $stmt->execute();
        return $conn->lastInsertId();
    }

    public function readOrders() {
        $conn = $this->db->getConnection();
        $result = $conn->query("SELECT orders.OrderID, users.Username FROM orders INNER JOIN users ON users.UserID = orders.UserID");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateOrder($order_id, $new_user_id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE orders SET UserID = :change1 WHERE OrderID = :id");
        $stmt->bindParam(':change1', $new_user_id);
        $stmt->bindParam(':id', $order_id);
        $stmt->execute();
    }

    public function deleteOrder($order_id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("DELETE FROM orders WHERE OrderID = :id");
        $stmt->bindParam(':id', $order_id);
        $stmt->execute();
    }
}
?>