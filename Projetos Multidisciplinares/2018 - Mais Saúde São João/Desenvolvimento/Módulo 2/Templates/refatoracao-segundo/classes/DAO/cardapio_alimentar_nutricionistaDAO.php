<?php
require_once 'Conexao.php';

class CARDAPIO_ALIMENTAR_NUTRICIONISTA_DAO {
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
  
    public function Excluir($id) {
        $sql = "DELETE FROM $this ->tabela WHERE ID = ID";
        $stmt = $pdo->prepare ($sql);
        $stmt->bindParam(':ID',$id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function Insert($obj_can){
        $sql = "INSERT INTO $this->tabela ( " .
                "FK_USUARIOS_USU_CODIGO, ".
                "CAN_DATA_CRIADO," .
            "CAN_DATA_INICIO," .
            "CAN_DATA_FIM)" .
            "VALUES (" .           
            ":FK_USUARIOS_USU_CODIGO, " .
            "now()," .
            ":CAN_DATA_INICIO," .
            ":CAN_DATA_FIM)";
        
        $stmt = $this->conexao->prepare($sql);
        
      
        $stmt->bindParam(':CAN_DATA_INICIO',$CAN_DATA_INICIO, PDO::PARAM_STR);
        $stmt->bindParam(':CAN_DATA_FIM',$CAN_DATA_FIM, PDO::PARAM_STR);
        $stmt->bindParam(':FK_USUARIOS_USU_CODIGO',$FK_USUARIOS_USU_CODIGO, PDO::PARAM_INT);
        $CAN_DATA_INICIO = $obj_can->getCAN_DATA_INICIO();
        $CAN_DATA_FIM = $obj_can ->getCAN_DATA_FIM();
        $FK_USUARIOS_USU_CODIGO = $obj_can->getFK_USUARIOS_USU_CODIGO();
        
        $stmt->execute();
        
       
        $obj_can ->setCAN_CODIGO($this->conexao-> lastInsertId());

        
    }
    
      public function listarTodos() {
        $this->sql = "SELECT * FROM $this->tabela order by CAN_DATA_CRIADO";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    
    public function Update($CAN_CODIGO, $CAN_DATA_CRIACAO, $CAN_DATA_INICIO, $CAN_DATA_FIM){
        $sql = "UPDATE $this->tabela SET
                CAN_CODIGO =:CAN_CODIGO,
                CAN_DATA_CRIACAO =:CAN_DATA_CRIACAO,
                CAN_DATA_INICIO =:CAN_DATA_INICIO,
                CAN_DATA_FIM =:CAN_DATA_FIM";
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindParam(':CAN_CODIGO', $CAN_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(':CAN_DATA_CRIACAO',$CAN_DATA_CRIACAO, PDO::PARAM_STR);
        $stmt->bindParam(':CAN_DATA_INICIO',$CAN_DATA_INICIO, PDO::PARAM_STR);
        $stmt->bindParam(':CAN_DATA_FIM',$CAN_DATA_FIM, PDO::PARAM_STR);
        $stmt->execute();
    }
}

