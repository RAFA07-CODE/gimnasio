<?php
include(__DIR__.'/marca.class.php');
include(__DIR__.'/views/header.php');
$app = new Marca();
$app->checkRol('Administrador',true);
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_marca = (isset($_GET['id_marca'])) ? $_GET['id_marca'] : null;
$datos = array();
$alert= array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_marca);
        if ($fila) {
            $alert['type']="success";
            $alert['message']="Marca eliminada correctamente";
        }else {
            $alert['type']="danger";
            $alert['message']="No se pudo eliminar el marca";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/marca/index.php');
        break;
    case 'create':
        include(__DIR__.'/views/marca/form.php');
        break;
    case 'save':
        $datos = $_POST;
        //print_r($_GET);
        //print_r($_POST);
        //print_r($_FILES);
        //die();
        $datos['fotografia'] = $_FILES['fotografia']['name'];
        if ($app->Insert($datos)) {
            $alert['type']="success";
            $alert['message']="La marca se registro correctamente";
        }else {
            $alert['type']="danger";
            $alert['message']="No se pudo registrar la marca";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/marca/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_marca);
        if (isset($datos["id_marca"])) {
            include(__DIR__.'/views/marca/form.php');
        }else {
            $alert['type']="danger";
            $alert['message']="No existe la marca especificada.";
            $datos = $app->getAll();
            include(__DIR__.'/views/alert.php');
            include(__DIR__.'/views/marca/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_marca,$datos)) {
            $alert['type']="success";
            $alert['message']="El marca se actualizó correctamente";
        }else {
            $alert['type']="danger";
            $alert['message']="No se pudo actualizar el marca";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/marca/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__.'/views/marca/index.php');
}
include(__DIR__.'/views/footer.php');
