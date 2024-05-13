<?php
require_once(__DIR__ . "/sistema.class.php");
class Proveedor extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT p.id_proveedor, p.proveedor, p.rfc FROM proveedor p;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_proveedor)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT p.id_proveedor, p.proveedor, p.rfc FROM proveedor p
        WHERE id_proveedor = :id_proveedor;");
        $stmt->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
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
        if ($this->validateProveedor($datos)) {
            $stmt = $this->conn->prepare("INSERT INTO proveedor 
            (proveedor,rfc)
            VALUES (:proveedor, :rfc);");
            $stmt->bindParam(':proveedor', $datos['proveedor'], PDO::PARAM_STR);
            $stmt->bindParam(':rfc', $datos['rfc'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
        return 0;
    }


    function Delete($id_proveedor)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM proveedor
        WHERE id_proveedor=:id_proveedor;");
        $stmt->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_proveedor, $datos)
    { //datos es un array
        $this->connect();
        $stmt = $this->conn->prepare("UPDATE Proveedor SET 
            proveedor=:proveedor,
            rfc=:rfc
            WHERE id_proveedor=:id_proveedor;");
        $stmt->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
        $stmt->bindParam(':proveedor', $datos['proveedor'], PDO::PARAM_STR);
        $stmt->bindParam(':rfc', $datos['rfc'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function validateProveedor($datos)
    {
        if (empty($datos['proveedor'])) {
            return false;
        }
        if (empty($datos['rfc'])) {
            return false;
        }
        if (!$this->validarRFC($datos['rfc'])) {
            return false;
        }
        return true;
    }

    function validarRFC($rfc)
    {
        $regex = '/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/';
        return preg_match($regex, $rfc);
    }
}
