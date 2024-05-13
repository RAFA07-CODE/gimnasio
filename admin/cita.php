<?php
include(__DIR__ . '/cita.class.php');
include(__DIR__ . '/views/header.php');
$app = new Cita();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_cita = (isset($_GET['id_cita'])) ? $_GET['id_cita'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_cita);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "cita eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el cita";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/cita/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/cita/form.php');
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
            $alert['message'] = "El cita se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el cita correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/cita/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_cita);
        if (isset($datos["id_cita"])) {
            include(__DIR__ . '/views/cita/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el cita especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/cita/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_cita, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El cita se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el cita correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/cita/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/cita/index.php');
}
include(__DIR__ . '/views/footer.php');
