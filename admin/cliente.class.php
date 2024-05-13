<?php
require_once(__DIR__ . "/sistema.class.php");
class Cliente extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT c.id_cliente, c.primer_apellido, c.segundo_apellido, c.nombre, c.telefono, c.domicilio, c.id_membresia, c.id_rutina, c.fotografia 
        FROM cliente c;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_cliente)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT c.id_cliente, c.primer_apellido, c.segundo_apellido, c.nombre, c.telefono, c.domicilio, c.id_membresia, c.id_rutina, c.fotografia 
        FROM cliente c;
        WHERE id_cliente=:id_cliente;");
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
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
    
    function Insert($datos){
    $this->connect();
    $nombre_archivo = $this->upload('clientes');
    if ($nombre_archivo) {
        $stmt = $this->conn->prepare("INSERT INTO cliente 
        (primer_apellido,segundo_apellido,nombre,rfc,fotografia)
        VALUES (:primer_apellido,:segundo_apellido,:nombre,:rfc,:fotografia);");    
        $stmt->bindParam(':rfc', $datos['rfc'], PDO::PARAM_STR);
        $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
    } else {
        $stmt = $this->conn->prepare("INSERT INTO cliente 
        VALUES (:primer_apellido,:segundo_apellido,:nombre);");
    }
    $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
    $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount();
    }

    function Delete($id_cliente)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM cliente
        WHERE id_cliente=:id_cliente;");
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_cliente, $datos)
    { //datos es un array
        $this->connect();
        $nombre_archivo = $this->upload('clientes');
        if ($nombre_archivo) {
            $stmt = $this->conn->prepare("UPDATE cliente SET 
            primer_apellido=:primer_apellido,
            segundo_apellido=:segundo_apellido,
            nombre=:nombre,
            rfc=:rfc,
            fotografia=:fotografia
            WHERE id_cliente=:id_cliente;");
            $stmt->bindParam(':rfc', $datos['rfc'], PDO::PARAM_STR);
            $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
        } else {
            $stmt = $this->conn->prepare("UPDATE cliente SET 
            primer_apellido=:primer_apellido,
            segundo_apellido=:segundo_apellido,
            nombre=:nombre
            WHERE id_cliente=:id_cliente;");
        }
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function validatecliente($datos)
    {
        if (empty($datos['cliente'])) {
            return false;
        }
        return true;
    }
}
