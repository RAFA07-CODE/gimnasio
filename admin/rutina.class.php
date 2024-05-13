<?php
require_once(__DIR__ . "/sistema.class.php");
class Rutina extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT r.id_rutina, r.nombre, r.costo, r.frecuencia ,r.dificultad, r.id_tiporutina 
        FROM rutina r;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_rutina)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT r.id_rutina, r.nombre, r.costo, r.frecuencia ,r.dificultad, r.id_tiporutina 
        FROM rutina r
        WHERE id_rutina = :id_rutina;");
        $stmt->bindParam(':id_rutina', $id_rutina, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = array();
        $datos = $stmt->fetchAll();
        if (isset($datos[0])) {
            $this->setCount(count($datos));
            return $datos[0];
        }
        return array();
    }
    function Insert($datos)
    {
        $this->connect();
        if ($this->validateRutina($datos)) {
                $stmt = $this->conn->prepare("INSERT INTO rutina(nombre, costo, frecuencia, dificultad, id_tiporutina) 
                VALUES (:nombre, :costo, :frecuencia, :dificultad, :id_tiporutina);");
                $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
                $stmt->bindParam(':costo', $datos['costo'], PDO::PARAM_STR);
                $stmt->bindParam(':frecuencia', $datos['frecuencia'], PDO::PARAM_STR);
                $stmt->bindParam(':dificultad', $datos['dificultad'], PDO::PARAM_STR);
                $stmt->bindParam(':id_tiporutina', $datos['id_tiporutina'], PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->rowCount();
        }
        return 0;
    }


    function Delete($id_rutina)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM rutina
        WHERE id_rutina=:id_rutina;");
        $stmt->bindParam(':id_rutina', $id_rutina, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_rutina, $datos)
    {
        $this->connect();
            $stmt = $this->conn->prepare("UPDATE rutina SET 
            nombre = :nombre, 
            costo = :costo, 
            frecuencia = :frecuencia,
            dificultad = :dificultad,
            id_tiporutina = :id_tiporutina 
            WHERE id_rutina = :id_rutina;");
                $stmt->bindParam(':id_rutina', $id_rutina, PDO::PARAM_INT);
                $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
                $stmt->bindParam(':costo', $datos['costo'], PDO::PARAM_STR);
                $stmt->bindParam(':frecuencia', $datos['frecuencia'], PDO::PARAM_STR);
                $stmt->bindParam(':dificultad', $datos['dificultad'], PDO::PARAM_STR);
                $stmt->bindParam(':id_tiporutina', $datos['id_tiporutina'], PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->rowCount();
    }

    function validateRutina($datos)
    {
        if (!empty($datos['nombre'])) {
            return true;
        }
        return false;
    }
    

}
