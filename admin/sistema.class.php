    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require __DIR__ . '/config.php';
    class Sistema extends Config
    {
        var $conn;
        var $count = 0;
        function connect()
        {
            $this->conn = new PDO(DB_DRIVER . ":host=" . DB_HOST . ';port=' . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        }

        function query($sql)
        {
            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $datos = array();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $datos = $stmt->fetchAll();
            $this->setCount(count($datos));
            return $datos;
        }

        function getRol($correo)
        {
            $sql = "SELECT r.rol FROM usuario u
            JOIN usuario_rol ur on u.id_usuario = ur.id_usuario
            JOIN rol r on ur.id_rol = r.id_rol
            WHERE u.correo = '" . $correo . "';";
            $datos = $this->query($sql);
            $info = array();
            foreach ($datos as $row)
                array_push($info, $row['rol']);
            return $info;
        }

        function getPrivilegio($correo)
        {
            $sql = "SELECT p.privilegio FROM usuario u
            JOIN usuario_rol ur on u.id_usuario = ur.id_usuario
            JOIN rol_privilegios rp on ur.id_rol = rp.id_rol
            JOIN privilegio p on rp.id_privilegio = p.id_privilegio
            WHERE u.correo = '" . $correo . "';";
            $datos = $this->query($sql);
            $info = array();
            foreach ($datos as $row)
                array_push($info, $row['privilegio']);
            return $info;
        }

        function login($correo, $password)
        {
            $password = md5($password);
            $this->connect();
            $sql = "SELECT * FROM usuario
            WHERE correo = :correo AND contrasena = :password;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $datos = array();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $datos = $stmt->fetchAll();
            if (isset($datos[0])) {
                $roles = array();
                $roles = $this->getRol($correo);
                $privilegios = array();
                $privilegios = $this->getPrivilegio($correo);
                $_SESSION['validado'] = true;
                $_SESSION['correo'] = $correo;
                $_SESSION['roles'] = $roles;
                $_SESSION['privilegios'] = $privilegios;
                $_SESSION['id_usuario'] = $datos[0]['id_usuario'];
                return $datos[0];
            } else {
                $this->logout();
            }
            return false;
        }

        function logout()
        {
            if (!isset($_SESSION['cart'])) {
                unset($_SESSION);
                session_destroy();
            } else {
                unset($_SESSION['validado']);
                unset($_SESSION['correo']);
                unset($_SESSION['roles']);
                unset($_SESSION['privilegios']);
                session_destroy();
            }
        }

        function checkRol($rol, $kill = false)
        {
            if (isset($_SESSION['roles'])) {
                if ($_SESSION['validado']) {
                    if (in_array($rol, $_SESSION['roles'])) {
                        return true;
                    }
                }
            }
            if ($kill) {
                $this->logout();
                $this->alert('danger', 'Permiso denegado');
                die;
            }

            return false;
        }

        function checkPrivilegio($privilegio, $kill = false)
        {
            if (isset($_SESSION['privilegios'])) {
                if ($_SESSION['validado']) {
                    if (in_array($privilegio, $_SESSION['privilegios'])) {
                        return true;
                    }
                }
            }
            if ($kill) {
                $this->logout();
                $this->alert('danger', 'Permiso denegado');
                die;
            }
            return false;
        }


        function alert($type, $message)
        {
            $alert = array();
            $alert['type'] = $type;
            $alert['message'] = $message;
            include __DIR__ . '/views/alert.php';
        }

        function setCount($count)
        {
            $this->count = $count;
        }
        function getCount()
        {
            return $this->count;
        }

        public function validateEmail($email)
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            return false;
        }
        function reset($correo)
        {
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $this->connect();
                $sql = "SELECT * from usuario WHERE correo = :correo;";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
                $stmt->execute();
                $datos = array();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $datos = $stmt->fetchAll();
                if (isset($datos[0])) {
                    $token1 = md5($correo . 'Aleatorio2');
                    $token2 = md5($correo . date('Y-m-d H:i:s') . rand(1, 1000000));
                    $token = $token1 . $token2;
                    $sql = "UPDATE usuario SET token = :token WHERE correo = :correo;";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
                    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
                    $stmt->execute();
                    $destinatario = $correo;
                    $nombre = 'Juanito Bananas';
                    $asunto = 'Recuperacion de contraseña';
                    $mensaje = 'Hola, se ha solicitado la recuperación de contraseña de tu cuenta</br>
                Para recuperar tu contraseña haz click en el siguiente enlace</br>
                <a href="http://localhost/ferreteria/admin/login.php?action=recovery&token=' . $token . '">Recuperar contraseña</a><br>
                Muchas gracias</br>
                ferreteria Trupper';
                    if ($this->sendMail($destinatario, $nombre, $asunto, $mensaje)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }

        function sendMail($destinatario, $nombre, $asunto, $mensaje)
        {
            require 'C:\xampp\htdocs\gimnasio\vendor\autoload.php';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = '20030838@itcelaya.edu.mx';
            $mail->Password = 'kxoduhrfluojpzlj';
            $mail->setFrom('20030838@itcelaya.edu.mx', 'Rafael Alonso Villegas Bedolla');
            $mail->addAddress($destinatario, $nombre);
            $mail->Subject = $asunto;
            $mail->msgHTML($mensaje);
            if (!$mail->send()) {
                return false;
            } else {
                return true;
            }
        }

        function recovery($token, $contrasena = null)
        {
            $this->connect();
            if (isset($token) == 64) {
                $sql = "SELECT * from usuario WHERE token = :token;";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':token', $token, PDO::PARAM_STR);
                $stmt->execute();
                $datos = array();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $datos = $stmt->fetchAll();
                if (isset($datos[0])) {
                    if (!is_null($contrasena)) {
                        $contrasena = md5($_POST['contrasena']);
                        $correo = $datos[0]['correo'];
                        $sql = "UPDATE usuario SET contrasena=:contrasena, token = NULL WHERE correo = :correo;";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
                        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                        $stmt->execute();
                    }
                    return true;
                }
            }
            return false;
        }

        function register($datos)
        {
            if (!filter_var($datos['correo'], FILTER_VALIDATE_EMAIL)) {
                return false;
            }
            $this->connect();
            try {
                $this->conn->beginTransaction();
                $sql = 'SELECT * FROM usuario where correo = :correo';
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
                $stmt->execute();
                $usuario = $stmt->fetchAll();
                if (isset($usuario[0])) {
                    $this->conn->rollBack();
                    return false;
                }
                $sql = 'INSERT INTO usuario(correo, contrasena) values
        (:correo, :contrasena);';
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
                $contrasena = $datos['contrasena'];
                $contrasena = md5($contrasena);
                $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $stmt->execute();
                $sql = 'SELECT * from usuario where correo = :correo';
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
                $stmt->execute();
                $usuario = $stmt->fetchAll();
                if ($usuario[0]) {
                    $id_usuario = $usuario[0]['id_usuario'];
                    $sql = 'INSERT INTO usuario_rol (id_usuario,id_rol) values (:id_usuario,2)';
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                    $stmt->execute();
                    $sql = 'INSERT INTO cliente(primer_apellido, segundo_apellido, nombre,rfc,id_usuario) values(:primer_apellido, :segundo_apellido, :nombre,:rfc,:id_usuario);';
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
                    $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
                    $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
                    $stmt->bindParam(':rfc', $datos['rfc'], PDO::PARAM_STR);
                    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                    $stmt->execute();
                    $sql = 'select * from cliente c join usuario u on u.id_usuario = :id_usuario;';
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                    $stmt->execute();
                    $info = $stmt->fetchAll();
                    if (isset($info['0'])) {
                        $this->conn->commit();
                        return true;
                    }
                    $this->conn->rollback();
                    return false;
                }
            } catch (PDOException $e) {
                $this->conn->rollback();
                return false;
            }
        }


        function upload($carpeta)
        {
            $permitidos = array('image/jpeg', 'image/png', 'image/x-png');
            if (in_array($_FILES['fotografia']['type'], $this->getImageType())) {
                if ($_FILES['fotografia']['size'] <= $this->getImageSize()) {
                    $n = rand(1, 1000000);
                    $nombre_archivo = $n . $_FILES['fotografia']['size'] . $_FILES['fotografia']['name'];
                    $nombre_archivo = md5($nombre_archivo);
                    $extension = explode('.', $_FILES['fotografia']['name']);
                    $extension = $extension[sizeof($extension) - 1]; //el ultimo valor del array que contiene la extension
                    $nombre_archivo = $nombre_archivo . '.' . $extension;
                    if (!file_exists('../uploads/' . $carpeta . '/' . $nombre_archivo)) {
                        move_uploaded_file($_FILES['fotografia']['tmp_name'], '../uploads/' . $carpeta . '/' . $nombre_archivo);
                        return $nombre_archivo;
                    }
                }
            }
            return false;
        }
    }
