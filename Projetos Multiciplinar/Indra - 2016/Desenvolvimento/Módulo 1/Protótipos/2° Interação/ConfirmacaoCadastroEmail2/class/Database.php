<?php

class Database {

    private static $driver = "mysql";
    private static $host = "localhost";
    private static $dbname = "indra";
    private static $user = "root";
    private static $senha = "";

     public static function conectar() {
     	$con = new PDO(Database::$driver . ":host=" . Database::$host . ";dbname=" . Database::$dbname, Database::$user, Database::$senha);        
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     	$con->exec("SET CHARACTER SET utf8");
        return $con;
    }
}
