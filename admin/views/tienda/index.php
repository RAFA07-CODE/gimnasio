<h1>Proveedores</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="tienda.php?action=create" class="btn btn-success">Nuevo</a>
    <a href="reportes.php?action=productos" target="_blank" class="btn btn-warning">Reporte</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Fotografia</th>
            <th scope="col">Latitud</th>
            <th scope="col">Longitud</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_tienda']; ?></th>
                <td><?php echo $dato['tienda']; ?></td>
                <td><?php echo $dato['fotografia']; ?></td>
                <td><?php echo $dato['latitud']; ?></td>
                <td><?php echo $dato['longitud'];?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="tienda.php?action=update&id_tienda=<?php echo $dato['id_tienda']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="tienda.php?action=delete&id_tienda=<?php echo $dato['id_tienda']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> producto</P>