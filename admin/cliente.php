<?php
include(__DIR__ . '/cliente.class.php');
include(__DIR__ . '/views/header.php');
$app = new Cliente();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_cliente = (isset($_GET['id_cliente'])) ? $_GET['id_cliente'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_cliente);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "Cliente eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el cliente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/cliente/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/cliente/form.php');
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
            $alert['message'] = "El cliente se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el cliente correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/cliente/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_cliente);
        if (isset($datos["id_cliente"])) {
            include(__DIR__ . '/views/cliente/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el cliente especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/cliente/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_cliente, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El cliente se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el cliente correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/cliente/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/cliente/index.php');
}
include(__DIR__ . '/views/footer.php');
