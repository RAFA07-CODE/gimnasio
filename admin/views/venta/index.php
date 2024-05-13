<h1>Ventas</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="venta.php?action=create" class="btn btn-success">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id Venta</th>
            <th scope="col">Id Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_venta']; ?></th>
                <td><?php echo $dato['id_cliente']; ?></td>
                <td><?php echo $dato['fecha'];?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="venta.php?action=update&id_venta=<?php echo $dato['id_venta']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="venta.php?action=delete&id_venta=<?php echo $dato['id_venta']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> ventas</P>