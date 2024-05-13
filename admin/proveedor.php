<?php
include(__DIR__ . '/proveedor.class.php');
include(__DIR__ . '/views/header.php');
$app = new Proveedor();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_proveedor= (isset($_GET['id_proveedor'])) ? $_GET['id_proveedor'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_proveedor);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "proveedor eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el proveedor";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/proveedor/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/proveedor/form.php');
        break;
    case 'save':
        //print_r($_GET);
        //print_r($_POST);
        //print_r($_FILES);
        //die();
        $datos = $_POST;
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El proveedor se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el proveedor correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/proveedor/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_proveedor);
        if (isset($datos["id_proveedor"])) {
            include(__DIR__ . '/views/proveedor/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el proveedor especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/proveedor/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_proveedor, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El proveedor se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el proveedor correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/proveedor/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/proveedor/index.php');
}
include(__DIR__ . '/views/footer.php');
