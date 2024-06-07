<?php
include __DIR__ . '/admin/sistema.class.php';
$app = new Sistema();
if(!$app->checkRol("Cliente")) {
    header("Location: login.php");
}
include __DIR__ .'/header.php';
$app->connect();
$sql = "SELECT nombre, primer_apellido, segundo_apellido FROM cliente c JOIN usuario u USING (id_usuario) WHERE c.id_usuario = :id_usuario";
$stmt = $app->conn->prepare($sql);
$id_usuario = $_SESSION['id_usuario'];
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$cliente = $stmt->fetchAll();
echo '    <style>
        .profile-header {
            text-align: center;
            padding: 20px;
        }
        .profile-header h1 {
            margin: 0;
            padding: 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 10px;
        }
        .profile-details {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .profile-picture {
            flex: 1;
            text-align: center;
        }
        .profile-picture img {
            border-radius: 50%;
            max-width: 150px;
        }
        .profile-info {
            flex: 3;
            padding: 20px;
        }
        .profile-info h2 {
            margin-top: 0;
        }
        .profile-info p {
            margin: 10px 0;
        }
        #containerr {
            width: 80%;
            margin-top: 100px;
            background-color: #fff;
            padding-top: 100px;
            border-radius: 10px;
            border: 2px solid #ccc; /* Marco */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra */
        }
    </style>';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container" id="containerr">
    <title>Perfil del Usuario</title>
        <div class="profile-header">
            <?php
                echo '<h1 style="padding: 20px;">Bienvenido ' . $cliente[0]['primer_apellido'] . ' ' . $cliente[0]['segundo_apellido'] . ' ' . $cliente[0]['nombre'] . '</h1>';
            ?>
        </div>
        <div class="profile-details">
            <div class="profile-picture">
                <img src="uploads\clientes\default.png" alt="Foto de perfil">
            </div>
            <div class="profile-info">
                <h2>Datos del Usuario</h2>
                <p><strong>Nombre:</strong> <?php echo $cliente[0]['nombre'] . ' ' . $cliente[0]['primer_apellido'] . ' ' . $cliente[0]['segundo_apellido']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>

<?php include __DIR__ . '/footer.php'; ?>
