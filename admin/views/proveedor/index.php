<h1>Proveedor</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="proveedor.php?action=create" class="btn btn-success">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
            <th scope="col">Proveedor</th>
            <th scope="col">RFC</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_proveedor']; ?></th>
                <td><?php echo $dato['proveedor']; ?></td>
                <td><?php echo $dato['rfc']; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="proveedor.php?action=update&id_proveedor=<?php echo $dato['id_proveedor']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="proveedor.php?action=delete&id_proveedor=<?php echo $dato['id_proveedor']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> Proveedores</P>