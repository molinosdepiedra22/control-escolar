
<?php

require_once __DIR__ . '/../../config/database.php';

class Materia {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM materias");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($nombre) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO materias (nombre) VALUES (?)");
        $stmt->execute([$nombre]);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM materias WHERE id = ?");
        $stmt->execute([$id]);
    }
}