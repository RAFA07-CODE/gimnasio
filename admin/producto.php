<?php
include(__DIR__.'/producto.class.php');
include(__DIR__.'/marca.class.php');
include(__DIR__.'/views/header.php');
$app = new Producto();
$appmarcas = new Marca();
$app->checkRol('Administrador',true);
$marcas = $appmarcas->getAll();
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_producto = (isset($_GET['id_producto'])) ? $_GET['id_producto'] : null;
$datos = array();
$alert = array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_producto);
        if ($fila) {
            $alert['type'] = "success";
            $alert['message'] = "Producto eliminado correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo eliminar el producto";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/producto/index.php');
        break;
    case 'create':
        include(__DIR__.'/views/producto/form.php');
        break;
    case 'save':
        $datos = $_POST;
        //print_r($_GET);
        //print_r($_POST);
        //print_r($_FILES);
        //die();
        $datos['fotografia'] = $_FILES['fotografia']['name'];
        if ($app->Insert($datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El producto se registro correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo registrar el producto correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/producto/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_producto);
        if (isset($datos["id_producto"])) {
            include(__DIR__.'/views/producto/form.php');
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No existe el producto especificado.";
            $datos = $app->getAll();
            include(__DIR__.'/views/alert.php');
            include(__DIR__.'/views/producto/index.php');
        }
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_producto, $datos)) {
            $alert['type'] = "success";
            $alert['message'] = "El producto se actualizo correctamente";
        } else {
            $alert['type'] = "danger";
            $alert['message'] = "No se pudo actualizar el producto correctamente";
        }
        $datos = $app->getAll();
        include(__DIR__.'/views/alert.php');
        include(__DIR__.'/views/producto/index.php');
        break;
    default:
        $datos = $app->getAll();
        include(__DIR__.'/views/producto/index.php');
    }
include(__DIR__.'/views/footer.php');
