<div class="custom-container">
    <table class="custom-table">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Nombre</th>
            <th>Precio Unitario</th>
            <th>Cantidad</th>
            <th>Precio Total</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $total = 0;
        foreach ($carrito as $id_producto => $cantidad):
            $dato = $web->getOne($id_producto);
            $total += $dato['precio'] * $cantidad;
            $_SESSION['total'] = $total;
            ?>
            <tr>
                <td><img class="custom-img" src="uploads/productos/<?php echo $dato['fotografia']; ?>" alt="<?php echo $dato['producto'] ?>"></td>
                <td><?php echo $dato['producto'] ?></td>
                <td><?php echo $dato['precio'] ?></td>
                <td><input class="custom-input" type="number" min="0" name="cantidad" value="<?php echo $cantidad; ?>"></td>
                <td><?php echo $dato['precio'] * $cantidad; ?></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="4" class="text-right">Total:</th>
            <td><?php echo $total; ?></td>
        </tr>
        </tfoot>
    </table>
    <a href="checkout.php" class="custom-btn">Pagar</a>
</div>
