<?php

require_once __DIR__ . '/../config/database.php';

$db = Database::connect();

$db->exec("
CREATE TABLE IF NOT EXISTS alumnos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    correo TEXT NOT NULL
);
");

echo "✅ Tabla alumnos creada";