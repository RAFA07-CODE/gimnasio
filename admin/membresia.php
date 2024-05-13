<?php
include(__DIR__ . '/membresia.class.php');
include(__DIR__.'/tipomembresia.class.php');
$app = new Membresia();
$appTipoMembresia = new TipoMembresia();
$app->checkRol('Administrador',true);
$tipomembresias = $appTipoMembresia->getAll();
include(__DIR__ . '/views/header.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_membresia = (isset($_GET['id_membresia'])) ? $_GET['id_membresia'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_membresia);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "membresia eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el membresia";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/membresia/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/membresia/form.php');
        break;
    case 'save':
        //print_r($_GET);
        //print_r($_POST);
        //print_r($_FILES);
        //die();
        $datos = $_POST;
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El membresia se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el membresia correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/membresia/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_membresia);
        if (isset($datos["id_membresia"])) {
            include(__DIR__ . '/views/membresia/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el membresia especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/membresia/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_membresia, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El membresia se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el membresia correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/membresia/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/membresia/index.php');
}
include(__DIR__ . '/views/footer.php');
