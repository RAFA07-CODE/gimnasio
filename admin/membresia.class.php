<?php
require_once(__DIR__ . "/sistema.class.php");
class Membresia extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT m.id_membresia, m.nombre, m.precio, m.beneficios, t.descripcion 
        FROM membresia m JOIN tipomenbresia t on m.id_tipomembresia = t.id_tipomembresia;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_membresia)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT m.id_membresia, m.nombre, m.precio, m.beneficios, m.id_tipomembresia 
        FROM membresia m
        WHERE id_membresia = :id_membresia;");
        $stmt->bindParam(':id_membresia', $id_membresia, PDO::PARAM_INT);
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
        if ($this->validateMembresia($datos)) {
            $stmt = $this->conn->prepare("INSERT INTO membresia 
            (nombre, precio, beneficios, id_tipomembresia)
            VALUES (:nombre, :precio, :beneficios, :id_tipomembresia);");
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_STR);
            $stmt->bindParam(':beneficios', $datos['beneficios'], PDO::PARAM_STR);
            $stmt->bindParam(':id_tipomembresia', $datos['id_tipomembresia'], PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        }
        return 0;
    }


    function Delete($id_membresia)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM membresia
        WHERE id_membresia=:id_membresia;");
        $stmt->bindParam(':id_membresia', $id_membresia, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_membresia, $datos)
    { //datos es un array
        $this->connect();
            $stmt = $this->conn->prepare("UPDATE membresia SET
            nombre=:nombre,
            precio=:precio,
            beneficios=:beneficios,
            id_tipomembresia=:id_tipomembresia
            WHERE id_membresia=:id_membresia;");
            $stmt->bindParam(':id_membresia', $id_membresia, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
            $stmt->bindParam(':beneficios', $datos['beneficios'], PDO::PARAM_STR);
            $stmt->bindParam(':id_tipomembresia', $datos['id_tipomembresia'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount(); 
    }

    function validateMembresia($datos)
    {
        if (isset($datos['nombre']) && trim($datos['nombre']) !== '') {
            return true;
        }
        return false;
    }
}
