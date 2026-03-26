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

$db->exec("
CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    correo TEXT,
    password TEXT
);
");

$db->exec("
INSERT INTO usuarios (correo, password)
VALUES ('pedro@gmail.com', '1234');
");

$db->exec("
CREATE TABLE IF NOT EXISTS maestros (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT,
    correo TEXT
);
");

$db->exec("
CREATE TABLE IF NOT EXISTS materias (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT
);
");