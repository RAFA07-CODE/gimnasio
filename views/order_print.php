<?php
$content = "
<style>
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 10px;
        text-align: left;
    }
    table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }
    table th, table td {
        padding: 4px 6px;
        border: 1px solid #dddddd;
    }
    table tbody tr {
        border-bottom: 1px solid #dddddd;
    }
    table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
    .total {
        text-align: left; /* Movido a la izquierda */
        margin-top: 20px; /* Espacio adicional */
    }
    h2, h3 {
        color: #333333;
    }
    h2 {
        text-align: center;
        font-size: 16px;
        margin-bottom: 10px;
    }
    h3 {
        font-size: 14px;
        margin-top: 0;
    }
</style>
<div class='header'>
    <h2>Reporte de Pedido</h2>
</div>
<table>
<thead>
<tr>
<th>No. Producto</th>
<th>Producto</th>
<th>Cantidad</th>
<th>Precio</th>
</tr>
</thead>
<tbody>";

foreach ($detalles as $detalle) {
    $content .= "
    <tr>
    <td>{$detalle['id_producto']}</td>
    <td>{$detalle['producto']}</td>
    <td>{$detalle['cantidad']}</td>
    <td>{$detalle['monto']}</td>
    </tr>";
}

$content .= "
</tbody>
</table>
<div class='total'>
    <h3>Total: {$datos[0]['monto']}</h3>
</div>
";
?>
