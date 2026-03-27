<?php
require_once __DIR__ . '/../models/Maestro.php';

class MaestroController {
    public static function index() {
        $maestros = Maestro::all();
        $view = __DIR__ . '/../views/maestros/index.php';
        require __DIR__ . '/../views/layout.php';
    }

    public static function store() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $nombre = trim($_POST['nombre'] ?? '');
        $correo = trim($_POST['correo'] ?? '');

        if (empty($nombre) || strlen($nombre) < 3 || !preg_match("/^[a-zA-Z\sñÑáéíóúÁÉÍÓÚ]+$/", $nombre)) {
            $_SESSION['error'] = "❌ Nombre inválido (mínimo 3 letras, sin números).";
            header("Location: /control-escolar/public/?action=maestros");
            exit;
        }

        Maestro::create($nombre, $correo);
        $_SESSION['success'] = "✅ Maestro registrado correctamente.";
        header("Location: /control-escolar/public/?action=maestros");
        exit;
    }

    public static function edit() {
        if (!isset($_GET['id'])) {
            header("Location: /control-escolar/public/?action=maestros");
            exit;
        }
        $maestro = Maestro::find($_GET['id']);
        $view = __DIR__ . '/../views/maestros/edit.php';
        require __DIR__ . '/../views/layout.php';
    }

    public static function update() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $id = $_POST['id'] ?? null;
        $nombre = trim($_POST['nombre'] ?? '');
        $correo = trim($_POST['correo'] ?? '');

        if (!$id || empty($nombre) || strlen($nombre) < 3) {
            $_SESSION['error'] = "❌ Error al actualizar: Datos no válidos.";
            header("Location: /control-escolar/public/?action=maestros");
            exit;
        }

        if (Maestro::update($id, $nombre, $correo)) {
            $_SESSION['success'] = "✅ Maestro actualizado correctamente.";
        } else {
            $_SESSION['error'] = "❌ Error crítico en la base de datos.";
        }

        header("Location: /control-escolar/public/?action=maestros");
        exit;
    }

    public static function delete() {
        if (isset($_GET['id'])) {
            Maestro::delete($_GET['id']);
        }
        header("Location: /control-escolar/public/?action=maestros");
        exit;
    }
}