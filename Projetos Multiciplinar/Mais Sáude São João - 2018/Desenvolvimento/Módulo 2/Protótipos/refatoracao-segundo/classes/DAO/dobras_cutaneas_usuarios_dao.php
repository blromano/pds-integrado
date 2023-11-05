<?php
include "./classes/Conexao.php";
class gastos_caloricos_usuarios_dao {

	function __construct() {
        $c = new Conexao();
        $this->conexao = $c-> getConexao();
        }

    //insert
    function inserir_gastos_caloricos_usuarios($gastos_caloricos_usuarios) {
        $query = "INSERT INTO GASTOS_CALORICOS(DCU_DATA_MEDIDAS, DCU_VALOR, FK_USU_COD, FK_DBC_CODIGO)" . "VALUES (:dcu_data_medidas, :dcu_valor, :fk_usu_cod, :fk_dbc_codigo)";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(':dcu_data_medidas', $dcu_data_medidas);
        $sql->bindParam(':dcu_valor', $dcu_valor);
        $sql->bindParam(':fk_usu_cod', $fk_usu_cod);
        $sql->bindParam(':fk_dbc_codigo', $fk_dbc_codigo);
        $dcu_data_medidas = $gastos_caloricos_usuarios->getdcu_data_medidas();
        $dcu_valor = $gastos_caloricos_usuarios->getdcu_valor();
        $fk_usu_cod = $gastos_caloricos_usuarios->getfk_usu_cod();
        $fk_dbc_codigo = $gastos_caloricos_usuarios->getfk_dbc_codigo();
        
		$sql->execute();
        header("location:");
    }

    //update
    function atualizar_gastos_caloricos_usuarios($gastos_caloricos_usuarios) {
        $query =  "UPDATE GASTOS_CALORICOS SET DCU_DATA_MEDIDAS = :dcu_data_medidas, DCU_VALOR = :dcu_valor, FK_USU_COD = :fk_usu_cod, FK_DBC_CODIGO = :fk_dbc_codigo WHERE DCU_CODIGO = :dcu_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":dcu_codigo", $dcu_codigo);
        $sql->bindParam(':dcu_data_medidas', $dcu_data_medidas);
        $sql->bindParam(':dcu_valor', $dcu_valor);
        $sql->bindParam(':fk_usu_cod', $fk_usu_cod);
        $sql->bindParam(':fk_dbc_codigo', $fk_dbc_codigo);
        $dcu_codigo = $gastos_caloricos_usuarios->getdcu_codigo();
        $dcu_data_medidas = $gastos_caloricos_usuarios->getdcu_data_medidas();
        $dcu_valor = $gastos_caloricos_usuarios->getdcu_valor();
        $fk_usu_cod = $gastos_caloricos_usuarios->getfk_usu_cod();
        $fk_dcb_codigo = $gastos_caloricos_usuarios->getfk_dbc_codigo();
        
		$sql->execute();
        header("location:");
    }

    //select
    function selecionar_gastos_caloricos_usuarios($gastos_caloricos_usuarios) {
        $query = "SELECT * FROM DOBRAS_CUTANEAS_USUARIOS";
        $sql = $this->conexao->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    //delete
    function excluir_gastos_caloricos_usuarios($gastos_caloricos_usuarios) {
        $query = $conexao->prepare("DELETE FROM GASTOS_CALORICOS_USUARIOS WHERE DCU_CODIGO = :dcu_codigo");
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":dcu_codigo", $_GET["dcu_codigo"]);
        
        $sql->execute();
    }

}

//LETRAS MAIUSCULAS EM TUDO QUE FOR BANCO PQ TEM Q ESTAR IGUAL AO BANCO
?>
