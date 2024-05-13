<?php
include(__DIR__ . '/compra.class.php');
include(__DIR__ . '/views/header.php');
$app = new Compra();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_compra = (isset($_GET['id_compra'])) ? $_GET['id_compra'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_compra);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "compra eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el compra";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/compra/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/compra/form.php');
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
            $alert['message'] = "El compra se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el compra correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/compra/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_compra);
        if (isset($datos["id_compra"])) {
            include(__DIR__ . '/views/compra/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el compra especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/compra/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_compra, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El compra se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el compra correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/compra/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/compra/index.php');
}
include(__DIR__ . '/views/footer.php');
