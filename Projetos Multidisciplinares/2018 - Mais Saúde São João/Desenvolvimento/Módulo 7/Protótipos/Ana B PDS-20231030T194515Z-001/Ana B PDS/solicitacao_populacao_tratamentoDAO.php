<?php

require_once 'Conexao.php';


class solicitacao_populacao_tratamentoDAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "solicitacoes_populacao_tratamento";
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
    public function Insert($SPT_CODIGO, $SPT_DATA_SOLICITACAO,$SPT_DATA_ACEITA_RECUSA){
        sql == "INSERT INTO $this->tabela(
                SPT_CODIGO,
                SPT_DATA_SOLICITACAO,
                SPT_DATA_ACEITA_RECUSA)
                VALUES(
                :SPT_CODIGO,
                :SPT_DATA_SOLICITACAO,
                :SPT_DATA_ACEITA_RECUSA
                )";
        $stm = $pdo->prepare($sql);
        
        $stmt->bindParam(":SPT_CODIGO", $SPT_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(":SPT_DATA_SOLICITACAO", $SPT_DATA_SOLICITACAO, PDO::PARAM_STR);
        $stmt->bindParam(":SPT_DATA_ACEITA_RECUSA", $SPT_DATA_ACEITA_RECUSA, PDO::PARAM_STR);
    $stmt->execute();
        
    }
    
    public function Update($SPT_CODIGO, $SPT_DATA_SOLICITACAO,$SPT_DATA_ACEITA_RECUSA){
        
        $sql == "UPDATE $this->tabela SET
                SPT_CODIGO = :SPT_CODIGO,
                SPT_DATA_SOLICITACAO = :SPT_DATA_SOLICITACAO,
                SPT_DATA_ACEITA_RECUSA = :SPT_DATA_ACEITA_RECUSA";
        
        $stm = $pdo->prepare($sql);
        
        $stmt->bindParam(":SPT_CODIGO", $SPT_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(":SPT_DATA_SOLICITACAO", $SPT_DATA_SOLICITACAO, PDO::PARAM_STR);
        $stmt->bindParam(":SPT_DATA_ACEITA_RECUSA", $SPT_DATA_ACEITA_RECUSA, PDO::PARAM_STR);
        $stmt->execute();
        
    }


}

?>
