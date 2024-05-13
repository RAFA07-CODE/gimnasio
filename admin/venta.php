<?php
include(__DIR__ . '/venta.class.php');
include(__DIR__ . '/views/header.php');
$app = new Venta();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_venta = (isset($_GET['id_venta'])) ? $_GET['id_venta'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_venta);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "venta eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el venta";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/venta/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/venta/form.php');
        break;
    case 'save':
        //print_r($_GET);
        //print_r($_POST);
        //print_r($_FILES);
        //die();
        $datos = $_POST;
        $datos['fotografia'] = $_FILES['fotografia']['name'];
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El venta se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el venta correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/venta/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_venta);
        if (isset($datos["id_venta"])) {
            include(__DIR__ . '/views/venta/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el venta especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/venta/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_venta, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El venta se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el venta correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/venta/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/venta/index.php');
}
include(__DIR__ . '/views/footer.php');
