<?php

require_once "/home/joan/Escritorio/TERMINAL/app/config/connection.php";

class ClienteModel {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function listarClientes() {
        $stmt = $this->conn->prepare("SELECT * FROM clientes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarCliente($id,$nombre, $apellido, $edad) {
        $stmt = $this->conn->prepare("INSERT INTO clientes (id_cli, nomb_cli, ape_cli, edad) VALUES (:id, :nombre, :apellido, :edad)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        return $stmt->execute();
    }

    public function obtenerClientePorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE id_cli = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarCliente($id, $nombre, $apellido, $edad) {
        $stmt = $this->conn->prepare("UPDATE clientes SET nomb_cli = :nombre, ape_cli = :apellido, edad = :edad WHERE id_cli = :id");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function eliminarCliente($id) {
        $stmt = $this->conn->prepare("DELETE FROM clientes WHERE id_cli = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    //LOGIN
    

    public function obtenerClientePorUsuario($usuario)
    {
        $stmt = $this->conn->prepare('SELECT * FROM clientes WHERE usuario = :usuario');
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getNombresClientes() {
        try {
            $query = "SELECT id_cli, nomb_cli FROM clientes";
            $stmt = $this->conn->prepare($query);  // Utiliza $this->conn en lugar de $this->db
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los nombres de clientes: " . $e->getMessage();
            return [];
        }
    }
    
}
?>