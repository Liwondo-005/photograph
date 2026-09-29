<?php
class Database
{
    protected $conn;

    public function __construct()
    {
        if (!defined('DB_HOST') || !defined('DB_USER') || !defined('DB_PASS') || !defined('DB_NAME')) {
            require_once __DIR__ . '/../config/database.php';
        }

        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die('Database Connection Failed: ' . $this->conn->connect_error);
        }

        $this->conn->set_charset('utf8mb4');
    }

    public function connect()
    {
        return $this->conn;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
