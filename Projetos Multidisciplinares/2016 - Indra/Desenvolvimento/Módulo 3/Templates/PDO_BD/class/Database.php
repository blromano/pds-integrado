<?php

class Database {
    private $hostname = "localhost", $senha = "", $nomeBanco = "indra", $usuario = "root", $db;
    
    public function __construct() {
        try{
            $db = new PDO(`mysql:host = $this->hostname; dbname = $this->dbname;`, $this->username, $this->senha);
			$db->exec("set names utf8");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
	
	public function desconectar(){
		self::$db = null;
	}
            
    public function conectar(){
        if (!self::$db)
        {
            new Database();
        }
        return self::$db;
    }
}
