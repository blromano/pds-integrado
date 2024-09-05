<?php


class periodo_cardapio_nutricionista {
  private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "PERIODO_CARDAPIO_NUTRICIONISTA";
    }

    public function listarTodos() {
        $this->sql = "select * from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

    public function Excluir($id) {
       $sql = "DELETE FROM $this->tabela WHERE ID = :ID";
       $stmt =  $pdo-> prepare($sql);
       $stmt->bindParam (":ID",$id, PDO::PARAM_INT);
       $stm->execute();
    }
    public function Insert($PCN_CODIGO, $PCN_QTD_CALORIAS_PERIODO,$PCN_NOME_PERIODO, $PCN_HR_PERIODO_ALIMENTO){
        sql == "INSERT INTO $this->tabela(
                PCN_CODIGO,
                PCN_QTD_CALORIAS_PERIODO,
                PCN_NOME_PERIODO,
                PCN_HR_PERIODO_ALIMENTO)
                VALUES(
                :PCN_CODIGO,
                :PCN_QTD_CALORIAS_PERIODO,
                :PCN_NOME_PERIODO,
                :PCN_HR_PERIODO_ALIMENTO
                )";
        $stm = $pdo->prepare($sql);
        
        $stmt->bindParam(":PCN_CODIGO", $PCN_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(":PCN_QTD_CALORIAS_PERIODO", $PCN_QTD_CALORIAS_PERIODO, PDO::PARAM_STR);
        $stmt->bindParam(":PCN_NOME_PERIODO", $PCN_NOME_PERIODO, PDO::PARAM_STR);
        $stmt->bindParam(":PCN_HR_PERIODO_ALIMENTO", $PCN_HR_PERIODO_ALIMENTO, PDO::PARAM_STR);
         $stmt->execute();
        
    }
    
    public function Update($SPT_CODIGO, $SPT_DATA_SOLICITACAO,$SPT_DATA_ACEITA_RECUSA){
        
        $sql == "UPDATE $this->tabela SET
                PCN_CODIGO = :PCN_CODIGO,
                PCN_QTD_CALORIAS_PERIODO = :PCN_QTD_CALORIAS_PERIODO,
                PCN_NOME_PERIODOA = :PCN_NOME_PERIODO
                PCN_HR_PERIODO_ALIMENTO = :PCN_HR_PERIODO_ALIMENTO";
          
        
        $stm = $pdo->prepare($sql);
        
        $stmt->bindParam(":PCN_CODIGO", $PCN_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(":PCN_QTD_CALORIAS_PERIODO", $PCN_QTD_CALORIAS_PERIODO, PDO::PARAM_STR);
        $stmt->bindParam(":PCN_NOME_PERIODOA", $PCN_NOME_PERIODOA, PDO::PARAM_STR);
        $stmt->bindParam(":PCN_HR_PERIODO_ALIMENTOA", $PCN_HR_PERIODO_ALIMENTO, PDO::PARAM_STR);
        $stmt->execute();
        
    }
}
