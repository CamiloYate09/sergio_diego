<?php
require_once 'database.php';

class User {
    private $conn;

    // Constructor
    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    // Execute queries SQL
    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    // Insert
    public function insert($nombre, $apellido,$salario) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO empleado (nombre, apellido,salario) VALUES (:nombre, :apellido,:salario)");
            $stmt->bindparam(":nombre", $nombre);
            $stmt->bindparam(":apellido", $apellido);
            $stmt->bindparam(":salario", $salario);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Update
    public function update($nombre, $apellido,$salario, $id) {
        try {
            $stmt = $this->conn->prepare("UPDATE empleado SET nombre=:nombre, apellido=:apellido,salario=:salario WHERE id=:id");
            $stmt->bindparam(":nombre", $nombre);
            $stmt->bindparam(":apellido", $apellido);
            $stmt->bindparam(":salario", $salario);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Delete
    public function delete($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM empleado WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Redirect URL method
    public function redirect($url) {
        header("Location: $url");
    }
}
?>
