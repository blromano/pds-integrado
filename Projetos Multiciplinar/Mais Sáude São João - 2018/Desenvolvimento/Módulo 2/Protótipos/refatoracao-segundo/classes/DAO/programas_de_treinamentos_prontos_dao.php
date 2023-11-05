<?php

require_once "./classes/Conexao.php";
        
    class programas_de_treinamentos_prontos_dao{
		
		 private $conexao;
    
    function __construct() {
        $c = new Conexao();
        $this->conexao = $c-> getConexao();
        
    }
        function inserir_programas_de_treinamentos_prontos($programas_de_treinamentos_prontos){
            $query = "INSERT INTO PROGRAMAS_TREINAMENTOS_PRONTOS (PTP_DIFICULDADE, PTP_DESCRICAO, PTP_DURACAO, PTP_DT_CRIACAO) VALUES (:ptp_dificuldade, :ptp_descricao, :ptp_duracao, :ptp_data_criacao)" ;
            $sql = $this->conexao->prepare($query);
			$sql->bindParam(':ptp_dificuldade', $ptp_dificuldade);
            $sql->bindParam(':ptp_descricao', $ptp_descricao);
            $sql->bindParam(':ptp_duracao', $ptp_duracao);
            $sql->bindParam(':ptp_data_criacao', $ptp_data_criacao);
            
            $ptp_dificuldade = $programas_de_treinamentos_prontos->getPtp_dificuldade();
            $ptp_descricao = $programas_de_treinamentos_prontos->getPtp_descricao();
            $ptp_duracao = $programas_de_treinamentos_prontos->getPtp_duracao();
            $ptp_data_criacao = $programas_de_treinamentos_prontos->getPtp_data_criacao();
            
             
			$sql->execute();
            header("location:");
        }
        
        function atualizar_programas_de_treinamentos_prontos($programas_de_treinamentos_prontos){
            $query = "UPDATE PROGRAMAS_TREINAMENTOS_PRONTOS SET PTP_DIFICULDADE = :ptp_dificuldade, PTP_DESCRICAO = :ptp_descricao, PTP_DURACAO = :ptp_duracao, PTP_DATA_CRIACAO = :ptp_data_criacao WHERE PTP_CODIGO = :ptp_codigo";
            $sql = $this->conexao->prepare($query);
			$sql->bindParam(':ptp_dificuldade', $ptp_dificuldade);
            $sql->bindParam(':ptp_descricao', $ptp_descricao);
            $sql->bindParam(':ptp_duracao', $ptp_duracao);
            $sql->bindParam(':ptp_data_criacao', $ptp_data_criacao);
            $sql->bindParam(':ptp_codigo', $ptp_codigo);
            
            $ptp_dificuldade = $programas_de_treinamentos_prontos->getPtp_dificuldade();
            $ptp_descricao = $programas_de_treinamentos_prontos->getPtp_descricao();
            $ptp_duracao = $programas_de_treinamentos_prontos->getPtp_duracao();
            $ptp_data_criacao = $programas_de_treinamentos_prontos->getPtp_data_criacao();
            $ptp_codigo = $programas_de_treinamentos_prontos->getPtp_codigo();
            
           
			$sql->execute();
            header("location:");
        }
        
        function selecionar_programas_de_treinamentos_prontos(){
            $query  = "SELECT * FROM PROGRAMAS_TREINAMENTOS_PRONTOS ";
            $sql = $this->conexao->prepare($query);
			$sql->execute();
			return $sql->fetchAll();
        }
        function selecionar_programa($ptp_codigo){
            $query  = "SELECT * FROM PROGRAMAS_TREINAMENTOS_PRONTOS WHERE PTP_CODIGO = :ptp_codigo";
            $sql = $this->conexao->prepare($query);
            $sql->bindParam(":ptp_codigo", $ptp_codigo);
			$sql->execute();
			return $sql->fetchAll();
        }
        
        function excluir_programas_de_treinamentos_prontos($desempenho){
            $query = "DELETE FROM PROGRAMAS_TREINAMENTOS_PRONTOS WHERE PTP_CODIGO = :ptp_cod";
            $sql = $this->conexao->prepare($query);
			$sql->bindParam(":ptp_codigo", $_GET["ptp_codigo"]);
            
			$sql->execute();
        }
    }
?>
