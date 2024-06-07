<h1>Privilegio</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="privilegio.php?action=create" class="btn btn-success">Nuevo</a>
    <a href="reportes.php?action=privilegios" target="_blank" class="btn btn-warning">Reporte</a>

</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Privilegio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_privilegio']; ?></th>
                <td><?php echo $dato['privilegio']; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="privilegio.php?action=update&id_privilegio=<?php echo $dato['id_privilegio']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="privilegio.php?action=delete&id_privilegio=<?php echo $dato['id_privilegio']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> privilegios</P>