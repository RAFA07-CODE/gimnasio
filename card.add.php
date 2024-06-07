<?php 
error_reporting(0);
session_start();
$id_producto = isset($_GET['id_producto']) ? $_GET['id_producto' ]: die("error: producto no encontrado");
$cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : die("error: cantidad no encontrado");
if(!isset($_SESSION['card'])){
    $_SESSION['card'] = array();
}
$_SESSION['card'][$id_producto] += $cantidad;
header("Location: card.php");
?>