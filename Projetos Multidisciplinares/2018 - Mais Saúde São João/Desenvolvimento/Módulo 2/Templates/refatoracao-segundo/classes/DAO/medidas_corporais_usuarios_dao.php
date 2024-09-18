<?php
include "./classes/Conexao.php";
class medidas_corporais_usuarios_dao {
	
	 private $conexao;
    
    function __construct() {
        $c = new Conexao();
        $this->conexao = $c-> getConexao();
        
    }

    //insert
    function inserir_medidas_corporais_usuarios($medidas_corporais_usuarios) {
        $query = "INSERT INTO GASTOS_CALORICOS(HGC_DT_REGISTRO, HGC_GASTO, FK_EFS_CODIGO, FK_USU_COD)" . "VALUES (:mcu_data_medidas, :mcu_valor, :fk_mec_codigo, :fk_usu_cod)";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(':mcu_data_medidas', $mcu_data_medidas);
        $sql->bindParam(':mcu_valor', $mcu_valor);
        $sql->bindParam(':fk_mec_codigo', $fk_mec_codigo);
        $sql->bindParam(':fk_usu_cod', $fk_usu_cod);
        $mcu_data_medidas = $medidas_corporais_usuarios->getmcu_data_medidas();
        $mcu_valor = $medidas_corporais_usuarios->getmcu_valor();
        $fk_mec_codigo = $medidas_corporais_usuarios->getfk_mec_codigo();
        $fk_usu_cod = $medidas_corporais_usuarios->getfk_usu_cod();
         
        $sql->execute();
        header("location:");
    }

    //update
    function atualizar_medidas_corporais_usuarios($medidas_corporais_usuarios) {
        $query = "UPDATE MEDIDAS_CORPORAIS_USUARIOS SET MCU_DATA_MEDIDAS = :mcu_data_medidas, MCU_VALOR = :mcu_valor, FK_MEC_CODIGO = :fk_mec_codigo, FK_USU_COD = :fk_usu_cod WHERE MCU_CODIGO = :mcu_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":mcu_codigo", $mcu_codigo);
        $sql->bindParam(':mcu_data_medidas', $mcu_data_medidas);
        $sql->bindParam(':mcu_valor', $mcu_valor);
        $sql->bindParam(':fk_mec_codigo', $fk_mec_codigo);
        $sql->bindParam(':fk_usu_cod', $fk_usu_cod);
        $mcu_codigo = $medidas_corporais_usuarios->getmcu_codigo();
        $mcu_data_medidas = $medidas_corporais_usuarios->getmcu_data_medidas();
        $mcu_valor = $medidas_corporais_usuarios->getmcu_valor();
        $fk_mec_codigo = $medidas_corporais_usuarios->getfk_mec_codigo();
        $fk_usu_cod = $medidas_corporais_usuarios->getfk_usu_cod();
        
        $sql->execute();
        header("location:");
    }

    //select
    function selecionar_medidas_corporais_usuarios($medidas_corporais_usuarios) {
        $query = "SELECT * FROM MEDIDAS_CORPORAIS_USUARIOS";
        $sql = $this->conexao->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    //delete
    function excluir_medidas_corporais_usuarios($medidas_corporais_usuarios) {
        $query = "DELETE FROM GASTOS_CALORICOS WHERE HGC_CODIGO = :mcu_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":mcu_codigo", $_GET["mcu_codigo"]);
        
        $sql->execute();
    }

}

//LETRAS MAIUSCULAS EM TUDO QUE FOR BANCO PQ TEM Q ESTAR IGUAL AO BANCO
?>

