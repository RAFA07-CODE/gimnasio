<?php
include(__DIR__ . '/comentario.class.php');
include(__DIR__ . '/views/header.php');
$app = new Comentario();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_comentario = (isset($_GET['id_comentario'])) ? $_GET['id_comentario'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_comentario);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "comentario eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el comentario";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/comentario/index.php');
        break;
    case 'create':
        include(__DIR__ . '/views/comentario/form.php');
        break;
    case 'save':
        $datos = $_POST;
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El comentario se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el comentario correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/comentario/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_comentario);
        if (isset($datos["id_comentario"])) {
            include(__DIR__ . '/views/comentario/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el comentario especificado.";
            $datos = $app->getAll();
            include(__DIR__ . '/views/alert.php');
            include(__DIR__ . '/views/comentario/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_comentario, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El comentario se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el comentario correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__ . '/views/alert.php');
        include(__DIR__ . '/views/comentario/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__ . '/views/comentario/index.php');
}
include(__DIR__ . '/views/footer.php');
