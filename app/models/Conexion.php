<?php

require_once __DIR__ . '/../../config/database.php';

class Conexion {

    public static function conectar() {
        return Database::connect();
    }
}