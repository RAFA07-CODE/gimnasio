<?php
include(__DIR__.'/rol.class.php');
$app = new Rol();
include(__DIR__.'/views/header.php');
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_rol = (isset($_GET['id_rol'])) ? $_GET['id_rol'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_rol);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "rol eliminada correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el rol";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/rol/index.php');
        break;
    case 'create':
        include(__DIR__.'/views/rol/form.php');
        break;
    case 'save':
        $datos = $_POST;
        $datos['fotografia'] = $_FILES['fotografia']['name'];
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El rol se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar la tarea correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/rol/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_rol);
        if (isset($datos["id_rol"])) {
            include(__DIR__.'/views/rol/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el rol especificado.";
            $datos = $app->getAll();
            include(__DIR__.'/views/alert.php');
            include(__DIR__.'/views/rol/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_rol, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "La rol se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el rol correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/rol/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__.'/views/rol/index.php');
}
include(__DIR__.'/views/footer.php');
