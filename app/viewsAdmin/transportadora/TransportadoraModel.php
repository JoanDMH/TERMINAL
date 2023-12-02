<?php
require_once '../../config/connection.php';

class TransportadoraModel {
    public static function createTransportadora($nomb_tran, $dire_tran, $cel, $correo) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("INSERT INTO transportadora (nomb_tran, dire_tran, cel, correo) VALUES (:nomb_tran, :dire_tran, :cel, :correo)");
            $stmt->bindParam(':nomb_tran', $nomb_tran);
            $stmt->bindParam(':dire_tran', $dire_tran);
            $stmt->bindParam(':cel', $cel);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            Connection::closeConnection();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function getTransportadoraById($id_tran) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("SELECT * FROM transportadora WHERE id_tran = :id_tran");
            $stmt->bindParam(':id_tran', $id_tran);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            Connection::closeConnection();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public static function getTransportadoras() {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->query("SELECT * FROM transportadora");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            Connection::closeConnection();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    // Implementa las funciones para actualizar y eliminar según tus necesidades.
    public static function updateTransportadora($id_tran, $nomb_tran, $dire_tran, $cel, $correo) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("UPDATE transportadora SET nomb_tran = :nomb_tran, dire_tran = :dire_tran, cel = :cel, correo = :correo WHERE id_tran = :id_tran");
            $stmt->bindParam(':id_tran', $id_tran);
            $stmt->bindParam(':nomb_tran', $nomb_tran);
            $stmt->bindParam(':dire_tran', $dire_tran);
            $stmt->bindParam(':cel', $cel);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            Connection::closeConnection();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function deleteTransportadora($id_tran) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("DELETE FROM transportadora WHERE id_tran = :id_tran");
            $stmt->bindParam(':id_tran', $id_tran);
            $stmt->execute();
            Connection::closeConnection();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function getTransportadorasList() {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("SELECT id_tran, nomb_tran FROM transportadora");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            Connection::closeConnection();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}
?>

