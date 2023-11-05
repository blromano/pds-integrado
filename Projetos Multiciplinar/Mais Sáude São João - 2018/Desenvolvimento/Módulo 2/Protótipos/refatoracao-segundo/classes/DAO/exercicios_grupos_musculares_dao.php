<?php
include "./classes/Conexao.php";

class exercicios_grupos_musculares_dao {

 private $conexao;
    
    function __construct() {
        $c = new Conexao();
        $this->conexao = $c-> getConexao();
        
    }

    //insert
    function inserir_exercicios_grupos_musculares($exercicios_grupos_musculares) {
        $query ="INSERT INTO EXERCICIOS_GRUPOS_MUSCULARES(FK_EFS_CODIGO, FK_GRM_CODIGO) VALUES (:fk_efs_codigo, :fk_grm_codigo)";
		$sql = $this->conexao->prepare($query);
        $sql->bindParam(':fk_efs_codigo', $fk_efs_codigo);
        $sql->bindParam(':fk_grm_codigo', $fk_grm_codigo);
        $fk_efs_codigo = $exercicios_grupos_musculares->getfk_efs_codigo();
        $fk_grm_codigo = $exercicios_grupos_musculares->getfk_grm_codigo();
        
        $sql->execute();
        header("location:");
    }

    //update
    function atualizar_exercicios_grupos_musculares($exercicios_grupos_musculares) {
        $query = "UPDATE EXERCICIOS_GRUPOS_MUSCULARES SET FK_EFS_CODIGO = :fk_efs_codigo, FK_GRM_CODIGO = :fk_grm_codigo WHERE HGC_CODIGO = :egm_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":egm_codigo", $egm_codigo);
        $sql->bindParam(':fk_efs_codigo', $fk_efs_codigo);
        $sql->bindParam(':fk_grm_codigo', $fk_grm_codigo);
        $egm_codigo = $exercicios_grupos_musculares->getegm_codigo();
        $fk_efs_codigo = $exercicios_grupos_musculares->getfk_efs_codigo();
        $fk_grm_codigo = $exercicios_grupos_musculares->getfk_grm_codigo();
        
        $sql->execute();
        header("location:");
    }

    //select
    function selecionar_exercicios_grupos_musculares($exercicios_grupos_musculares) {
        $query = "SELECT * FROM EXERCICIOS_GRUPOS_MUSCULARES";
        $sql = $this->conexao->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    //delete
    function excluir_exercicios_grupos_musculares($exercicios_grupos_musculares) {
        $query = "DELETE FROM EXERCICIOS_GRUPOS_MUSCULARES WHERE HGC_CODIGO = :egm_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":egm_codigo", $_GET["egm_codigo"]);
        
        $sql->execute();
    }

}

//LETRAS MAIUSCULAS EM TUDO QUE FOR BANCO PQ TEM Q ESTAR IGUAL AO BANCO
?>