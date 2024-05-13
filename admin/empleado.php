<?php
include(__DIR__ . '/empleado.class.php');
include(__DIR__ . '/views/header.php');
$app = new Empleado();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_empleado = (isset($_GET['id_empleado'])) ? $_GET['id_empleado'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_empleado);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "empleado eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el empleado";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/empleado/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/empleado/form.php');
        break;
    case 'save':
        $datos = $_POST;
        $datos['fotografia'] = $_FILES['fotografia']['name'];
        //print_r($_GET);
        //print_r($_POST);
        //print_r($_FILES);
        //die();
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El empleado se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el empleado correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/empleado/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_empleado);
        if (isset($datos["id_empleado"])) {
            include(__DIR__ . '/views/empleado/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el empleado especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/empleado/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_empleado, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El empleado se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el empleado correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/empleado/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/empleado/index.php');
}
include(__DIR__ . '/views/footer.php');
