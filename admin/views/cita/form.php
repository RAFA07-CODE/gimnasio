<div class="container">
    <form action="cliente.php?action=<?php echo ($action == 'update') ? 'change&id_cliente=' . $datos['id_cliente'] : 'save'; ?>" method="post" enctype="multipart/form-data">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> Cliente</h2>
        <div class="mb-3">
            <label for="Inputcliente" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Inputcliente" name="nombre" required="required" value="<?php echo (isset($datos["nombre"])) ? $datos["nombre"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputPrimer_Apellido" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" id="InputPrimer_Apellido" name="primer_apellido" required="required" value="<?php echo (isset($datos["primer_apellido"])) ? $datos["primer_apellido"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputSegundo_Apellido" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="InputSegundo_Apellido" name="segundo_apellido" required="required" value="<?php echo (isset($datos["segundo_apellido"])) ? $datos["segundo_apellido"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputRfc" class="form-label">RFC</label>
            <input type="text" class="form-control" id="InputRfc" name="rfc" value="<?php echo (isset($datos["rfc"])) ? $datos["rfc"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputFotografia" class="form-label">Fotografia</label>
            <input type="file" class="form-control" id="InputFotografia" name="fotografia" value="<?php echo (isset($datos["fotografia"])) ? $datos["fotografia"] : ''; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
    </form>
</div>