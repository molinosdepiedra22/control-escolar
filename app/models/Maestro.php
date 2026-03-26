<?php

require_once __DIR__ . '/../../config/database.php';

class Maestro {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM maestros");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($nombre, $correo) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO maestros (nombre, correo) VALUES (?, ?)");
        $stmt->execute([$nombre, $correo]);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM maestros WHERE id = ?");
        $stmt->execute([$id]);
    }
}