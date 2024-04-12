<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($username) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO users (Username) VALUES ('".$username."')");
        $stmt->execute();
    }

    public function readUsers() {
        $conn = $this->db->getConnection();
        $stmt = $conn->query("SELECT UserID, Username, Email FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUser($user_id, $new_username, $new_email) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE users SET Username = :change1, Email = :change2 WHERE UserID = :id");
        $stmt->bindParam(':change1', $new_username);
        $stmt->bindParam(':change2', $new_email);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
    }

    public function deleteUser($user_id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("DELETE FROM users WHERE UserID = :id");
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
    }
}
?>