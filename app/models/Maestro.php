<?php

require_once __DIR__ . '/../../config/database.php';

class Maestro {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM maestros");

        if (!$stmt) {
            die("Error SQL (maestros): " . implode(" | ", $db->errorInfo()));
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($nombre, $correo) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO maestros (nombre, correo) VALUES (?, ?)");

        if (!$stmt) {
            die("Error prepare (maestros): " . implode(" | ", $db->errorInfo()));
        }

        $stmt->execute([$nombre, $correo]);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM maestros WHERE id = ?");

        if (!$stmt) {
            die("Error delete (maestros): " . implode(" | ", $db->errorInfo()));
        }

        $stmt->execute([$id]);
    }
    public static function count() {
    $db = Database::connect();
    $stmt = $db->query("SELECT COUNT(*) as total FROM maestros");
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}