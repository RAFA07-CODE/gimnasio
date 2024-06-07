<?php
$datos = $_POST;
include __DIR__ . '/admin/sistema.class.php';
$app = new Sistema();
if($app->register($datos)){
    $type = 'sucess';
    $message= 'Se ha registrado correctamente';
    $app->alert($type,$message);
    header('Location: index.php');
}else{
    $type = 'danger';
    $message = 'No se pudo registrar el usuario';
    $app->alert($type,$message);
}
?>