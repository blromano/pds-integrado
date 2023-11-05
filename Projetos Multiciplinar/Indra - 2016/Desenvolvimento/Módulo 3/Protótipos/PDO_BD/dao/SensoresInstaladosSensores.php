<?php

class SensoresInstaladosSensores {

    public static function BuscarSensoresInstaladosSensores($idPcd) {
        try {
            $pdo = ConectarBD::CriarConexao();

            $sql = "SELECT SEN_ID, TSE_ID, SEN_ESTADO, FROM SENSORES_INSTALADOS_SENSORES WHERE PCD_ID = :id";

            $prepare = $pdo->prepare($sql);

            $prepare->bindParam(":id", $idPcd, PDO::PARAM_INT);

            $prepare->execute();
            
            return $prepare->fetch(PDO::FETCH_NUM);
        } catch (PDOException $ex) {
            
        }
    }

}
