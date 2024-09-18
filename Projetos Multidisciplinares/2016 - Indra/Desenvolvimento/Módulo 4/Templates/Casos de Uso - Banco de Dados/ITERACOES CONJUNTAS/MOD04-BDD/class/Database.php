<?php

class Database {

    private static $driver = "mysql";
    private static $host = "localhost";
    private static $dbname = "indra";
    private static $user = "root";
    private static $senha = "";

    public static function CriarConexao() {
        $pdo = new PDO(Database::$driver . ":host=" . Database::$host . ";dbname=" . Database::$dbname, Database::$user, Database::$senha, array('PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION'));
        $pdo->exec("set names utf8");
        return $pdo;   
    }

}
