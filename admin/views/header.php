<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gymnasio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="TomaFoto/custom/css/custom.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/gimnasio/index.html">Gimnasio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/ferreteria/index.html">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Catalogo
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../admin/cliente.php">Cliente</a></li>
            <li><a class="dropdown-item" href="../admin/empleado.php">Empleado</a></li>
            <li><a class="dropdown-item" href="../admin/ejercicio.php">Ejercicio</a></li>
            <li><a class="dropdown-item" href="../admin/rutina.php">Rutina</a></li>
            <li><a class="dropdown-item" href="../admin/cita.php">Cita</a></li>
            <li><a class="dropdown-item" href="../admin/membresia.php">Membresia</a></li>
            <li><a class="dropdown-item" href="../admin/equipo.php">Equipo</a></li>
            <li><a class="dropdown-item" href="../admin/proveedor.php">Proveedores</a></li>
            <li><a class="dropdown-item" href="../admin/compra.php">Compra</a></li>
            <li><a class="dropdown-item" href="../admin/venta.php">Venta</a></li>
            <li><a class="dropdown-item" href="../admin/comentario.php">Comentarios</a></li>
            <li><a class="dropdown-item" href="../admin/marca.php">Marca</a></li>
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="login.php?action=logout">Logout</a>
          </li>
      </ul>
    </div>
  </div>
</nav>