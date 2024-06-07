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
    <title>Listado de Marcas</title>
</head>
<body>
    <div class=\"header\">
        <img src=\"../uploads/productos/jpg.jpg\" alt=\"logo\">
        <h1>Listado de Marcas</h1>
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
    $content .= "<tr>";
    $content .= "<td>" . $dato['id_marca'] . "</td>";
    $content .= "<td>" . $dato['marca'] . "</td>";
    $content .= "<td>" . $dato['producto'] . "</td>";
    $content .= "<td>" . $dato['precio'] . "</td>";
    $content .= "</tr>";
}
$content .= "
        </tbody>
    </table>
";
?>
