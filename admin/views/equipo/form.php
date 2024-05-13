<div class="container">
    <form action="equipo.php?action=<?php echo($action=='update')?'change&id_equipo='.$datos['id_equipo']:'save'; ?>" method="post" enctype="multipart/form-data">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> equipo</h2>
        <div class="mb-3">
            <label for="InputNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="InputNombre" name="nombre" required="required" value="<?php echo (isset($datos["nombre"])) ? $datos["nombre"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputMarca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="InputMarca" name="id_marca" required="required" value="<?php echo (isset($datos["id_marca"])) ? $datos["id_marca"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputFotografia" class="form-label">Fotografia</label>
            <input type="file" class="form-control" id="InputFotografia" name="fotografia" value="<?php echo (isset($datos["fotografia"])) ? $datos["fotografia"] : ''; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
    </form>
</div>  