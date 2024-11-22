<?php
// Modelos/Conexion.php

class Conexion
{

    private $host = "db_utp";
    private $dbname = "utp_viajes";
    private $username = "utp";
    private $password = "Panama.01";
    public $conn;

    public function conectar()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8mb4", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $this->conn;
    }
}
