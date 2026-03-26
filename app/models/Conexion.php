
<?php

require_once __DIR__ . '/../../config/database.php';

class Conexiones {

    public static function getDB() {
        return Database::connect();
    }
}