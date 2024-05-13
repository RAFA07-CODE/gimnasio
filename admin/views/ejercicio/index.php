<h1>Ejercicio</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="ejercicio.php?action=create" class="btn btn-success">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id Ejercicio</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Complejidad</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_ejercicio']; ?></th>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['descripcion'];?></td>
                <td><?php echo $dato['complejidad'];?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="ejercicio.php?action=update&id_ejercicio=<?php echo $dato['id_ejercicio']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="ejercicio.php?action=delete&id_ejercicio=<?php echo $dato['id_ejercicio']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> ejercicio</P>