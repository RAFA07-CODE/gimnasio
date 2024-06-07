<!DOCTYPE html>
<html lang="en">

<head>

    <title>MUSKULOS OLYMPUS</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css\cart.css">
    <link rel="stylesheet" href="css/main3.css">



    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-gymso-style.css">

</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50"></body>
    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="index.php">MUSKULOS OLYMPUS</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php"> Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="profile.php"></>Perfil</a>
                </li>
                <li class="nav-item">
                    <a href="productos.php" class="nav-link"><i class="fa-solid fa-bag-shopping"></i>Suplementos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="cart.php">Carrito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="orders.php">Pedidos</a>
                </li>
                <?php if (isset($_SESSION['validado'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                </li>
                <?php endif; ?>
            </ul>
            </div>

        </div>
    </nav>