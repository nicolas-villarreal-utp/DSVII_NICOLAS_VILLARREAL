<?php
// Modelos/Usuario.php
require_once 'Conexion.php';

class Usuario {
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function validarUsuario($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email AND password = :password");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function guardarUsuario($nombre, $email, $password)
    {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();
    }

    public function obtenerUsuarios()
    {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //eliminar
    public function eliminarUsuario($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
 
}
