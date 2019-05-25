<?php
class Database {
    // Connection variables
    private $host = "vhw3t8e71xdz9k14.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $dbName = "lb4fsa3fghhg55ce";
    private $username = "eo1k4qfy799rhs6f";
    private $password = "qxv4ppdtgyz3ryew";

    public $conn;

    // Method return security connection
    public function dbConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>