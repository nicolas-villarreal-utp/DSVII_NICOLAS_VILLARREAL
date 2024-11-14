<?php
class Usuario {
    private $conn;
    private $table = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crearUsuario($email, $nombre, $google_id) {
        $query = "INSERT INTO " . $this->table . " (email, nombre, google_id, fecha_registro) VALUES (:email, :nombre, :google_id, NOW())";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":google_id", $google_id);

        return $stmt->execute();
    }

    public function obtenerUsuarios() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
