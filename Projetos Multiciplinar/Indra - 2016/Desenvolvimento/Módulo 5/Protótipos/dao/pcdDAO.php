<?php

require_once '../modelo/PCD.php';

class pcdDAO {

    public function listarPCD() {
        try {
            $db = Database::conectar();
            $query = "SELECT * FROM pcds";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listarPCDInteresse($idUser){
        try {
            $db = Database::conectar();
            $query = "SELECT pcds.PCD_ID, pcds.PCD_CIDADE FROM pcds INNER JOIN pcds_interesse_usuario on pcds_interesse_usuario.PCD_ID = pcds.PCD_ID WHERE pcds_interesse_usuario.USU_ID = :idUser";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":idUser", $idUser, PDO::PARAM_INT);
            $result = $stmt->execute();

            $pcds[];
            foreach ($result as $pcd) {
                $pcds[] = new PCD($pcd['pcds.PCD_ID'], null, null, null, $pcd['pcds.PCD_CIDADE'], null, null);
            }
            return $pcds[];
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}
