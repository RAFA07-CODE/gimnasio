<?php
include(__DIR__.'/rutina.class.php');
include(__DIR__.'/views/header.php');
$app = new Rutina();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_rutina = (isset($_GET['id_rutina'])) ? $_GET['id_rutina'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_rutina);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "rutina eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el rutina";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/rutina/index.php');
        break;
        case 'create':
        include(__DIR__ . '/views/rutina/form.php');
        break;
        case 'save':
        //print_r($_GET);
        //print_r($_POST);
        //die();
        $datos = $_POST;
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El rutina se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el rutina correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/rutina/index.php');
        break;
        case 'update':
        $datos = $app->getOne($id_rutina);
        if (isset($datos["id_rutina"])) {
            include(__DIR__ . '/views/rutina/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el rutina especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/rutina/index.php');
        }
        break;
        case 'change':
        $datos = $_POST;
        if ($app->Update($id_rutina, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El rutina se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el rutina correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/rutina/index.php');
        break;
        default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/rutina/index.php');
}
include(__DIR__ . '/views/footer.php');
