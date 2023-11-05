<?php

require_once 'Conexao.php';

class periodo_cardapio_nutricionistaDAO {
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
    public function Insert($obj_pcn){
        $sql = "INSERT INTO $this->tabela( ".              
                "PCN_NOME_PERIODO, ".
                "PCN_HORA_PERIODO_ALIMENTO, ".
                "FK_CARDAPIO_ALIMENTAR_NUTRICIONISTA_CAN_CODIGO) ".
                "VALUES( ".         
                ":PCN_NOME_PERIODO, ".
                ":PCN_HORA_PERIODO_ALIMENTO, ".
                ":FK_CARDAPIO_ALIMENTAR_NUTRICIONISTA_CAN_CODIGO)";
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindParam(":FK_CARDAPIO_ALIMENTAR_NUTRICIONISTA_CAN_CODIGO", $FK_CARDAPIO_ALIMENTAR_NUTRICIONISTA_CAN_CODIGO, PDO::PARAM_INT);
        $stmt->bindParam(":PCN_NOME_PERIODO", $PCN_NOME_PERIODO, PDO::PARAM_STR);
        $stmt->bindParam(":PCN_HORA_PERIODO_ALIMENTO", $PCN_HORA_PERIODO_ALIMENTO, PDO::PARAM_STR);
       
        $FK_CARDAPIO_ALIMENTAR_NUTRICIONISTA_CAN_CODIGO = $obj_pcn->getFK_CARDAPIO_ALIMENTAR_NUTRICIONISTA_CAN_CODIGO();
        $PCN_NOME_PERIODO= $obj_pcn->getPCN_NOME_PERIODO();
        $PCN_HORA_PERIODO_ALIMENTO= $obj_pcn ->getPCN_HORA_PERIODO_ALIMENTO();
        
        $stmt->execute();
        
        $obj_pcn ->setPCN_CODIGO($this->conexao-> lastInsertId());
        
    }
    
    public function Update($SPT_CODIGO, $SPT_DATA_SOLICITACAO,$SPT_DATA_ACEITA_RECUSA){
        
        $sql == "UPDATE $this->tabela SET
                PCN_CODIGO = :PCN_CODIGO,
                PCN_QTD_CALORIAS_PERIODO = :PCN_QTD_CALORIAS_PERIODO,
                PCN_NOME_PERIODOA = :PCN_NOME_PERIODO
                PCN_HORA_PERIODO_ALIMENTO = :PCN_HORA_PERIODO_ALIMENTO";
          
        
        $stm = $pdo->prepare($sql);
        
        $stmt->bindParam(":PCN_CODIGO", $PCN_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(":PCN_QTD_CALORIAS_PERIODO", $PCN_QTD_CALORIAS_PERIODO, PDO::PARAM_STR);
        $stmt->bindParam(":PCN_NOME_PERIODOA", $PCN_NOME_PERIODOA, PDO::PARAM_STR);
        $stmt->bindParam(":PCN_HORA_PERIODO_ALIMENTOA", $PCN_HORA_PERIODO_ALIMENTO, PDO::PARAM_STR);
        $stmt->execute();
        
    }
}
