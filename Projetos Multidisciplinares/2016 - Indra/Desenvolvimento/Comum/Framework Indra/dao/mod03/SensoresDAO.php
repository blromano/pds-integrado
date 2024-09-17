<?php

class SensoresDAO{
    
    
    public static function ListarSensores($id_pcd) {
        
        $pdo = ConectarBD::CriarConexao();
        
        $sql = "SELECT sis.SEN_ID as id_sensor, sis.SEN_PERIODICIDADE_MEDICAO as period_medicao, ts.TSE_TIPO_SENSOR as tipo_sensor, sis.SEN_ESTADO as estado FROM SENSORES_INSTALADOS_SENSORES sis, TIPOS_SENSORES ts WHERE ts.TSE_ID = sis.TSE_ID AND sis.PCD_ID = :id_pcd";
        
        $prepare = $pdo->prepare($sql);

        $prepare->bindValue(":id_pcd", $id_pcd, PDO::PARAM_INT);
        
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function AlterarPeriodicidadeSensor($sensor){

    	$pdo = ConectarBD::CriarConexao();
    	
    	$sql ="UPDATE SENSORES_INSTALADOS_SENSORES SET SEN_PERIODICIDADE_MEDICAO = :periodicidade WHERE SEN_ID = :id";
        
    	$prepare = $pdo->prepare($sql);

    	$prepare->bindValue(":periodicidade", $sensor->getPeriodicidadeMedicao(), PDO::PARAM_INT);
        $prepare->bindValue(":id", $sensor->getSensorId(), PDO::PARAM_INT);
        return $prepare->execute();

    }
    
    public static function BuscaPeriodicidade($idpcd){
        
        $pdo = ConectarBD::CriarConexao();
        
        $sql = "SELECT SEN_PERIODICIDADE_MEDICAO FROM SENSORES_INSTALADOS_SENSORES WHERE SEN_ID = :id";
        
        $prepare = $pdo->prepare($sql);
        
        
        $prepare->bindValue(":id", $idpcd, PDO::PARAM_INT);
        
        $prepare->execute();

        return $prepare->fetch(PDO::FETCH_NUM);
        
    }
    
    public static function AlterarEstadoSensor($sensor){
        
        $pdo = ConectarBD::CriarConexao();
        
        $sql = "UPDATE SENSORES_INSTALADOS_SENSORES SET SEN_PERIODICIDADE_MEDICAO = :periodicidade, SEN_ESTADO = :estado WHERE SEN_ID = :id";
        
        $prepare = $pdo->prepare($sql);

    	$prepare->bindValue(":periodicidade", $sensor->getPeriodicidadeMedicao(), PDO::PARAM_INT);
        $prepare->bindValue(":estado", $sensor->getEstadoSensor(), PDO::PARAM_INT);
        $prepare->bindValue(":id", $sensor->getSensorId(), PDO::PARAM_INT);
 
        
        
        return $prepare->execute();
        
        
        
    }
    
    public static function JustificativaAlteracao(Justificativa $just) {
        
         $pdo = ConectarBD::CriarConexao();
         
         $sql = "INSERT INTO HISTORICO_MUDANCAS_STATUS_SENSORES (HMS_STATUS_ALTERADO, HMS_DATA_HORA_ALTERACAO, HMS_MOTIVO_MUDANCA_STATUS, SEN_ID) VALUES (:status, NOW(), :justificativa, :idsensor)";
         
         $prepare = $pdo->prepare($sql);
         
         $prepare->bindValue(":status", $just->getHmsStatusAlteracao(), PDO::PARAM_INT);
         $prepare->bindValue(":justificativa", $just->getHmsMotivoMudancaStatus(), PDO::PARAM_STR);
         $prepare->bindValue(":idsensor", $just->getSenId(), PDO::PARAM_INT);
         
         return $prepare->execute();
    }


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

