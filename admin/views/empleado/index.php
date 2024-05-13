<h1>Empleados</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="empleado.php?action=create" class="btn btn-success">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Segundo Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">RFC</th>
            <th scope="col">CURP</th>
            <th scope="col">Telefono</th>
            <th scope="col">Domicilio</th>      
            <th scope="col">Fotografia</th>
            <th scope="col">Tipo Empleado</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_empleado']; ?></th>
                <td><?php echo $dato['primer_apellido']; ?></td>
                <td><?php echo $dato['segundo_apellido']; ?></td>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['rfc']; ?></td>
                <td><?php echo $dato['curp']; ?></td>
                <td><?php echo $dato['telefono'];?></td>
                <td><?php echo $dato['domicilio'];?></td>
                <td><?php echo $dato['fotografia'];?></td>
                <td><?php echo $dato['nombre'];?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="empleado.php?action=update&id_empleado=<?php echo $dato['id_empleado']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="empleado.php?action=delete&id_empleado=<?php echo $dato['id_empleado']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> Empleados</P>