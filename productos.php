<?php
include __DIR__ . '\\admin\\productos.class.php';
$web = new Productos();
$datos = array();
$datos = $web->getAll();
$bosch = $web->marketplaceBosch();
//print_r($datos);
//print_r($bosch);
//die();
include __DIR__ . '/header.php';
include __DIR__ . '/views/productos/index.php';
include __DIR__. '/footer.php';
?>