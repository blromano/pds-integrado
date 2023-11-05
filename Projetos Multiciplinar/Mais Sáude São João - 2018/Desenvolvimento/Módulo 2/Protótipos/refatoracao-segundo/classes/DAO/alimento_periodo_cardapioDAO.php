<?php
require_once 'Conexao.php';

class ALIMENTO_PERIODO_CARDAPIO_DAO {
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
    public function Insert($obj_apc){
        $sql = "INSERT INTO $this->tabela ( ".
           "FK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO, ".
           "APC_PCN_PORCAO, ".
            "FK_ALIMENTOS_ALI_CODIGO, ".
            "APC_VARIACAO_ALIMENTO, ".
            "APC_QTD_CALORIAS) ".
            "VALUES ( ".
          ":FK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO, ".
            ":APC_PCN_PORCAO, ".
            ":FK_ALIMENTOS_ALI_CODIGO, ".
            ":APC_VARIACAO_ALIMENTO, ".
            ":APC_QTD_CALORIAS)";
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindParam(':FK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO', $FK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO, PDO::PARAM_INT);
        $stmt->bindParam(':APC_PCN_PORCAO',$APC_PCN_PORCAO, PDO::PARAM_STR);
        $stmt->bindParam(':APC_VARIACAO_ALIMENTO',$APC_VARIACAO_ALIMENTO, PDO::PARAM_STR);
        $stmt->bindParam(':APC_QTD_CALORIAS',$APC_QTD_CALORIAS, PDO::PARAM_STR);
        $stmt->bindParam(':FK_ALIMENTOS_ALI_CODIGO',$FK_ALIMENTOS_ALI_CODIGO, PDO::PARAM_INT);
        
        $FK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO = $obj_apc->getFK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO();
        $APC_PCN_PORCAO = $obj_apc->getAPC_PCN_PORCAO();
        $APC_VARIACAO_ALIMENTO = $obj_apc->getAPC_VARIACAO_ALIMENTO();
        $APC_QTD_CALORIAS = $obj_apc->getAPC_QTD_CALORIAS();
        $FK_ALIMENTOS_ALI_CODIGO = $obj_apc->getFK_ALIMENTOS_ALI_CODIGO();
        
        
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
