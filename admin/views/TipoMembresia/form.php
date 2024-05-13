<div class="container">
    <form action="membresia.php?action=<?php echo($action=='update')?'change&id_membresia='.$datos['id_membresia']:'save'; ?>" method="post">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> Membresia</h2>
        <div class="mb-3">
            <label for="Inputmembresia" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Inputmembresia" name="nombre" required="required" value="<?php echo (isset($datos["nombre"])) ? $datos["nombre"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="Inputmembresia" class="form-label">Precio</label>
            <input type="text" class="form-control" id="Inputmembresia" name="precio" required="required" value="<?php echo (isset($datos["precio"])) ? $datos["precio"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="Inputbeneficios" class="form-label">Beneficios</label>
            <input type="text" class="form-control" id="Inputbeneficios" name="beneficios" required="required" value="<?php echo (isset($datos["beneficios"])) ? $datos["beneficios"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputTipoMembresia" class="form-label">Tipo Membresia</label>
            <select name="id_tipomembresia" class="form-select">
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
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
    </form>
</div>  