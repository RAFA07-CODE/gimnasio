<?php
include __DIR__ . '/sistema.class.php';
$app = new Sistema();
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
require_once __DIR__ . '/views/headerSinMenu.php';
switch ($action) {
    case "logout":
        $app->logout();
        $type = "success";
        $message = '<i class="fa-solid fa-circle-check"></i> Sesión cerrada correctamente';
        $app->alert($type, $message);
        include __DIR__ . '/views/login/index.php';
        break;
    case "login":
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $login = $app->login($correo, $password);
        if ($login) {
            header('Location: rutina.php');
        } else {
            $type = "danger";
            $message = '<i class="fa-solid fa-circle-xmark"></i> Usuario o contraseña incorrectos';
            $app->alert($type, $message);
        }
        break;
        case "register":
            include __DIR__ . "../register.php";
        case "forgot":
            include __DIR__ . "/views/login/forgot.php";
            break;
        case "reset":
            $correo = $_POST['correo'];
            $reset = $app->reset($correo);
            if ($reset) {
                $type = "success";
                $message = '<i class="fa-solid fa-circle-check"></i> Contraseña cambiada correctamente';
                $app->alert($type, $message);
            } else {
                $type = "danger";
                $message = '<i class="fa-solid fa-circle-xmark"></i> Usuario o contraseña incorrectos';
                $app->alert($type, $message);
            }
            include __DIR__ . '/views/login/index.php';
            break;
        case 'recovery':
            //print_r($_GET);
            //die();
            if(isset($_GET['token'])){
                $token = $_GET['token'];
                if($app->recovery($token)){
                    if(isset($_POST['contrasena'])){
                        $contrasena = $_POST['contrasena'];
                        if($app->recovery($token,$contrasena)){
                            $type = "success";
                            $message = '<i class="fa-solid fa-circle-check"></i> Contraseña cambiada correctamente';
                            $app->alert($type, $message);
                            include __DIR__ .'/views/login/index.php';
                            die();
                        }else{
                            $type = "danger";
                            $message = '<i class="fa-solid fa-circle-xmark"></i> Usuario o contraseña incorrectos';
                            $app->alert($type, $message);
                            die();
                        }
                    }
                    include __DIR__ .'/views/login/recovery.php';
                    die();
                }
                $message = 'Token no valido';
                $type = 'danger';
                $app->alert($type, $message);
            }
            break;
    default:
        include __DIR__ . '/views/login/index.php';
        break;
}
include(__DIR__ . '/views/footer.php');
