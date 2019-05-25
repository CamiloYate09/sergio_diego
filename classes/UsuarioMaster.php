<?php

require_once 'database.php';
class UsuarioMaster

{

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


    // Redirect URL method
    public function redirect($url) {
        header("Location: $url");
    }

}