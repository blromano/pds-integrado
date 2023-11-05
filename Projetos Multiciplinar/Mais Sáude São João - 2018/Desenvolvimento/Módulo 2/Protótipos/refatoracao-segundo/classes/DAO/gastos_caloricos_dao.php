<?php
include "./classes/Conexao.php";

class gastos_caloricos_dao {
	
	 private $conexao;
    
    function __construct() {
        $c = new Conexao();
        $this->conexao = $c-> getConexao();
        
    }

    //insert
    function inserir_gastos_caloricos($gastos_caloricos) {
        $query = "INSERT INTO GASTOS_CALORICOS(HGC_DT_REGISTRO, HGC_GASTO, FK_EFS_CODIGO, FK_USU_COD) VALUES (:hgc_dt_registro, :hgc_gasto, :fk_efs_codigo, :fk_usu_cod)";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(':hgc_dt_registro', $hgc_dt_registro);
        $sql->bindParam(':hgc_gasto', $hgc_gasto);
        $sql->bindParam(':fk_efs_codigo', $fk_efs_codigo);
		$sql->bindParam(':fk_usu_cod', $fk_usu_cod);
        $hgc_dt_registro = $gastos_caloricos->gethgc_dt_registro();
        $hgc_gasto = $gastos_caloricos->gethgc_gasto();
        $fk_efs_codigo = $gastos_caloricos->getfk_efs_codigo();
        $fk_usu_cod = $gastos_caloricos->getfk_usu_cod();
        
        $sql->execute();
        header("location:");
    }

    //update
    function atualizar_gastos_caloricos($gastos_caloricos) {
        $query = "UPDATE GASTOS_CALORICOS SET HGC_DT_REGISTRO = :hgc_dt_registro, HGC_GASTO = :hgc_gasto, FK_EFS_CODIGO = :fk_efs_codigo, FK_USU_COD = :fk_usu_cod WHERE HGC_CODIGO = :hgc_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":hgc_codigo", $hgc_codigo);
        $sql->bindParam(':hgc_dt_registro', $hgc_dt_registro);
        $sql->bindParam(':hgc_gasto', $hgc_gasto);
        $sql->bindParam(':fk_efs_codigo', $fk_efs_codigo);
        $sql->bindParam(':fk_usu_cod', $fk_usu_cod);
        $hgc_codigo = $gastos_caloricos->gethgc_codigo();
        $hgc_dt_registro = $gastos_caloricos->gethgc_dt_registro();
        $hgc_gasto = $gastos_caloricos->gethgc_gasto();
        $fk_efs_codigo = $gastos_caloricos->getfk_efs_codigo();
        $fk_usu_cod = $gastos_caloricos->getfk_usu_cod();
        
        $sql->execute();
        header("location:");
    }

    //select
    function selecionar_gastos_caloricos($gastos_caloricos) {
        $query = "SELECT * FROM GASTOS_CALORICOS";
		$sql = $this->conexao->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    //delete
    function excluir_gastos_caloricos($gastos_caloricos) {
        $query = "DELETE FROM GASTOS_CALORICOS WHERE HGC_CODIGO = :hgc_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":hgc_codigo", $_GET["hgc_codigo"]);
        
        $sql->execute();
    }

}

//LETRAS MAIUSCULAS EM TUDO QUE FOR BANCO PQ TEM Q ESTAR IGUAL AO BANCO
?>