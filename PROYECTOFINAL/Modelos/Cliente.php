<?php
// Modelos/Cliente.php
require_once 'Conexion.php';

class Cliente {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function guardarCliente($nombre, $email, $google_id) {
        $stmt = $this->db->prepare("INSERT INTO clientes (nombre, email, google_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $google_id);
        $stmt->execute();
    }
}
