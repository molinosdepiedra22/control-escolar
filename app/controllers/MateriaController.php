<?php

require_once __DIR__ . '/../models/Materia.php';

if (!class_exists('Materia')) {
    die("❌ NO se cargó Materia");
}

class MateriaController {

    public static function index() {
        $materias = Materia::all();

        $view = __DIR__ . '/../views/materias/index.php';
        require __DIR__ . '/../views/layout.php';
    }

    public static function store() {

        if (!isset($_POST['nombre'])) {
            die("❌ Nombre no enviado");
        }

        Materia::create($_POST['nombre']);

        header("Location: /control-escolar/public/?action=materias");
        exit;
    }

    public static function delete() {

        if (!isset($_GET['id'])) {
            die("❌ ID no proporcionado");
        }

        Materia::delete($_GET['id']);

        header("Location: /control-escolar/public/?action=materias");
        exit;
    }
}