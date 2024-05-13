<?php
include(__DIR__ . '/equipo.class.php');
include(__DIR__ . '/views/header.php');
$app = new Equipo();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_equipo = (isset($_GET['id_equipo'])) ? $_GET['id_equipo'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_equipo);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "equipo eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el equipo";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/equipo/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/equipo/form.php');
        break;
    case 'save':
        //print_r($_GET);
        //print_r($_POST);
        //print_r($_FILES);
        //die();
        $datos = $_POST;
        $datos['fotografia'] = $_FILES['fotografia']['name'];
        var_dump($datos);
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El equipo se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el equipo correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/equipo/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_equipo);
        if (isset($datos["id_equipo"])) {
            include(__DIR__ . '/views/equipo/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el equipo especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/equipo/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_equipo, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El equipo se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el equipo correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/equipo/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/equipo/index.php');
}
include(__DIR__ . '/views/footer.php');
