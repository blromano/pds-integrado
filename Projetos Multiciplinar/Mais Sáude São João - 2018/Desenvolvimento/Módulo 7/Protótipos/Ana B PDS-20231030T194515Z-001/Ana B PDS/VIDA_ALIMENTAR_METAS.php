
<?php

// put your code here
require_once 'Conexao.php';

class VIDA_ALIMENTAR_METAS {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->cenexao = $conn->getConexao();
        $this->tabela = "VIDA_ALIMENTAR_METAS";
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

    public function Insert($VAM_CODIGO, $VAM_INDICE_CARBOIDRATOS, $VAM_INDICE_PROTEINAS, $VAM_INDICE_VITAMINAS, $VAM_METAS_ALCANCAR, $VAM_INGESTAO_CALORIAS, $VAM_INDICE_GORDURAS, $VAM_INDICE_NUTRIENTES) {
        $sql = "INSERT INTO $this->tabela( VAM_CODIGO, VAM_INDICE_CARBOIDRATOS, VAM_INDICE_PROTEINAS, VAM_INDICE_VITAMINAS, VAM_METAS_ALCANCAR, VAM_INGESTAO_CALORIAS, VAM_INDICE_GORDURAS, VAM_INDICE_NUTRIENTES) 
         VALUES( :VAM_CODIGO, :VAM_INDICE_CARBOIDRATOS, :VAM_INDICE_PROTEINAS, :VAM_INDICE_VITAMINAS, :VAM_METAS_ALCANCAR, :VAM_INGESTAO_CALORIAS, :VAM_INDICE_GORDURAS, :VAM_INDICE_NUTRIENTES)";
   
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':VAM_CODIGO', $VAM_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(':VAM_INDICE_CARBOIDRATOS', $VAM_INDICE_CARBOIDRATOS, PDO::PARAM_STR);
        $stmt->bindParam(':VAM_INDICE_PROTEINAS', $VAM_INDICE_PROTEINAS, PDO::PARAM_STR);
        $stmt->bindParam(':VAM_INDICE_VITAMINAS', $VAM_INDICE_VITAMINAS, PDO::PARAM_STR);
        $stmt->bindParam(':VAM_METAS_ALCANCAR', $VAM_METAS_ALCANCAR, PDO::PARAM_STR);
        $stmt->bindParam(':VAM_INGESTAO_CALORIAS', $VAM_INGESTAO_CALORIAS, PDO::PARAM_STR);
        $stmt->bindParam(':VAM_INDICE_GORDURAS', $VAM_INDICE_GORDURAS, PDO::PARAM_STR);
        $stmt->bindParam(':VAM_INDICE_NUTRIENTES', $VAM_INDICE_NUTRIENTES, PDO::PARAM_STR);
        
        $stmt->execute ();
        
    }
public function Update($VAM_CODIGO, $VAM_INDICE_CARBOIDRATOS, $VAM_INDICE_PROTEINAS, $VAM_INDICE_VITAMINAS, $VAM_METAS_ALCANCAR, $VAM_INGESTAO_CALORIAS, $VAM_INDICE_GORDURAS, $VAM_INDICE_NUTRIENTES) {

    $sql = "UPDATE $this->tabela SET 
        VAM_CODIGO =:VAM_CODIGO,
        VAM_INDICE_CARBOIDRATOS =:VAM_INDICE_CARBOIDRATOS,
        VAM_INDICE_PROTEINAS =:VAM_INDICE_PROTEINAS,
        VAM_INDICE_VITAMINAS =:VAM_INDICE_VITAMINAS,
        VAM_METAS_ALCANCAR =:VAM_METAS_ALCANCAR,
        VAM_INGESTAO_CALORIAS =:VAM_INGESTAO_CALORIAS,
        VAM_INDICE_GORDURAS =:VAM_INDICE_GORDURAS,
        VAM_INDICE_NUTRIENTES =:VAM_INDICE_NUTRIENTES";
    $stmt = $pdo->prepare($sql);
    $stmt->binParam(':VAM_CODIGO', $VAM_CODIGO, PDO::PARAM_STR);
    $stmt->binParam(':VAM_INDICE_CARBOIDRATOS', $VAM_INDICE_CARBOIDRATOS, PDO::PARAM_STR);
    $stmt->binParam(':VAM_INDICE_PROTEINAS', $VAM_INDICE_PROTEINAS, PDO::PARAM_STR);
    $stmt->binParam(':VAM_INDICE_VITAMINAS', $VAM_INDICE_VITAMINAS, PDO::PARAM_STR);
    $stmt->binParam(':VAM_METAS_ALCANCAR', $VAM_METAS_ALCANCAR, PDO::PARAM_STR);
    $stmt->binParam(':VAM_INGESTAO_CALORIAS ', $VAM_INGESTAO_CALORIAS , PDO::PARAM_STR);
    $stmt->binParam(':VAM_INDICE_GORDURAS ', $VAM_INDICE_GORDURAS , PDO::PARAM_STR);
    $stmt->binParam(':VAM_INDICE_NUTRIENTES ', $VAM_INDICE_NUTRIENTES , PDO::PARAM_STR);
 $stmt->execute();   
  
}    
}
?>

