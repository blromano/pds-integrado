<?php

require_once 'Conexao.php';

class tipos_exercicios_fisicos_dao {

    private $conexao;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
    }
    
        public function listar_todos_tipos() {
        try {
            $sql = "SELECT * FROM tipos_execicios_fisicos ORDER BY TEF_NOME";
            $prep = $this->conexao->prepare($sql);
            
            $prep->execute();
                
            return $prep ->fetchAll();
            
            }   catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
?>
