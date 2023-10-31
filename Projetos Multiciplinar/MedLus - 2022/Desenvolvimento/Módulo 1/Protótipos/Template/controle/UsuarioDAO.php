<?php 

    require_once 'Conexao.php';

    class UsuarioDAO{

        private $conexao;
        private $sql;
        private $resultado;
        private $tabela;

        public function __construct(){
            $conn = new Conexao();
            $this->conexao = $conn->getConexao();
            $this->tabela = "usuarios";

        }

        public function listarTodos(){
            $this->sql = "SELECT * FROM $this->tabela";
            $this->resultado = $this->conexao->prepare($this->sql);
            $this->resultado->execute();
            return $this->resultado->fetchAll();
        }


    }