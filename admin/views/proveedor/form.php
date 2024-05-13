<div class="container">
    <form action="proveedor.php?action=<?php echo ($action == 'update') ? 'change&id_proveedor=' . $datos['id_proveedor'] : 'save'; ?>" method="post" enctype="multipart/form-data">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> Proveedor</h2>
        <div class="mb-3">
            <label for="Inputproveedor" class="form-label">Proveedor</label>
            <input type="text" class="form-control" id="Inputproveedor" name="proveedor" required="required" value="<?php echo (isset($datos["proveedor"])) ? $datos["proveedor"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputRfc" class="form-label">RFC</label>
            <input type="text" pattern="[A-Z]{4}[0-9]{6}[A-Z0-9]{3}" class="form-control" id="InputRfc" name="rfc" value="<?php echo (isset($datos["rfc"])) ? $datos["rfc"] : ''; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
    </form>
</div>