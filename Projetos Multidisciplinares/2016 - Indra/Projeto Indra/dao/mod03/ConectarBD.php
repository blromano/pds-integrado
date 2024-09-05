<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConectarBD
 *
 * @author Samuel
 */
class ConectarBD {

    private static $driver = "mysql";
    private static $host = "localhost";
    private static $dbname = "INDRA";
    private static $user = "root";
    private static $senha = "";

    public static function CriarConexao() {
        $pdo = new PDO(ConectarBD::$driver . ":host=" . ConectarBD::$host . ";dbname=" . ConectarBD::$dbname, ConectarBD::$user, ConectarBD::$senha, array('PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION'));
        $pdo->exec("set names utf8");
        return $pdo;
    }

}
