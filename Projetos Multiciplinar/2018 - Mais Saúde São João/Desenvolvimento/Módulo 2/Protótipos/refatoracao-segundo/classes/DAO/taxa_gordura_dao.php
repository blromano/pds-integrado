<?php
include "./classes/Conexao.php";
class taxa_gordura_dao {

 private $conexao;
    
    function __construct() {
        $c = new Conexao();
        $this->conexao = $c-> getConexao();
        
    }

    //insert
    function inserir_taxa_gordura($taxa_gordura) {
        $query = "INSERT INTO TAXA_GORDURA(TGU_DATA_MEDIDAS, TGU_VALOR, FK_USU_COD) VALUES (:tgu_data_medidas, :tgu_valor, :fk_usu_cod)";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(':tgu_data_medidas', $tgu_data_medidas);
        $sql->bindParam(':tgu_valor', $tgu_valor);
        $sql->bindParam(':fk_usu_cod', $fk_usu_cod);
        $tgu_data_medidas = $taxa_gordura->gettgu_data_medidas();
        $tgu_valor = $taxa_gordura->gettgu_valor();
        $fk_usu_cod = $taxa_gordura->getfk_usu_cod();
         
        $sql->execute();
        header("location:");
    }

    //update
    function atualizar_taxa_gordura($taxa_gordura) {
        $query = "UPDATE TAXA_GORDURA SET TGU_DATA_MEDIDAS = :tgu_data_medidas, TGU_VALOR = :tgu_valor, FK_USU_COD = :fk_usu_cod WHERE HGC_CODIGO = :tgu_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":tgu_codigo", $tgu_codigo);
        $sql->bindParam(':tgu_data_medidas', $tgu_data_medidas);
        $sql->bindParam(':tgu_valor', $tgu_valor);
        $sql->bindParam(':fk_usu_cod', $fk_usu_cod);
        $tgu_codigo = $taxa_gordura->gettgu_codigo();
        $tgu_data_medidas = $taxa_gordura->gettgu_data_medidas();
        $tgu_valor = $taxa_gordura->gettgu_valor();
        $fk_usu_cod = $taxa_gordura->getfk_usu_cod();
        
        $sql->execute();
        header("location:");
    }

    //select
    function selecionar_taxa_gordura($taxa_gordura) {
        $query = "SELECT * FROM TAXA_GORDURA";
        $sql = $this->conexao->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    //delete
    function excluir_taxa_gordura($taxa_gordura) {
        $query = "DELETE FROM TAXA_GORDURA WHERE HGC_CODIGO = :tgu_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":tgu_codigo", $_GET["tgu_codigo"]);
        
        $sql->execute();
    }

}

//LETRAS MAIUSCULAS EM TUDO QUE FOR BANCO PQ TEM Q ESTAR IGUAL AO BANCO
?>