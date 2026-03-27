<?php
require_once __DIR__ . '/../../config/database.php';

class Maestro {
    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM maestros ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM maestros WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($nombre, $correo) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO maestros (nombre, correo) VALUES (?, ?)");
        return $stmt->execute([$nombre, $correo]);
    }

    public static function update($id, $nombre, $correo) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE maestros SET nombre = ?, correo = ? WHERE id = ?");
        return $stmt->execute([$nombre, $correo, $id]);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM maestros WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function count() {
    $db = Database::connect();
    $stmt = $db->query("SELECT COUNT(*) as total FROM maestros");
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}