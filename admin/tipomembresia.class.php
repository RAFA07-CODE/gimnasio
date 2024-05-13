<?php
require_once(__DIR__ . "/sistema.class.php");
class TipoMembresia extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT tm.id_tipomembresia, tm.descripcion 
        FROM tipomenbresia tm;");
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
        $nombre_archivo = $this->upload('empleados');
        if ($nombre_archivo) {
            $stmt = $this->conn->prepare("UPDATE empleado SET 
            primer_apellido=:primer_apellido,
            segundo_apellido=:segundo_apellido,
            nombre=:nombre,
            rfc=:rfc,
            curp=:curp
            WHERE id_membresia=:id_membresia;");
            $stmt->bindParam(':id_membresia', $id_membresia, PDO::PARAM_INT);
            $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':rfc', $datos['rfc'], PDO::PARAM_STR);
            $stmt->bindParam(':curp', $datos['curp'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
    }

    function validateMembresia($datos)
    {
        if (isset($datos['nombre']) && trim($datos['nombre']) !== '') {
            return true;
        }
        return false;
    }
}
