<?php
include 'header.php';
include (__DIR__.'/admin/producto.class.php');

session_start();
echo "<pre>"; 
print_r($_SESSION);
$carrito = array();
if(isset($_SESSION['card'])){
    $carrito = $_SESSION['card'];
}

$web = new Producto;
 foreach($carrito as $id_producto=>$cantidad):
    echo "id_producto: $id_producto, cantidad: $cantidad<br>";
    $dato = $web->getOne($id_producto);
    $subtotal=$cantidad*$dato['precio'];
 
?>
<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                <div class="card">
                    <img src="uploads/productos/<?php echo $dato['fotografia']?>" class="card-img-top" alt="">
                    <h4><a href=""><?php echo $dato['producto'] ?></a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>
