<?php
require_once(__DIR__ . "/sistema.class.php");
class Ejercicio extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT e.id_ejercicio, e.nombre, e.descripcion, e.complejidad FROM ejercicio e;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_ejercicio)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT e.id_ejercicio, e.nombre, e.descripcion, e.complejidad FROM ejercicio e
        WHERE id_ejercicio = :id_ejercicio;");
        $stmt->bindParam(':id_ejercicio', $id_ejercicio, PDO::PARAM_INT);
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
        if ($this->validateEjercicio($datos)) {
            $stmt = $this->conn->prepare("INSERT INTO ejercicio (nombre, descripcion, complejidad)
            VALUES (:nombre, :descripcion, :complejidad);");
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(':complejidad', $datos['complejidad'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
        return 0;
    }


    function Delete($id_ejercicio)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM ejercicio
        WHERE id_ejercicio=:id_ejercicio;");
        $stmt->bindParam(':id_ejercicio', $id_ejercicio, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_ejercicio, $datos)
    {
        $this->connect();
        $stmt = $this->conn->prepare("UPDATE ejercicio SET 
        nombre=:nombre,
        descripcion=:descripcion,
        complejidad=:complejidad
        WHERE id_ejercicio=:id_ejercicio;");
        $stmt->bindParam(':id_ejercicio', $id_ejercicio, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':complejidad', $datos['complejidad'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function validateEjercicio($datos)
    {
        if (isset($datos['nombre']) && trim($datos['nombre']) !== '') {
            return true;
        }
        return false;
    }
}
