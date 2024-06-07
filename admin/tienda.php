<?php
include(__DIR__.'/tienda.class.php');
$app = new Tienda();
include(__DIR__.'/views/header.php');
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_tienda = (isset($_GET['id_tienda'])) ? $_GET['id_tienda'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_tienda);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "Tienda eliminada correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar la tienda";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/tienda/index.php');
        break;
    case 'create':
        include(__DIR__.'/views/tienda/form.php');
        break;
    case 'save':
        $datos = $_POST;
        $datos['fotografia'] = $_FILES['fotografia']['name'];
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "La tienda se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar la tarea correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/tienda/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_tienda);
        if (isset($datos["id_tienda"])) {
            include(__DIR__.'/views/tienda/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe la tienda especificada.";
            $datos = $app->getAll();
            include(__DIR__.'/views/alert.php');
            include(__DIR__.'/views/tienda/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_tienda, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "La tienda se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar la tienda correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/tienda/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__.'/views/tienda/index.php');
}
include(__DIR__.'/views/footer.php');
