
<?php

require_once __DIR__ . '/../models/Maestro.php';

if (!class_exists('Maestro')) {
    die("❌ NO se cargó Maestro");
}

class MaestroController {

    public static function index() {
        $maestros = Maestro::all();
        require __DIR__ . '/../views/maestros/index.php';
    }

    public static function store() {
        Maestro::create($_POST['nombre'], $_POST['correo']);
        header("Location: /control-escolar/public/");
    }

    public static function delete() {
        Maestro::delete($_GET['id']);
        header("Location: /control-escolar/public/");
    }
}
