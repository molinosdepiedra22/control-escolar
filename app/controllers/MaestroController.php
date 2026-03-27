<?php

require_once __DIR__ . '/../models/Maestro.php';

class MaestroController {

    public static function index() {
        $maestros = Maestro::all();

        $view = __DIR__ . '/../views/maestros/index.php';
        require __DIR__ . '/../views/layout.php';
    }

    public static function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Maestro::create($_POST['nombre'], $_POST['correo']);
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