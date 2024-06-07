<!-- Productos -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h1 style="padding-top: 60px;">Productos</h1>
        </div>
        <div class="col-lg-4 col-md-12">
            <p style="padding-top: -10px;">Se han encontrado <?php echo $web->getCount(); ?> productos</p>
        </div>
    </div>
    <div class="row">
        <?php foreach ($datos as $producto) : ?>
            <div class="col-lg-3 col-md-12">
                <div class="card mb-3 px-3 py-2">
                    <div class="img-container">
                        <img src="uploads/productos/<?php echo $producto['fotografia']; ?>" alt="<?php echo $producto['producto']; ?>">
                    </div>
                    <form action="cart-add.php" method="get">
                        <div class="card-body">
                            <p style="font-size: 14px;" class="card-title"><?php echo $producto['producto']; ?></p>
                            <p class="card-text text-bg-primary badge">$<?php echo $producto['precio']; ?> MXN</p>
                            <input type="number" name="cantidad" class="form-control" min="1" required>
                            <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Agregar al carrito</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>