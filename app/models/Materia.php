<?php

require_once __DIR__ . '/../../config/database.php';

class Materia {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM materias");

        if (!$stmt) {
            die("Error SQL (materias): " . implode(" | ", $db->errorInfo()));
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($nombre) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO materias (nombre) VALUES (?)");

        if (!$stmt) {
            die("Error prepare (materias): " . implode(" | ", $db->errorInfo()));
        }

        $stmt->execute([$nombre]);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM materias WHERE id = ?");

        if (!$stmt) {
            die("Error delete (materias): " . implode(" | ", $db->errorInfo()));
        }

        $stmt->execute([$id]);
    }
    public static function count() {
    $db = Database::connect();
    $stmt = $db->query("SELECT COUNT(*) as total FROM materias");
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}