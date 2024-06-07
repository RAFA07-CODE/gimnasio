<?php 
include __DIR__ .'\\admin\\productos.class.php';
$web = new Producto();
$datos = array();
$datos = $web->getAll();
$bosh = $web->marketplaceBosh();
include __DIR__.'\header.php';
include __DIR__.'\views\productos\index.php';
include __DIR__.'\footer.php';
?>