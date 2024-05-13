<div class="container">
    <form action="rutina.php?action=<?php echo($action=='update')?'change&id_rutina='.$datos['id_rutina']:'save'; ?>" method="post">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> rutina</h2>
        <div class="mb-3">
            <label for="Inputnombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Inputnombre" name="nombre" required="required" value="<?php echo (isset($datos["nombre"])) ? $datos["nombre"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="Inputcosto" class="form-label">Costo</label>
            <input type="text" class="form-control" id="Inputcosto" name="costo" required="required" value="<?php echo (isset($datos["costo"])) ? $datos["costo"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="Inputfrecuencia" class="form-label">Frecuencia</label>
            <input type="text" class="form-control" id="Inputcosto" name="frecuencia" required="required" value="<?php echo (isset($datos["frecuencia"])) ? $datos["frecuencia"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="Inputdificultad" class="form-label">Dificultad</label>
            <input type="text" class="form-control" id="Inputdificultad" name="dificultad" required="required" value="<?php echo (isset($datos["dificultad"])) ? $datos["dificultad"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="Inputtiprutina" class="form-label">Tipo Rutina</label>
            <input type="text" class="form-control" id="Inputtiprutina" name="id_tiporutina" required="required" value="<?php echo (isset($datos["id_tiporutina"])) ? $datos["id_tiporutina"] : ''; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
    </form>
</div>