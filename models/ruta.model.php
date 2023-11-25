<?php
    require_once "./app/config/connection.php";

    class Ruta extends Connection{
        public static function mostrarDatos(){
            try{
                $sql = "SELECT * FROM ruta";
                $stmt = Connection::getConnection() ->prepare($sql);
                $stmt -> execute();
                $result = $stmt -> fetchAll();
                return $result;
            }catch(PDOException $th){
                echo $th -> getMessage();
            }
        }
        public static function obternerDatoId($id_ruta){
            try{
                $sql = "SELECT * FROM ruta WHERE id_ruta = $id_ruta";
                $stmt = Connection::getConnection() ->prepare($sql);
                $stmt -> bindParam(':id',$id_ruta);
                $stmt -> execute();
                $result = $stmt -> fetchAll();
                return $result;
            }catch(PDOException $th){
                echo $th -> getMessage();
            }
        }
        public static function guardarDato($data){
            try{
                $sql = "INSERT INTO ruta (id_ruta, fecha, hora_sal, precio, origen_ciudad, destino_ciudad) VALUES (:id_ruta, :fecha, :hora_sal, :precio, :origen_ciudad, :destino_ciudad)";
                $stmt = Connection::getConnection() -> prepare($sql);
                $stmt -> bindParam(':id_ruta',$data['id_ruta']);
                $stmt -> bindParam(':fecha',$data['fecha']);
                $stmt -> bindParam(':hora_sal',$data['hora_sal']);
                $stmt -> bindParam(':precio',$data['precio']);
                $stmt -> bindParam(':origen_ciudad',$data['origen_ciudad']);
                $stmt -> bindParam(':destino_ciudad',$data['destino_ciudad']);
                $stmt -> execute();
                return true;
            }catch (PDOException $th){
                echo $th -> getMessage();
            }
        }
        public static function actualizarDato($data){
            try{
                $sql = "UPDATE ruta SET fecha = :fecha, hora_sal = :hora_sal, precio = :precio, origen_ciudad = :origen_ciudad, destino_ciudad = :destino_ciudad WHERE id_ruta = :id_ruta";
                $stmt = Connection::getConnection() -> prepare($sql);
                $stmt -> bindParam(':id_ruta',$data['id_ruta']);
                $stmt -> bindParam(':fecha',$data['fecha']);
                $stmt -> bindParam(':hora_sal',$data['hora_sal']);
                $stmt -> bindParam(':precio',$data['precio']);
                $stmt -> bindParam(':origen_ciudad',$data['origen_ciudad']);
                $stmt -> bindParam(':destino_ciudad',$data['destino_ciudad']);
                $stmt -> execute();
                return true;
            }catch (PDOException $th){
                echo $th -> getMessage();
            }
        }
        public static function borrarDato($id_ruta){
            try{
                $sql = "DELETE FROM ruta WHERE id_ruta = id_ruta";
                $stmt = Connection::getConnection() -> prepare($sql);
                $stmt -> bindParam(':id_ruta',$id_ruta);
                $stmt -> execute();
                return true;
            }catch (PDOException $th){
                echo $th -> getMessage();
            }
        }
    }

?>