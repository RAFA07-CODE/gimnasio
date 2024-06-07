<?php
require_once(__DIR__ . "/sistema.class.php");
class Marca extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_marca, marca, fotografia FROM marca;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_marca)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_marca, marca
        FROM marca
        WHERE id_marca=:id_marca;");
        $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
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
        $nombre_archivo = $this->upload("marcas");
        if ($nombre_archivo) {
            if ($this->validateMarca($datos)) {
                $stmt = $this->conn->prepare("INSERT INTO marca 
                (marca,fotografia)
                VALUES (:marca, :fotografia);");
                $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
            }
        } else {
            $stmt = $this->conn->prepare("INSERT INTO marca 
            (marca)
            VALUES (:marca);");
        }
        $stmt->bindParam(':marca', $datos['marca'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }
    

    function Delete($id_marca)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM marca
        WHERE id_marca=:id_marca;");
        $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_marca, $datos)
    { //datos es un array
        $this->connect();
        $nombre_archivo = $this->upload('marcas');
        if ($nombre_archivo) {
            $stmt = $this->conn->prepare("UPDATE marca SET 
            marca=:marca,
            fotografia=:fotografia
            WHERE id_marca=:id_marca;");
            $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
        } else {
            $stmt = $this->conn->prepare("UPDATE marca SET 
            marca=:marca
            WHERE id_marca=:id_marca;");
        }
        $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
        $stmt->bindParam(':marca', $datos['marca'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function validateMarca($datos)
    {
        if (isset($datos['marca']) && trim($datos['marca']) !== '') {
            return true;
        }
        return false;
    }
    
}
