<?php
include conexao.php;
        
    class educadores_fisicos_dao{
        function inserir_educadores_fisicos($educadores_fisicos){
            $query = $conexao->prepare("INSERT INTO EDUCADORES_FISICOS (EDU_DESC_PROFISSIONAL, EDU_FOCO, EDU_STATUS, EDU_CREF) VALUES (:edu_desc_profissional, :edu_foco, :edu_status, :edu_cref)" );
			$sql = $this->conexao->prepare($query);
            $sql->bindParam(':edu_desc_profissional', $edu_desc_profissional);
            $sql->bindParam(':edu_foco', $edu_foco);
            $sql->bindParam(':edu_status', $edu_status);
            $sql->bindParam(':edu_cref', $edu_cref);
            
            $edu_desc_profissional = $educadores_fisicos->getEdu_desc_profissional();
            $edu_foco = $educadores_fisicos->getEdu_foco();
            $edu_status = $educadores_fisicos->getEdu_status();
            $edu_cref = $educadores_fisicos->getEdu_cref();
            
            $sql->execute();
            header("location:");
        }
        
        function atualizar_educadores_fisicos($educadores_fisicos){
            $query = $conexao->prepare("UPDATE EDUCADORES_FISICOS SET EDU_DESC_PROFISSIONAL = :edu_desc_profissional, EDU_FOCO = :edu_foco, EDU_STATUS = :edu_status, EDU_CREF = :edu_cref WHERE EDU_CODIGO = :edu_codigo");
            $sql = $this->conexao->prepare($query);
			$sql->bindParam(':edu_desc_profissional', $edu_desc_profissional);
            $sql->bindParam(':edu_foco', $edu_foco);
            $sql->bindParam(':edu_status', $edu_status);
            $sql->bindParam(':edu_cref', $edu_cref);
            
            $edu_desc_profissional = $educadores_fisicos->getEdu_desc_profissional();
            $edu_foco = $educadores_fisicos->getEdu_foco();
            $edu_status = $educadores_fisicos->getEdu_status();
            $edu_cref = $educadores_fisicos->getEdu_cref();
            $edu_codigo = $educadores_fisicos->getEdu_codigo();
            
            $sql->execute();
            header("location:");
        }
        
        function selecionar_educadores_fisicos($educadores_fisicos){
            $query  = $conexao->prepare("SELECT * EDUCADORES_FISICOS");
            $sql->execute();
			return $sql->fetchAll();
        }
        
        function excluir_educadores_fisicos($educadores_fisicos){
            $query = $conexao->prepare("DELETE FROM EDUCADORES_FISICOS WHERE EDU_CODIGO = :edu_cod");
			$sql = $this->conexao->prepare($query);
            $sql->bindParam(":edu_codigo", $_GET["edu_codigo"]);
            $sql->execute();
        }
    }
?>
