<h1>Compras</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="compra.php?action=create" class="btn btn-success">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id Compra</th>
            <th scope="col">Id Empleado</th>
            <th scope="col">Fecha</th>
            <th scope="col">Costo</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_compra']; ?></th>
                <td><?php echo $dato['id_empleado']; ?></td>
                <td><?php echo $dato['fecha'];?></td>
                <td><?php echo $dato['costo'];?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="compra.php?action=update&id_compra=<?php echo $dato['id_compra']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="compra.php?action=delete&id_compra=<?php echo $dato['id_compra']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> compras</P>