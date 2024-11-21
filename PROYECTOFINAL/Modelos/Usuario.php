<?php
// Modelos/Usuario.php
require_once 'Conexion.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function guardarUsuario($google_id, $email, $rol_id) {
        $stmt = $this->db->prepare("INSERT INTO usuarios (cliente_id, rol_id) VALUES ((SELECT id FROM clientes WHERE google_id = ?), ?)");
        $stmt->bind_param("si", $google_id, $rol_id);
        $stmt->execute();
    }
}
