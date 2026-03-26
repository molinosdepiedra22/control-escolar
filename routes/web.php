<?php

// Iniciar sesión
session_start();

// Controladores
require_once __DIR__ . '/../app/controllers/AlumnoController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

// Obtener acción
$action = $_GET['action'] ?? 'index';

// 🔐 Protección de rutas (solo deja pasar login)
if (!isset($_SESSION['usuario']) && $action != 'login' && $action != 'autenticar') {
    header("Location: /control-escolar/public/?action=login");
    exit;
}

//Rutas
switch ($action) {

    // Auth
    case 'login':
        AuthController::login();
        break;

    case 'autenticar':
        AuthController::autenticar();
        break;

    case 'logout':
        AuthController::logout();
        break;

    // Alumnos
    case 'create':
        AlumnoController::store();
        break;

    case 'delete':
        AlumnoController::delete();
        break;

    // Dashboard / inicio
    case 'index':
    default:
        AlumnoController::index();
        break;
}