<?php
require_once(__DIR__ . "/sistema.class.php");
class Equipo extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT e.id_equipo, e.nombre, m.id_marca, e.fotografia 
        FROM equipo e JOIN marca m on e.id_marca = m.id_marca;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_equipo)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT e.id_equipo, e.nombre, m.id_marca FROM equipo e JOIN marca m on e.id_marca = m.id_marca
        WHERE id_equipo = :id_equipo;");
        $stmt->bindParam(':id_equipo', $id_equipo, PDO::PARAM_INT);
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
        $nombre_archivo = $this->upload("equipos");
        if ($nombre_archivo) {
            if ($this->validateEquipo($datos)) {
                $stmt = $this->conn->prepare("INSERT INTO equipo 
                (nombre,id_marca,fotografia)
                VALUES (:nombre,:id_marca,:fotografia);");
                $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
            }
        } else {
            $stmt = $this->conn->prepare("INSERT INTO equipo 
            (nombre,id_marca)
            VALUES (:nombre,:id_marca);");
        }
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':id_marca', $datos['id_marca'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }


    function Delete($id_equipo)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM equipo
        WHERE id_equipo=:id_equipo;");
        $stmt->bindParam(':id_equipo', $id_equipo, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_equipo, $datos)
    { //datos es un array
        $this->connect();
        $nombre_archivo = $this->upload('equipos');
        if ($nombre_archivo) {
            $stmt = $this->conn->prepare("UPDATE equipo SET 
            nombre=:nombre,
            id_marca=:id_marca,
            fotografia=:fotografia
            WHERE id_equipo=:id_equipo;");
            $stmt->bindParam(':id_equipo', $id_equipo, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':id_marca', $datos['id_marca'], PDO::PARAM_STR);
            $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
    }

    function validateEquipo($datos)
    {
        if (isset($datos['nombre']) && trim($datos['nombre']) !== '') {
            return true;
        }
        return false;
    }
}
