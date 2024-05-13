<div class="container">
    <form action="comentario.php?action=<?php echo($action=='update')?'change&id_comentario='.$datos['id_comentario']:'save'; ?>" method="post">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> Comentario</h2>
        <div class="mb-3">
            <label for="Inputcomentario" class="form-label">Comentario</label>
            <input type="text" class="form-control" id="Inputcomentario" name="comentario" required="required" value="<?php echo (isset($datos["comentario"])) ? $datos["comentario"] : ''; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
    </form>
</div>