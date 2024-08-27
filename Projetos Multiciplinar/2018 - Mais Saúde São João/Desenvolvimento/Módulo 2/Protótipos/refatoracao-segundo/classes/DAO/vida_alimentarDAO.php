<?php
require_once 'Conexao.php';

class VIDA_ALIMENTAR_DAO {
  private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;
    
    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "VIDA_ALIMENTAR";
    }

    public function listarTodos() {
        $this->sql = "select * from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchALL();
    }

    public function Excluir($id) {
        $sql = "DELETE FROM $this->tabela WHERE ID = :ID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':ID', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function Insert($obj_val){
        $sql = "INSERT INTO $this->tabela(FK_USUARIOS_USU_CODIGO, VAL_INDICE_CARBOIDRATOS, VAL_INDICE_PROTEINAS, VAL_INDICE_VITAMINAS, VAL_META, VAL_INDICE_CALORIAS, VAL_INDICE_GORDURA, VAL_INDICE_NUTRIENTES)". 
         "VALUES(:FK_USUARIOS_USU_CODIGO, :VAL_INDICE_CARBOIDRATOS, :VAL_INDICE_PROTEINAS, :VAL_INDICE_VITAMINAS, :VAL_META, :VAL_INDICE_CALORIAS, :VAL_INDICE_GORDURA, :VAL_INDICE_NUTRIENTES)";
   
         $stmt = $this->conexao->prepare($sql);
        
        
        $stmt->bindParam(':FK_USUARIOS_USU_CODIGO', $FK_USUARIOS_USU_CODIGO, PDO::PARAM_INT);
        $stmt->bindParam(':VAL_INDICE_CARBOIDRATOS', $VAL_INDICE_CARBOIDRATOS, PDO::PARAM_STR);
        $stmt->bindParam(':VAL_INDICE_PROTEINAS', $VAL_INDICE_PROTEINAS, PDO::PARAM_STR);
        $stmt->bindParam(':VAL_INDICE_VITAMINAS', $VAL_INDICE_VITAMINAS, PDO::PARAM_STR);
        $stmt->bindParam(':VAL_META', $VAL_META, PDO::PARAM_STR);
        $stmt->bindParam(':VAL_INDICE_CALORIAS', $VAL_INDICE_CALORIAS, PDO::PARAM_STR);
        $stmt->bindParam(':VAL_INDICE_GORDURA', $VAL_INDICE_GORDURA, PDO::PARAM_STR);
        $stmt->bindParam(':VAL_INDICE_NUTRIENTES', $VAL_INDICE_NUTRIENTES, PDO::PARAM_STR);
       
         $FK_USUARIOS_USU_CODIGO = $obj_val->getFK_USUARIOS_USU_CODIGO();
         $VAL_INDICE_CARBOIDRATOS = $obj_val->getVAL_INDICE_CARBOIDRATOS();
         $VAL_INDICE_PROTEINAS = $obj_val->getVAL_INDICE_PROTEINAS();
         $VAL_INDICE_VITAMINAS = $obj_val->getVAL_INDICE_VITAMINAS();
         $VAL_META = $obj_val->getVAL_META();
         $VAL_INDICE_CALORIAS = $obj_val->getVAL_INDICE_CALORIAS();
         $VAL_INDICE_GORDURA = $obj_val->getVAL_INDICE_GORDURA();
         $VAL_INDICE_NUTRIENTES = $obj_val->getVAL_INDICE_NUTRIENTES();
         
        
        $stmt->execute ();
         
        $obj_val ->setVAL_CODIGO($this->conexao-> lastInsertId());

        
    }
public function Update($VAL_CODIGO, $VAL_INDICE_CARBOIDRATOS, $VAL_INDICE_PROTEINAS, $VAL_INDICE_VITAMINAS, $VAL_META, $VAL_INGESTAO_CALORIAS, $VAL_INDICE_GORDURAS, $VAL_INDICE_NUTRIENTES) {

    $sql = "UPDATE $this->tabela SET " . 
        "VAL_CODIGO =:VAL_CODIGO, " .
        "VAL_INDICE_CARBOIDRATOS =:VAL_INDICE_CARBOIDRATOS, " .
        "VAL_INDICE_PROTEINAS =:VAL_INDICE_PROTEINAS, " .
        "VAL_INDICE_VITAMINAS =:VAL_INDICE_VITAMINAS, " .
        "VAL_META =:VAL_META, " .
        "VAL_INGESTAO_CALORIAS =:VAL_INGESTAO_CALORIAS, " .
        "VAL_INDICE_GORDURAS =:VAL_INDICE_GORDURAS, " .
        "VAL_INDICE_NUTRIENTES =:VAL_INDICE_NUTRIENTES"; 
        
    $stmt = $this->conexao->prepare($sql);    
    
    $stmt->binParam(':VAL_CODIGO', $VAL_CODIGO, PDO::PARAM_STR);
    $stmt->binParam(':VAL_INDICE_CARBOIDRATOS', $VAL_INDICE_CARBOIDRATOS, PDO::PARAM_STR);
    $stmt->binParam(':VAL_INDICE_PROTEINAS', $VAL_INDICE_PROTEINAS, PDO::PARAM_STR);
    $stmt->binParam(':VAL_INDICE_VITAMINAS', $VAL_INDICE_VITAMINAS, PDO::PARAM_STR);
    $stmt->binParam(':VAL_META', $VAL_META, PDO::PARAM_STR);
    $stmt->binParam(':VAL_INGESTAO_CALORIAS ', $VAL_INGESTAO_CALORIAS , PDO::PARAM_STR);
    $stmt->binParam(':VAL_INDICE_GORDURAS ', $VAL_INDICE_GORDURAS , PDO::PARAM_STR);
    $stmt->binParam(':VAL_INDICE_NUTRIENTES ', $VAL_INDICE_NUTRIENTES , PDO::PARAM_STR);
 $stmt->execute();   
  
}    
}
?>

