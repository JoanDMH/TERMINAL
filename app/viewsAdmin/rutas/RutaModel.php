<?php
class RutaModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllRutas() {
        try {
            $query = "SELECT ruta.*, ciudades_origen.nomb_ciud AS nomb_ciud_origen, ciudades_destino.nomb_ciud AS nomb_ciud_destino
                      FROM ruta
                      LEFT JOIN ciudades AS ciudades_origen ON ruta.id_ciud_origen = ciudades_origen.id_ciud
                      LEFT JOIN ciudades AS ciudades_destino ON ruta.id_ciud_destino = ciudades_destino.id_ciud";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener las rutas: " . $e->getMessage();
            return [];
        }
    }   

    // En RutaModel.php
public function insertarRuta($fecha, $hora_sal, $precio, $id_ciud_origen, $id_ciud_destino) {
    try {
        // Verificar que id_ciud_destino no sea nulo
        if ($id_ciud_destino === null) {
            throw new Exception("id_ciud_destino no puede ser nulo.");
        }

        $query = "INSERT INTO ruta (fecha, hora_sal, precio, id_ciud_origen, id_ciud_destino) 
                  VALUES (:fecha, :hora_sal, :precio, :id_ciud_origen, :id_ciud_destino)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora_sal', $hora_sal);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':id_ciud_origen', $id_ciud_origen);
        $stmt->bindParam(':id_ciud_destino', $id_ciud_destino);
        return $stmt->execute();
    } catch (Exception $e) {
        echo "Error en PDO: " . $e->getMessage();
        return false;
    }
}


    // Agrega funciones para actualizar, eliminar y obtener una ruta por su id
    public function updateRuta($id_ruta, $fecha, $hora_sal, $precio, $id_ciud_origen, $id_ciud_destino) {
        try {
            $stmt = $this->db->prepare("UPDATE ruta SET fecha = :fecha, hora_sal = :hora_sal, precio = :precio, id_ciud_origen = :id_ciud_origen, id_ciud_destino = :id_ciud_destino WHERE id_ruta = :id_ruta");
            $stmt->bindParam(':id_ruta', $id_ruta, PDO::PARAM_INT);
            $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $stmt->bindParam(':hora_sal', $hora_sal, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
            $stmt->bindParam(':id_ciud_origen', $id_ciud_origen, PDO::PARAM_INT);
            $stmt->bindParam(':id_ciud_destino', $id_ciud_destino, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar la ruta: " . $e->getMessage();
            return false;
        }
    }
    
    public function getRutaById($id_ruta) {
        $query = "SELECT * FROM ruta WHERE id_ruta = :id_ruta";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_ruta', $id_ruta);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Agrega funciones para eliminar y borrar una ruta
    public function eliminarRuta($id_ruta) {
        try {
            $stmt = $this->db->prepare("DELETE FROM ruta WHERE id_ruta = :id_ruta");
            $stmt->bindParam(':id_ruta', $id_ruta, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar la ruta: " . $e->getMessage();
            return false;
        }
    }
    
    public function truncateRutas() {
        $query = "TRUNCATE TABLE ruta";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
    
    public function getAllCiudades() {
        $query = "SELECT * FROM ciudades";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHorasSalidaRutas() {
        try {
            $query = "SELECT DISTINCT hora_sal FROM ruta";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener las horas de salida de rutas: " . $e->getMessage();
            return [];
        }
    }
    
    
}
?>
