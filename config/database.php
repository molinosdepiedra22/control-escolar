<?php

class Database {
    public static function connect() {
        return new PDO('sqlite:' . __DIR__ . '/../database/escuela.db');
    }
}