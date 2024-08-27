<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banco_db_pdo
 *
 * @author aluno
 */
class banco_conexao {
    
    private $db_host = 'localhost';
    private $db_name = 'BANCO_MSSJ';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_pdo = null;
    
    public function __construct() {
        try
        {
            $this->db_pdo = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_pass);
            $this->db_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo "Erro banco de dados: " . $e->getMessage() . "<br/>";
        }
    }
    
    public function send_query($sql) {
        $prepared = $this->db_pdo->prepare($sql);
        $prepared->execute();
        return $prepared->fetchAll();
    }
    
}
