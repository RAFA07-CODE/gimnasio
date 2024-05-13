<?php
include(__DIR__ . '/tipomembresia.class.php');
include(__DIR__.'/marca.class.php');
$app = new TipoMembresia();
$appmarcas = new Marca();
$marcas = $appmarcas->getAll();
include(__DIR__ . '/views/header.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_tipomembresia = (isset($_GET['id_tipomembresia'])) ? $_GET['id_tipomembresia'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_tipomembresia);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "tipomembresia eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el tipomembresia";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/tipomembresia/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/tipomembresia/form.php');
        break;
    case 'save':
        //print_r($_GET);
        //print_r($_POST);
        //print_r($_FILES);
        //die();
        $datos = $_POST;
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El tipomembresia se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el tipomembresia correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/tipomembresia/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_tipomembresia);
        if (isset($datos["id_tipomembresia"])) {
            include(__DIR__ . '/views/tipomembresia/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el tipomembresia especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/tipomembresia/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_tipomembresia, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El tipomembresia se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el tipomembresia correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/tipomembresia/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/tipomembresia/index.php');
}
include(__DIR__ . '/views/footer.php');
