<?php
include(__DIR__.'/usuario.class.php');
$app = new Usuario();
include(__DIR__.'/views/header.php');
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_usuario = (isset($_GET['id_usuario'])) ? $_GET['id_usuario'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_usuario);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "Usuario eliminada correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar la tienda";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/usuario/index.php');
        break;
    case 'create':
        include(__DIR__.'/views/usuario/form.php');
        break;
    case 'save':
        $datos = $_POST;
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El usuario se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar la tarea correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/usuario/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_usuario);
        if (isset($datos["id_usuario"])) {
            include(__DIR__.'/views/usuario/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el usuario especificado.";
            $datos = $app->getAll();
            include(__DIR__.'/views/alert.php');
            include(__DIR__.'/views/usuario/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_usuario, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El usuario se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el usuario correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/usuario/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__.'/views/usuario/index.php');
}
include(__DIR__.'/views/footer.php');
