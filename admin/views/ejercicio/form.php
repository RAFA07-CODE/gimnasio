<div class="container">
    <form action="ejercicio.php?action=<?php echo($action=='update')?'change&id_ejercicio='.$datos['id_ejercicio']:'save'; ?>" method="post">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> Ejercicio</h2>
        <div class="mb-3">
            <label for="InputNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="InputNombre" name="nombre" required="required" value="<?php echo (isset($datos["nombre"])) ? $datos["nombre"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputDescripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="InputDescripcion" name="descripcion" required="required" value="<?php echo (isset($datos["descripcion"])) ? $datos["descripcion"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputComplejidad" class="form-label">Complejidad</label>
            <input type="text" class="form-control" id="InputComplejidad" name="complejidad" required="required" value="<?php echo (isset($datos["complejidad"])) ? $datos["complejidad"] : ''; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
    </form>
</div>