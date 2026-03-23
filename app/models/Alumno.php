<?php

require_once __DIR__ . '/../../config/database.php';

class Alumno {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM alumnos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($nombre, $correo) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO alumnos (nombre, correo) VALUES (?, ?)");
        $stmt->execute([$nombre, $correo]);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM alumnos WHERE id = ?");
        $stmt->execute([$id]);
    }
}