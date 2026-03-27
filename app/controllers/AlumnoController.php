<?php

require_once __DIR__ . '/../models/Alumno.php';

if (!class_exists('Alumno')) {
    die("❌ NO se cargó Alumno");
}

class AlumnoController {

    public static function index() {
        $alumnos = Alumno::all();
        $view = __DIR__ . '/../views/alumnos/index.php';
        require __DIR__ . '/../views/layout.php';
    }

    public static function store() {
        // Iniciamos sesión para poder mandar los errores de vuelta a la vista
        if (session_status() === PHP_SESSION_NONE) session_start();

        // 1. Verificar que los datos existan
        if (!isset($_POST['nombre']) || !isset($_POST['correo']) || empty(trim($_POST['nombre']))) {
            $_SESSION['error'] = "❌ Datos incompletos.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $nombre = trim($_POST['nombre']); 
        $correo = trim($_POST['correo']);

        // 2. REGLA: Mínimo 3 caracteres
        if (strlen($nombre) < 3) {
            $_SESSION['error'] = "❌ El nombre debe tener al menos 3 caracteres.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }

        // 3. REGLA: No aceptar números
        if (!preg_match("/^[a-zA-Z\sñÑáéíóúÁÉÍÓÚ]+$/", $nombre)) {
            $_SESSION['error'] = "❌ El nombre no puede contener números ni símbolos.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }

        // 4. Si pasó las validaciones, crear el registro
        Alumno::create($nombre, $correo);

        $_SESSION['success'] = "✅ Alumno registrado correctamente.";
        header("Location: /control-escolar/public/?action=alumnos");
        exit;
    }

    public static function delete() {
        if (!isset($_GET['id'])) {
            die("❌ ID no proporcionado");
        }
        Alumno::delete($_GET['id']);
        header("Location: /control-escolar/public/?action=alumnos");
        exit;
    }
    public static function edit() {
    if (!isset($_GET['id'])) header("Location: /control-escolar/public/?action=alumnos");
    
    $alumno = Alumno::find($_GET['id']);
    $view = __DIR__ . '/../views/alumnos/edit.php';
    require __DIR__ . '/../views/layout.php';
}

    public static function update()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        $id = $_POST['id'];
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);

        // Validaciones (reutilizadas de tu store)
        if (empty($nombre) || strlen($nombre) < 3 || !preg_match("/^[a-zA-Z\sñÑáéíóúÁÉÍÓÚ]+$/", $nombre)) {
            $_SESSION['error'] = "❌ Verifique el nombre (mínimo 3 letras, sin números).";
            header("Location: ?action=edit_alumno&id=" . $id);
            exit;
        }

        Alumno::update($id, $nombre, $correo);
        $_SESSION['success'] = "✅ Alumno actualizado correctamente.";
        header("Location: /control-escolar/public/?action=alumnos");
        exit;
    }
}