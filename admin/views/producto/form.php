<div class="container">
    <form action="producto.php?action=<?php echo ($action == 'update') ? 'change&id_producto=' . $datos['id_producto'] : 'save'; ?>" method="post" enctype="multipart/form-data">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> Producto</h2>
        <div class="mb-3">
            <label for="InputProducto" class="form-label">Producto</label>
            <input type="text" class="form-control" id="InputProducto" name="producto" required="required" value="<?php echo (isset($datos["producto"])) ? $datos["producto"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputPrecio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="InputPrecio" name="precio" required="required" value="<?php echo (isset($datos["precio"])) ? $datos["precio"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputId_marca" class="form-label">Marca</label>
            <select name="id_marca" class="form-select">
                <?php foreach ($marcas as $marca) :
                    $selected = '';
                    if ($marca['id_marca'] == $dato['id_marca']) {
                        $selected = 'selected';
                    }
                ?>
                    <option value="<?php echo ($marca['id_marca']); ?>" <?php echo $selected ?>> <?php echo ($marca['marca']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php if($action=='update'):?>
        <div class="mb-3">
            <label for="">Fotografia actual</label>
            <img src="../uploads/productos/<?php echo $datos['fotografia']?>" alt="">
        </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="InputFotografia" class="form-label">Fotografia</label>
            <input type="file" class="form-control" id="InputFotografia" name="fotografia" value="<?php echo (isset($datos["fotografia"])) ? $datos["fotografia"] : ''; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
</div>