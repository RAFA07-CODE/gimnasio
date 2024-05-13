<?php
require_once(__DIR__ . "/sistema.class.php");
class Comentario extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT c.id_comentario, c.comentario FROM comentario c;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_comentario)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT c.id_comentario, c.comentario FROM comentario c
        WHERE id_comentario = :id_comentario;");
        $stmt->bindParam(':id_comentario', $id_comentario, PDO::PARAM_INT);
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
        if ($this->validateComentario($datos)) {
                $stmt = $this->conn->prepare("INSERT INTO comentario(comentario)
                VALUES (:comentario);");
            $stmt->bindParam(':comentario', $datos['comentario'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
        return 0;
    }


    function Delete($id_comentario)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM comentario
        WHERE id_comentario=:id_comentario;");
        $stmt->bindParam(':id_comentario', $id_comentario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_comentario, $datos)
    { //datos es un array
        $this->connect();
            $stmt = $this->conn->prepare("UPDATE comentario SET 
            comentario=:comentario
            WHERE id_comentario=:id_comentario;");
            $stmt->bindParam(':id_comentario', $id_comentario, PDO::PARAM_INT);
            $stmt->bindParam(':comentario', $datos['comentario'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();

    }

    function validateComentario($datos)
    {
        if (isset($datos['comentario']) && trim($datos['comentario']) !== '') {
            return true; 
        }
        return false;
    }
    
}
