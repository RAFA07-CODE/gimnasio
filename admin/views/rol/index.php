<h1>Rol</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="rol.php?action=create" class="btn btn-success">Nuevo</a>
    <a href="reportes.php?action=rols" target="_blank" class="btn btn-warning">Reporte</a>

</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Rol</th>    
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_rol']; ?></th>
                <td><?php echo $dato['rol']; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="rol.php?action=update&id_rol=<?php echo $dato['id_rol']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="rol.php?action=delete&id_rol=<?php echo $dato['id_rol']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> rol</P>