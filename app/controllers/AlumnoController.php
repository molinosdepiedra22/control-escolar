<?php

require_once __DIR__ . '/../models/Alumno.php';

if (!class_exists('Alumno')) {
    die("❌ NO se cargó Alumno");
}

class AlumnoController {

    public static function index() {
        $alumnos = Alumno::all();
        require __DIR__ . '/../views/alumnos/index.php';
    }

    public static function store() {
        Alumno::create($_POST['nombre'], $_POST['correo']);
        header("Location: /control-escolar/public/");
    }

    public static function delete() {
        Alumno::delete($_GET['id']);
        header("Location: /control-escolar/public/");
    }
}