<h1>Rutina</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="rutina.php?action=create" class="btn btn-success">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Costo</th>
            <th scope="col">Frecuencia</th>
            <th scope="col">Dificultad</th>
            <th scope="col">Tipo Rutina</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_rutina']; ?></th>
                <td><?php echo $dato['nombre'];?></td>
                <td><?php echo $dato['costo']; ?></td>
                <td><?php echo $dato['frecuencia'];?></td>
                <td><?php echo $dato['dificultad'];?></td>
                <td><?php echo $dato['id_tiporutina'];?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="rutina.php?action=update&id_rutina=<?php echo $dato['id_rutina']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="rutina.php?action=delete&id_rutina=<?php echo $dato['id_rutina']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> rutina</P>