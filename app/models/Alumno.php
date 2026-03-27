<?php

require_once __DIR__ . '/../../config/database.php';

class Alumno {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM alumnos");

        if (!$stmt) {
            die("Error SQL (alumnos): " . implode(" | ", $db->errorInfo()));
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($nombre, $correo) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO alumnos (nombre, correo) VALUES (?, ?)");

        if (!$stmt) {
            die("Error prepare (alumnos): " . implode(" | ", $db->errorInfo()));
        }

        $stmt->execute([$nombre, $correo]);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM alumnos WHERE id = ?");

        if (!$stmt) {
            die("Error delete (alumnos): " . implode(" | ", $db->errorInfo()));
        }

        $stmt->execute([$id]);
    }
    public static function count() {
    $db = Database::connect();
    $stmt = $db->query("SELECT COUNT(*) as total FROM alumnos");
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}