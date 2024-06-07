<div class="container">
    <form action="tienda.php?action=<?php echo ($action == 'update') ? 'change&id_tienda=' . $datos['id_tienda'] : 'save'; ?>" method="post" enctype="multipart/form-data">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> Tiendas</h2>
        <div class="mb-3">
            <label for="InputTienda" class="form-label">Tienda</label>
            <input type="text" class="form-control" id="InputTienda" name="tienda" required="required" value="<?php echo (isset($datos["tienda"])) ? $datos["tienda"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputLatitud" class="form-label">Latitud</label>
            <input type="text" class="form-control" id="InputLatitud" name="latitud" required="required" value="<?php echo (isset($datos["latitud"])) ? $datos["latitud"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputLongitud" class="form-label">Longitud</label>
            <input type="text" class="form-control" id="InputLongitud" name="longitud" required="required" value="<?php echo (isset($datos["longitud"])) ? $datos["longitud"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputFotografia" class="form-label">Fotografia</label>
            <input type="file" class="form-control" id="InputFotografia" name="fotografia" required="required" value="<?php echo (isset($datos["fotografia"])) ? $datos["fotografia"] : ''; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
    </form>
</div>