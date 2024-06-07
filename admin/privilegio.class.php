<?php
require_once(__DIR__."/sistema.class.php");
class Privilegio extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_privilegio, privilegio FROM privilegio");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_privilegio)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_privilegio, privilegio
        FROM privilegio
        WHERE id_privilegio=:id_privilegio;");
        $stmt->bindParam(':id_privilegio', $id_privilegio, PDO::PARAM_INT);
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
            if ($this->validateprivilegio($datos)) {
                $stmt = $this->conn->prepare("INSERT INTO privilegio 
                (privilegio)
                VALUES (:privilegio);");
                $stmt->bindParam(':privilegio',$datos['privilegio'] , PDO::PARAM_STR);
            }
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Delete($id_privilegio)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM privilegio
        WHERE id_privilegio=:id_privilegio;");
        $stmt->bindParam(':id_privilegio', $id_privilegio, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_privilegio, $datos)
    { //datos es un array
        $this->connect();
            $stmt = $this->conn->prepare("UPDATE privilegio SET 
            privilegio=:privilegio
            WHERE id_privilegio=:id_privilegio;");
            $stmt->bindParam(':privilegio', $datos['privilegio'], PDO::PARAM_STR);
            $stmt->bindParam(':id_privilegio', $id_privilegio, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function validateprivilegio($datos)
    {
        if (empty($datos['privilegio'])) {
            return false;
        }
        return true;
    }
    
}
