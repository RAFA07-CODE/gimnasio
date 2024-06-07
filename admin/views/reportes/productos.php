<?php 
$content = "
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            display: flex;
            align-items: center;
        }
        .header img {
            margin-right: 20px;
            height: 50px;
            width: 50px;
        }
        .header h1 {
            color: #d32f2f;
            margin: 0;
            font-size: 24px;
        }
        p {
            font-size: 14px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <title>Listado de Productos</title>
</head>
<body>
    <div class=\"header\">
        <img src=\"../uploads/productos/truper.png\" alt=\"logo\">
        <h1>Listado de Productos</h1>
    </div>
    <p>Se encontraron " . count($datos) . " productos</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>";
foreach ($datos as $dato) {
    $content .= "
            <tr>
                <td>" . $dato['id_producto'] . "</td>
                <td>" . $dato['marca'] . "</td>
                <td>" . $dato['producto'] . "</td>
                <td>" . $dato['precio'] . "</td>
            </tr>";
}
$content .= "
        </tbody>
    </table>
";
?>
