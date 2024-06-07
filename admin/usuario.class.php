<?php
require_once(__DIR__."/sistema.class.php");
class Usuario extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_usuario, correo, contrasena, token FROM usuario");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_usuario)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_usuario, correo, contrasena, token
        FROM usuario
        WHERE id_usuario=:id_usuario;");
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
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
            if ($this->validateUsuario($datos)) {
                $stmt = $this->conn->prepare("INSERT INTO usuario 
                (correo,contrasena)
                VALUES (:correo,:contrasena);");
                $stmt->bindParam(':correo',$datos['correo'] , PDO::PARAM_STR);
                $stmt->bindParam(':contrasena', $datos['contrasena'], PDO::PARAM_STR);
            }
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Delete($id_usuario)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM usuario
        WHERE id_usuario=:id_usuario;");
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_usuario, $datos)
    { //datos es un array
        $this->connect();
            $stmt = $this->conn->prepare("UPDATE usuario SET 
            correo=:correo,
            contrasena=:contrasena
            WHERE id_usuario=:id_usuario;");
            $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
            $stmt->bindParam(':contrasena', $datos['contrasena'], PDO::PARAM_STR);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function validateUsuario($datos)
    {
        if (empty($datos['correo'])) {
            return false;
        }
        return true;
    }
    
}
