<?php

    class Conexao{

        private $server;
        private $user;
        private $password;
        private $db;
        private $conexao;


        public function __construct(){

            $this->server = "localhost";
            $this->user = "root";
            $this->password = "";
            $this->db = "teste";

            try{
                $this->conexao = new PDO("mysql:host=$this->server;dbname=$this->db",$this->user, $this->password);
                $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "Erro ao conectar ao Banco de Dados ". $e->getMessage(). "<br/>";
            }
            

        }
        public function getConexao(){
            return $this->conexao;
        }


    }