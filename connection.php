<?php 
class Database {
    private $host = "127.0.0.1:33306";
    private $username = "mysql";
    private $password = "mysql";
    private $dbname = "onlinestore";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            // Устанавливаем режим обработки ошибок PDO на исключения
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }

    public function executePreparedStatement($sql, $params) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Error in executing statement: " . $e->getMessage());
        }
    }
}
?>