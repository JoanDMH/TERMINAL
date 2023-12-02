<?php
require_once "../config/connection.php";

class CuentaClienteModel
{
    private $db;

    public function __construct()
    {
        $this->db = Connection::getConnection();
    }

    public function autenticarCliente($usuario, $contrasena)
    {
        try {
            $query = "SELECT id_cli, usuario, contrasena FROM cuenta_clientes WHERE usuario = :usuario AND contrasena = :contrasena";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

