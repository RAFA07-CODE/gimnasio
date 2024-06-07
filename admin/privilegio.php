<?php
include(__DIR__.'/privilegio.class.php');
$app = new Privilegio();
include(__DIR__.'/views/header.php');
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_privilegio = (isset($_GET['id_privilegio'])) ? $_GET['id_privilegio'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_privilegio);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "privilegio eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el privilegio";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/privilegio/index.php');
        break;
    case 'create':
        include(__DIR__.'/views/privilegio/form.php');
        break;
    case 'save':
        $datos = $_POST;
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El privilegio se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar la tarea correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/privilegio/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_privilegio);
        if (isset($datos["id_privilegio"])) {
            include(__DIR__.'/views/privilegio/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el privilegio especificado.";
            $datos = $app->getAll();
            include(__DIR__.'/views/alert.php');
            include(__DIR__.'/views/privilegio/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_privilegio, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "La privilegio se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el privilegio correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/privilegio/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__.'/views/privilegio/index.php');
}
include(__DIR__.'/views/footer.php');
