<?php

require_once __DIR__ . '/../app/controllers/AlumnoController.php';

$action = $_GET['action'] ?? 'index';

if ($action == 'create') {
    AlumnoController::store();
} elseif ($action == 'delete') {
    AlumnoController::delete();
} else {
    AlumnoController::index();
}