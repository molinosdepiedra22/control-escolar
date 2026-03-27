<?php

require_once __DIR__ . '/../models/Alumno.php';
require_once __DIR__ . '/../models/Maestro.php';
require_once __DIR__ . '/../models/Materia.php';

class DashboardController {

    public static function index() {

        $totalAlumnos = Alumno::count();
        $totalMaestros = Maestro::count();
        $totalMaterias = Materia::count();

        $view = __DIR__ . '/../views/dashboard/index.php';
        require __DIR__ . '/../views/layout.php';
    }
}