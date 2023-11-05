<?php

require_once 'Conexao.php';

class medidas_exercicios_fisicos_dao {

    private $conexao;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
    }
    
        public function listar_todas_medidas() {
        try {
            $sql = "SELECT * FROM unidades_medidas_esportivas ORDER BY UNE_NOME";
            $prep = $this->conexao->prepare($sql);
            
            $prep->execute();
                
            return $prep ->fetchAll();
            
            }   catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
?>
