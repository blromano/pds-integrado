<?php
include "./classes/Conexao.php";
        
    class desempenho_exercicios_fisicos_dao{
		
	function __construct() {
        $c = new Conexao();
        $this->conexao = $c-> getConexao();
        }	
        function inserir_desempenho_exercicios_fisicos($desempenho){
            $query =  "INSERT INTO DESEMPENHO_PROGRAMAS_TREINAMENTO (DPT_DATA_ATUALIZACAO,DPT_DESEMPENHO) VALUES (:dpt_dt_att, :dpt_desempenho)" ;
            $sql = $this->conexao->prepare($query);
			$sql->bindParam(':dpt_dt_att', $dpt_dt_att);
            $sql->bindParam(':dpt_desempenho', $dpt_desempenho);
            
            $dpt_dt_att = $desempenho->getDpt_dt_atualizacao();
            $dpt_desempenho = $desempenho->getDpt_desempenho();
            
            
			$sql->execute();
            header("location:");
        }
        
        function atualizar_desempenho_exercicios_fisicos($desempenho){
            $query = "UPDATE DESEMPENHO_PROGRAMAS_TREINAMENTO SET DPT_DT_ATUALIZACAO = :dpt_dt_att, DPT_DESEMPENHO = :dpt_desempenho WHERE DPT_CODIGO = :dpt_cod";
            $sql = $this->conexao->prepare($query);
			$sql->bindParam(':dpt_dt_att', $dpt_dt_att);
            $sql->bindParam(':dpt_desempenho', $dpt_desempenho);
            $sql->bindParam(':dpt_cod', $dpt_cod);
            
            $dpt_dt_att = $desempenho->getDpt_dt_atualizacao();
            $dpt_desempenho = $desempenho->getDpt_desempenho();
            $dpt_cod = $desempenho->getDpt_codigo();
            
            
			$sql->execute();
            header("location:");
        }
        
        function selecionar_desempenho_exercicios_fisicos($desempenho){
            $query  = "SELECT * FROM DESEMPENHO_PROGRAMAS_TREINAMENTO";
            $sql = $this->conexao->prepare($query);
			$sql->execute();
			return $sql->fetchAll();
        }
        
        function excluir_desempenho_exercicios_fisicos($desempenho){
            $query = "DELETE FROM DESEMPENHO_PROGRAMAS_TREINAMENTO WHERE DPT_CODIGO = :dpt_cod";
            $sql = $this->conexao->prepare($query);
			$sql->bindParam(":dpt_codigo", $_GET["dpt_codigo"]);
            
			$sql->execute();
        }
    }