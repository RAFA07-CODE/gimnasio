<h1>Cita</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="cita.php?action=create" class="btn btn-success">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID CITA</th>
            <th scope="col">ID cita</th>
            <th scope="col">ID EMPLEADO</th>
            <th scope="col">ID EQUIPO</th>
            <th scope="col">Tipo Cita</th>
            <th scope="col">Comentario</th>
            <th scope="col">Fecha</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_cita']; ?></th>
                <td><?php echo $dato['id_cita']; ?></td>
                <td><?php echo $dato['id_empleado']; ?></td>
                <td><?php echo $dato['id_equipo']; ?></td>
                <td><?php echo $dato['id_tipocita'];?></td>
                <td><?php echo $dato['id_comentario'];?></td>
                <td><?php echo $dato['fecha'];?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="cita.php?action=update&id_cita=<?php echo $dato['id_cita']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="cita.php?action=delete&id_cita=<?php echo $dato['id_cita']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> citas</P>