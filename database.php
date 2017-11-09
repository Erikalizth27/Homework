<?php

class Database {
    private static $dsn = 'mysql:host=mysql01.ucs.njit.edu;dbname=elr22';
    private static $username = 'elr22';
    private static $password = 'DCPdrQfW';
    private static $db;

    private function __construct() {}
    
    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);

            
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }
}
?>