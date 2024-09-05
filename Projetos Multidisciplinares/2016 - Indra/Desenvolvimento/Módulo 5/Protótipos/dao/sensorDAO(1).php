<?php

class sensorDAO {

    public function listarSensor($idPCD) {
        try {
            $db = Database::conectar();
            $query = "SELECT * FROM sensores_instalados_sensores where PCD_ID = :idpcd";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":idpcd", $idPCD, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listarTipo($idTSE){
        try {
            $db = Database::conectar();
            $query = "SELECT * FROM tipos_sensores where TSE_ID = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":id", $idTSE, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}
