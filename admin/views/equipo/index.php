<h1>Equipo</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="equipo.php?action=create" class="btn btn-success">Nuevo</a>
    <a href="reportes.php?action=productos" target="_blank" class="btn btn-warning">Reporte</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Marca</th>
            <th scope="col">Fotografia</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_equipo']; ?></th>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['id_marca'];?></td>
                <td><img src="../uploads/equipos/<?php echo $dato['fotografia']?>" width="75" height="75"></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="equipo.php?action=update&id_equipo=<?php echo $dato['id_equipo']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="equipo.php?action=delete&id_equipo=<?php echo $dato['id_equipo']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> equipos</P>