<?php

class MedicaoDAO {

    public static function Atualizar($medicao) {
        try {

            $pdo = ConectarBD::CriarConexao();

            $sql = "UPDATE MEDICOES SET MED_DADO = :dado, MED_DATA_HORA_MEDICAO = DATE_FORMAT(:data,'%Y-%m-%d %H:%i:%s'), SEN_ID = :sensor_instalado WHERE  MED_ID = :id";

            $prepare = $pdo->prepare($sql);

            $prepare->bindValue(":id", $medicao->getId(), PDO::PARAM_INT);
            $prepare->bindValue(":dado", $medicao->getMedicao(), PDO::PARAM_INT);
            $prepare->bindValue(":data", $medicao->getDataHora(), PDO::PARAM_INT);
            $prepare->bindValue(":sensor_instalado", $medicao->getSensorInstaladoSensor(), PDO::PARAM_INT);

            return $prepare->execute();
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public static function TipoSensores($idSis) {
        try {
            $pdo = ConectarBD::CriarConexao();

            $sql = "SELECT DISTINCT TSE_TIPO_SENSOR, SENSORES_INSTALADOS_SENSORES.TSE_ID, TSE_UNIDADE_MEDIDA, SEN_ID FROM TIPOS_SENSORES, SENSORES_INSTALADOS_SENSORES WHERE SENSORES_INSTALADOS_SENSORES.TSE_ID = TIPOS_SENSORES.TSE_ID and SENSORES_INSTALADOS_SENSORES.SEN_ID = :id";

            $prepare = $pdo->prepare($sql);
            $prepare->bindParam(":id", $idSis, PDO::PARAM_INT);
            $prepare->execute();
            return $prepare->fetch(PDO::FETCH_NUM);
        } catch (PDOException $ex) {
            
        }
    }

    public static function TipoSensor($idSensor) {
        try {
            $pdo = ConectarBD::CriarConexao();

            $sql = "SELECT TSE_TIPO_SENSOR, TSE_ID, TSE_UNIDADE_MEDIDA FROM TIPOS_SENSORES WHERE TSE_ID = :id";
            $prepare = $pdo->prepare($sql);
            $prepare->bindParam(":id", $idSensor, PDO::PARAM_INT);
            $prepare->execute();
            return $prepare->fetch(PDO::FETCH_NUM);
        } catch (PDOException $ex) {
            
        }
    }

    public static function TipoMedicao($idPcd) {
        try {
            $pdo = ConectarBD::CriarConexao();

            $sql = "SELECT distinct "
                    . "TIPOS_MEDICOES.TIM_NOME, "
                    . "TIPOS_SENSORES.TIM_ID, "
                    . "SENSORES_INSTALADOS_SENSORES.SEN_ID "
                    . "FROM "
                    . "TIPOS_MEDICOES, "
                    . "SENSORES_INSTALADOS_SENSORES, "
                    . "TIPOS_SENSORES, "
                    . "PCDS "
                    . "WHERE "
                    . "SENSORES_INSTALADOS_SENSORES.TSE_ID = TIPOS_SENSORES.TSE_ID and "
                    . "TIPOS_MEDICOES.TIM_ID = TIPOS_SENSORES.TIM_ID and "
                    . "SENSORES_INSTALADOS_SENSORES.PCD_ID = :id";

            $prepare = $pdo->prepare($sql);

            $prepare->bindParam(":id", $idPcd, PDO::PARAM_INT);

            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_NUM);
        } catch (PDOException $ex) {
            
        }
    }

    public static function Criar($medicao) {
        try {

            $pdo = ConectarBD::CriarConexao();

            //Criando o Pcd Sensor Instalado
            // Criando a Medicao
            $sql = "INSERT INTO MEDICOES (MED_DADO, MED_DATA_HORA_MEDICAO, API_ID, SEN_ID) 
                    VALUES (:dado, DATE_FORMAT(:data,'%Y-%m-%d %H:%i:%s'), :api, :sensor)";

            $prepare = $pdo->prepare($sql);

            $prepare->bindValue(":dado", $medicao->getMedicao(), PDO::PARAM_STR);
            $prepare->bindValue(":data", $medicao->getDataHora(), PDO::PARAM_STR);
            $prepare->bindValue(":sensor", $medicao->getSensorInstaladoSensor(), PDO::PARAM_INT);
            $prepare->bindValue(":api", $medicao->getArquivoPcdImportado(), PDO::PARAM_INT);

            return $prepare->execute();
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public static function Excluir($id) {
        try {

            $pdo = ConectarBD::CriarConexao();

            $sql = "DELETE from MEDICOES where MED_ID = :id";

            $prepare = $pdo->prepare($sql);

            $prepare->bindValue(":id", $id->getId(), PDO::PARAM_INT);

            return $prepare->execute();
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public static function ListarMedicaoPcd($idPcd) {
        try {
            $pdo = ConectarBD::CriarConexao();
            $sql = "select distinct m.med_data_hora_medicao as data_hora, m.med_dado as dado, tm.tim_nome as nome, tp.tse_tipo_sensor as sensor, tp.tse_unidade_medida as umedida FROM MEDICOES m, PCDS p, SENSORES_INSTALADOS_SENSORES sis, TIPOS_SENSORES tp, TIPOS_MEDICOES tm WHERE tm.tim_id = tp.tim_id AND tp.tse_id = sis.tse_id AND sis.sen_id = m.sen_id AND sis.pcd_id = :id";

            $prepare = $pdo->prepare($sql);
            $prepare->bindParam(":id", $idPcd, PDO::PARAM_INT);
            $prepare->execute();
            return $prepare->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public static function BuscarMedicao($idMedicao) {
        try {
            $pdo = ConectarBD::CriarConexao();
            $sql = "select m.med_data_hora_medicao as data_hora, m.med_dado as dado, m.sen_id as sis FROM MEDICOES m WHERE m.MED_ID = :id";

            $prepare = $pdo->prepare($sql);
            $prepare->bindParam(":id", $idMedicao, PDO::PARAM_INT);
            $prepare->execute();
            $data = $prepare->fetch(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public static function ProcurarPorDATA($datainicial, $datafinal, $id) {
        try {

            $pdo = ConectarBD::CriarConexao();

            $datainicial .= " 00:00:00";
            $datafinal .= " 23:59:59";

            $sql = "select distinct "
                    . "m.MED_DATA_HORA_MEDICAO as data_hora, "
                    . "m.MED_DADO as dado, "
                    . "tm.TIM_NOME as nome, "
                    . "tp.TSE_TIPO_SENSOR as sensor, "
                    . "tp.TSE_UNIDADE_MEDIDA as umedida, "
                    . "MED_ID, "
                    . "sis.TSE_ID as sis_id "
                    . "FROM "
                    . "MEDICOES m, "
                    . "PCDS p, "
                    . "SENSORES_INSTALADOS_SENSORES sis, "
                    . "TIPOS_SENSORES tp, "
                    . "TIPOS_MEDICOES tm "
                    . "WHERE "
                    . "tm.TIM_ID = tp.TIM_ID AND "
                    . "tp.TSE_ID = sis.TSE_ID AND "
                    . "sis.SEN_ID = m.SEN_ID AND "
                    . "sis.PCD_ID = :id AND "
                    . "m.MED_DATA_HORA_MEDICAO "
                    . "BETWEEN "
                    . "DATE_FORMAT(:datainicial,'%Y-%m-%d %H:%i:%s') AND "
                    . "DATE_FORMAT(:datafinal,'%Y-%m-%d %H:%i:%s')";

            $prepare = $pdo->prepare($sql);

            $prepare->bindValue(":id", $id, PDO::PARAM_INT);

            $prepare->bindValue(":datainicial", $datainicial, PDO::PARAM_STR);

            $prepare->bindValue(":datafinal", $datafinal, PDO::PARAM_STR);

            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

}

//$MedicaoDAO = new MedicaoDAO();
