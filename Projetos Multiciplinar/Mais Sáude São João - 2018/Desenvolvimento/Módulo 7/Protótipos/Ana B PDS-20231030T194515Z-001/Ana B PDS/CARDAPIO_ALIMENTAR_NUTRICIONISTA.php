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
        $this->tabela = "CARDAPIO_ALIMENTAR_NUTRICIONISTA";
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
    public function Insert($CAN_CODIGO, $CAN_DATA_CRIACAO, $CAN_DATA_INICIO, $CAN_DATA_FIM){
        sql == "INSERT INTO $this->tabela (
            CAN_CODIGO,
            CAN_DATA_CRIACAO,
            CAN_DATA_INICIO,
            CAN_DATA_FIM)
            VALUES (
            :CAN_CODIGO,
            :CAN_DATA_CRIACAO,
            :CAN_DATA_INICIO,
            :CAN_DATA_FIM)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':CAN_CODIGO', $CAN_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(':CAN_DATA_CRIACAO',$CAN_DATA_CRIACAO, PDO::PARAM_STR);
        $stmt->bindParam(':CAN_DATA_INICIO',$CAN_DATA_INICIO, PDO::PARAM_STR);
        $stmt->bindParam(':CAN_DATA_FIM',$CAN_DATA_FIM, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function Update($CAN_CODIGO, $CAN_DATA_CRIACAO, $CAN_DATA_INICIO, $CAN_DATA_FIM){
        $sql = "UPDATE $this->tabela SET
                CAN_CODIGO =:CAN_CODIGO,
                CAN_DATA_CRIACAO =:CAN_DATA_CRIACAO,
                CAN_DATA_INICIO =:CAN_DATA_INICIO,
                CAN_DATA_FIM =:CAN_DATA_FIM";
        
         $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':CAN_CODIGO', $CAN_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(':CAN_DATA_CRIACAO',$CAN_DATA_CRIACAO, PDO::PARAM_STR);
        $stmt->bindParam(':CAN_DATA_INICIO',$CAN_DATA_INICIO, PDO::PARAM_STR);
        $stmt->bindParam(':CAN_DATA_FIM',$CAN_DATA_FIM, PDO::PARAM_STR);
        $stmt->execute();
    }
}

