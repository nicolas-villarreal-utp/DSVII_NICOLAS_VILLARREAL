<?php
// Modelos/Cliente.php

class Cliente
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Funcion Guardar Cliente
    public function guardarCliente($email, $nombre, $google_id)
    {
        $query = "INSERT INTO clientes (email, nombre, google_id, fecha_registro) VALUES (:email, :nombre, :google_id, NOW())";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":google_id", $google_id);

        return $stmt->execute();
    }

    function obtenerCliente($id){
        $query = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //Funcion Validar Existe
    public function validarSiExiste($email)
    {
        $query = "SELECT * FROM clientes WHERE email = '" . $email . "'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //Obtener las reservas
    public function obtenerReservas($clienteId)
    {
        $query = "SELECT * FROM reservas WHERE cliente_id = :clienteId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":clienteId", $clienteId);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
