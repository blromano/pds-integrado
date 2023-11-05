<?php
include "./classes/Conexao.php";


        
    class desempenho_exercicios_fisicos_dao{
		
		 function __construct() {
        $c = new Conexao();
        $this->conexao = $c-> getConexao();
        
    }
		
        function inserir_desempenho_exercicios_fisicos($desempenho){
            $query = "INSERT INTO DESEMPENHO_EXERCICIOS_FISICOS (DEF_DATA_ATUALIZACAO,DEF_DESEMPENHO) VALUES (:def_dt_att, :def_desempenho)" ;
            $sql = $this->conexao->prepare($query);
			$sql->bindParam(':def_dt_att', $def_dt_att);
            $sql->bindParam(':def_desempenho', $def_peso);
            
            $def_dt_att = $desempenho->getDef_dt_atualizacao();
            $def_desempenho = $desempenho->getDef_desempenho();
            
            
			$sql->execute();
            header("location:");
        }
        
        function atualizar_desempenho_exercicios_fisicos($desempenho){
            $query = "UPDATE DESEMPENHO_EXERCICIOS_FISICOS SET DEF_DT_ATUALIZACAO = :def_dt_att, DEF_DESEMPENHO = :def_desempenho WHERE DEF_CODIGO = :def_cod";
            $sql = $this->conexao->prepare($query);
			$sql->bindParam(':def_dt_att', $def_dt_att);
            $sql->bindParam(':def_desempenho', $def_desempenho);
            $sql->bindParam(':def_cod', $def_cod);
            
            $def_dt_att = $desempenho->getDef_dt_atualizacao();
            $def_desempenho = $desempenho->getDef_desempenho();
            $def_cod = $desempenho->getDef_codigo();
            
            
			$sql->execute();
            header("location:");
        }
        
        function selecionar_desempenho_exercicios_fisicos($desempenho){
            $query  = "SELECT * FROM DESEMPENHO_EXERCICIOS_FISICOS";
            $sql = $this->conexao->prepare($query);
			$sql->execute();
			return $sql->fetchAll();
        }
        
        function excluir_desempenho_exercicios_fisicos($desempenho){
            $query = "DELETE FROM DESEMPENHO_EXERCICIOS_FISICOS WHERE DEF_CODIGO = :def_cod";
            $sql = $this->conexao->prepare($query);
			$sql->bindParam(":def_codigo", $_GET["def_codigo"]);
            
			$sql->execute();
        }
    }
?>
