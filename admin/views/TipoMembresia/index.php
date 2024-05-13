<h1>tipomembresia</h1>
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary">Regresar</button>
    <a href="tipomembresia.php?action=create" class="btn btn-success">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Descripcion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_tipomembresia']; ?></th>
                <td><?php echo $dato['descripcion']; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="tipomembresia.php?action=update&id_tipomembresia=<?php echo $dato['id_tipomembresia']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="tipomembresia.php?action=delete&id_tipomembresia=<?php echo $dato['id_tipomembresia']; ?>"
                         class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> tipomembresia</P>