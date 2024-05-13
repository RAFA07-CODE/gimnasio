<?php
require_once(__DIR__ . "/sistema.class.php");
class Cita extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT c.id_cita, c.id_cliente, c.id_empleado, c.id_equipo, c.id_tipocita, c.id_comentario, c.fecha 
        FROM cita c;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_cita)
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT c.id_cita, c.id_cliente, c.id_empleado, c.id_equipo, c.id_tipocita, c.id_comentario, c.fecha 
        FROM cita c
        WHERE id_cita = :id_cita;");
        $stmt->bindParam(':id_cita', $id_cita, PDO::PARAM_INT);
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
        $nombre_archivo = $this->upload("empleados");
        if ($this->validateEmpleado($datos)) {
            if ($nombre_archivo) {
                $stmt = $this->conn->prepare("INSERT INTO empleado 
                (primer_apellido,segundo_apellido,nombre,rfc,curp,fotografia)
                VALUES (:primer_apellido,:segundo_apellido,:nombre,:rfc,:curp,:fotografia);");
                $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
            } else {
                $stmt = $this->conn->prepare("INSERT INTO empleado 
                (primer_apellido,segundo_apellido,nombre,rfc,curp)
                VALUES (:primer_apellido,:segundo_apellido,:nombre,:rfc,:curp);");
            }
            $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':rfc', $datos['rfc'], PDO::PARAM_STR);
            $stmt->bindParam(':curp', $datos['curp'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
        return 0;
    }


    function Delete($id_cita)
    {
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM cita
        WHERE id_cita=:id_cita;");
        $stmt->bindParam(':id_cita', $id_cita, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_cita, $datos)
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
            WHERE id_cita=:id_cita;");
            $stmt->bindParam(':id_cita', $id_cita, PDO::PARAM_INT);
            $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':rfc', $datos['rfc'], PDO::PARAM_STR);
            $stmt->bindParam(':curp', $datos['curp'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
    }

    function validateEmpleado($datos)
    {
        if (empty($datos['nombre'])) {
            return false;
        }
        if (empty($datos['rfc'])) {
            return false;
        }
        if (empty($datos['curp'])) {
            return false;
        }
        if (!$this->validarRFC($datos['rfc'])) {
            return false;
        }
        if (!$this->validarCurp($datos['curp'])) {
            return false;
        }
        return true;
    }

    function validarRFC($rfc)
    {
        $regex = '/^[A-Z]{4}[0-9]{6}[A-Z0-9]{4}$/';
        return preg_match($regex, $rfc);
    } //fin función

    function validarCurp($curp)
    {
        $regex = '/^[A-Z]{4}[0-9]{6}[H|M]{1}[A-Z0-9]{7}$/';
        return preg_match($regex, $curp);
    }
}
