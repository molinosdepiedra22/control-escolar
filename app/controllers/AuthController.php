
<?php

require_once __DIR__ . '/../models/Conexion.php';

class AuthController {

    public static function login() {
        require __DIR__ . '/../views/auth/login.php';
    }

    public static function autenticar() {
        session_start();

        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $db = Conexion::conectar();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);

        $usuario = $stmt->fetch();

        if ($usuario && $password == $usuario['password']) {
            $_SESSION['usuario'] = $usuario;
            header("Location: /control-escolar/public/");
        } else {
            echo "❌ Credenciales incorrectas";
        }
    }

    public static function logout() {
        session_start();
        session_destroy();
        header("Location: /control-escolar/public/");
    }
}