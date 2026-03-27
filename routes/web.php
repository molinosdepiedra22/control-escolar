<?php

// Iniciar sesión
session_start();

// Controladores
require_once __DIR__ . '/../app/controllers/AlumnoController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/MaestroController.php';
require_once __DIR__ . '/../app/controllers/MateriaController.php';
require_once __DIR__ . '/../app/controllers/DashboardController.php';

// Obtener acción
$action = $_GET['action'] ?? 'index';

// 🔐 Protección de rutas
if (!isset($_SESSION['usuario']) && !in_array($action, ['login', 'autenticar'])) {
    header("Location: /control-escolar/public/?action=login");
    exit;
}

// 🎯 Rutas
switch ($action) {

    // 🔐 Auth
    case 'login':
        AuthController::login();
        break;

    case 'autenticar':
        AuthController::autenticar();
        break;

    case 'logout':
        AuthController::logout();
        break;

    // 👨‍🎓 Alumnos
    case 'alumnos':
        AlumnoController::index();
        break;

    case 'create_alumno':
        AlumnoController::store();
        break;

    case 'delete_alumno':
        AlumnoController::delete();
        break;

    case 'edit_alumno':
        AlumnoController::edit();
        break;
        
    case 'update_alumno':
        AlumnoController::update();
        break;

    // 📊 Dashboard
    case 'index':
        DashboardController::index();
        break;

    // 👨‍🏫 Maestros
    case 'maestros':
        MaestroController::index();
        break;

    case 'create_maestro':
        MaestroController::store();
        break;

    case 'delete_maestro':
        MaestroController::delete();
        break;

    case 'edit_maestro':
        MaestroController::edit();
        break;
        
    case 'update_maestro':
        MaestroController::update();
        break;

    // 📚 Materias
    case 'materias':
        MateriaController::index();
        break;

    case 'create_materia':
        MateriaController::store();
        break;

    case 'delete_materia':
        MateriaController::delete();
        break;

    default:
        AlumnoController::index();
        break;
}