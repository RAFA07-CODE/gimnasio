<div class="container">
    <form action="marca.php?action=<?php echo($action=='update')?'change&id_marca='.$datos['id_marca']:'save'; ?>" method="post">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> Marca</h2>
        <div class="mb-3">
            <label for="InputMarca" class="form-label">marca</label>
            <input type="text" class="form-control" id="Inputmarca" name="marca" required="required" value="<?php echo (isset($datos["marca"])) ? $datos["marca"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputFotografia" class="form-label">Fotografia</label>
            <input type="file" class="form-control" id="InputFotografia" name="fotografia" required="required" value="<?php echo (isset($datos["fotografia"])) ? $datos["fotografia"] : ''; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
    </form>
</div>