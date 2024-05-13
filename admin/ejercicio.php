<?php
include(__DIR__ . '/ejercicio.class.php');
include(__DIR__ . '/views/header.php');
$app = new Ejercicio();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_ejercicio = (isset($_GET['id_ejercicio'])) ? $_GET['id_ejercicio'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_ejercicio);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "ejercicio eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el ejercicio";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/ejercicio/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/ejercicio/form.php');
        break;
    case 'save':
        //print_r($_GET);
        //print_r($_POST);
        //print_r($_FILES);
        //die();
        $datos = $_POST;
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El ejercicio se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el ejercicio correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/ejercicio/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_ejercicio);
        if (isset($datos["id_ejercicio"])) {
            include(__DIR__ . '/views/ejercicio/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el ejercicio especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/ejercicio/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_ejercicio, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El ejercicio se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el ejercicio correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/ejercicio/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/ejercicio/index.php');
}
include(__DIR__ . '/views/footer.php');
