<?php

class ConnectionDB{
    
    public static $dsn = 'mysql:host=localhost;dbname=testphp;';
    public static $server_name = "localhost";
    public static $user = "root";
    public static $password = "qqq";
    public static $db_name = "testphp";
    private static $db;
    
    final private function __construct(){}
    final private function __clone(){}
    
    public static function get(){
        if(is_null(self::$db)){
            self::$db = new PDO(self::$dsn, self::$user, self::$password);
            self::$db->query('SET NAMES utf8');
        }
        return self::$db;
    }
}