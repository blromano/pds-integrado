<?php
require_once 'Conexao.php';

class ALIMENTO_PERIODO_CARDAPIO {
  private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;
    
    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "ALIMENTO_PERIODO_CARDAPIO";
    }
    public function listarTodos() {
        $this->sql = "select * from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    public function Excluir($id) {
        $sql = "DELETE FROM $this ->tabela WHERE ID = ID";
        $stmt = $pdo->prepare ($sql);
        $stmt->bindParam(':ID',$id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function Insert($APC_CODIGO, $APC_PCN_PORCAO, $APC_ALIMENTO_INDICA, $APC_VARICAO_ALIMENTO, $APC_QTD_CALORIAS){
        sql == "INSERT INTO $this->tabela (
            APC_CODIGO,
            APC_PCN_PORCAO,
            APC_ALIMENTO_INDICA,
            APC_VARIACAO_ALIMENTO,
            APC_QTD_CALORIAS)
            VALUES (
            :APC_CODIGO,
            :APC_PCN_PORCAO,
            :APC_ALIMENTO_INDICA,
            :APC_VARIACAO_ALIMENTO,
            :APC_QTD_CALORIAS)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':APC_CODIGO', $APC_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(':APC_PCN_PORCAO',$APC_PCN_PORCAO, PDO::PARAM_STR);
        $stmt->bindParam(':APC_ALIMENTO_INDICA',$APC_ALIMENTO_INDICA, PDO::PARAM_STR);
        $stmt->bindParam(':APC_VARIACAO_ALIMENTO',$APC_VARIACAO_ALIMENTO, PDO::PARAM_STR);
        $stmt->bindParam(':APC_QTD_CALORIAS',$APC_QTD_CALORIAS, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function Update($APC_CODIGO, $APC_PCN_PORCAO, $APC_ALIMENTO_INDICA, $APC_VARICAO_ALIMENTO, $APC_QTD_CALORIAS){
        $sql = "UPDATE $this->tabela SET
                APC_CODIGO =:APC_CODIGO,
                APC_PCN_PORCAO =:APC_PCN_PORCAO,
                APC_ALIMENTO_INDICA =:APC_ALIMENTO_INDICA,
                APC_VARIACAO_ALIMENTO =:APC_VARIACAO_ALIMENTO,
                APC_QTD_CALORIAS =:APC_QTD_CALORIAS";
        
         $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':APC_CODIGO', $APC_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(':APC_PCN_PORCAO',$APC_PCN_PORCAO, PDO::PARAM_STR);
        $stmt->bindParam(':APC_ALIMENTO_INDICA',$APC_ALIMENTO_INDICA, PDO::PARAM_STR);
        $stmt->bindParam(':APC_VARIACAO_ALIMENTO',$APC_VARIACAO_ALIMENTO, PDO::PARAM_STR);
        $stmt->bindParam(':APC_QTD_CALORIAS',$APC_QTD_CALORIAS, PDO::PARAM_STR);
        $stmt->execute();
    }
}
