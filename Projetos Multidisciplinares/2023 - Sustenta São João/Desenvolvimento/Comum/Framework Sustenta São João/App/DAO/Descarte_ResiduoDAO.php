<?php

namespace App\DAO;

use App\DAO;
use App\Model\Descarte_ResiduoModel;
use App\Model\DadosEstatisticosModel;

class Descarte_ResiduoDAO extends DAO
{

    public function inserir($descarte_residuo)
    {

        $quantidade = $descarte_residuo->__get("DSR_QUANTIDADE");
        $data_hora = $descarte_residuo->__get("DSR_DATA_HORA_DESCARTE");
        $fk_usuario = $descarte_residuo->__get("FK_CIDADAOS_USU_ID");
        $fk_residuo = $descarte_residuo->__get("FK_RESIDUOS_SOLIDOS_RES_ID");
        $fk_ponto = $descarte_residuo->__get("FK_PONTOS_COLETA_PCO_ID");
        $sql = "INSERT INTO descarte_residuos (DSR_QUANTIDADE, DSR_DATA_HORA_DESCARTE, FK_CIDADAOS_USU_ID, FK_RESIDUOS_SOLIDOS_RES_ID, FK_PONTOS_COLETA_PCO_ID) VALUES (:dsr_DSR_QUANTIDADE, :dsr_DSR_DATA_HORA_DESCARTE, :dsr_FK_CIDADAOS_USU_ID, :dsr_FK_RESIDUOS_SOLIDOS_RES_ID, :dsr_FK_PONTOS_COLETA_PCO_ID)";

        $stmt = $this->getConn()->prepare($sql);

        $stmt->bindParam(':dsr_DSR_QUANTIDADE', $quantidade);
        $stmt->bindParam(':dsr_DSR_DATA_HORA_DESCARTE', $data_hora);
        $stmt->bindParam(':dsr_FK_CIDADAOS_USU_ID', $fk_usuario);
        $stmt->bindParam(':dsr_FK_RESIDUOS_SOLIDOS_RES_ID', $fk_residuo);
        $stmt->bindParam(':dsr_FK_PONTOS_COLETA_PCO_ID', $fk_ponto);

        $stmt->execute();
    }

    public function alterar($descarte_residuo)
    {
        try {
            $sql = "UPDATE descarte_residuos SET DSR_QUANTIDADE=:quantidade, DSR_DATA_HORA_DESCARTE=:data_hora, FK_CIDADAOS_USU_ID=:fk_usuario, FK_RESIDUOS_SOLIDOS_RES_ID=:fk_residuo, FK_PONTOS_COLETA_PCO_ID=:fk_ponto WHERE DSR_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':id', $descarte_residuo->__get('DSR_ID'));
            $stmt->bindParam(':quantidade', $descarte_residuo->__get('DSR_QUANTIDADE'));
            $stmt->bindParam(':data_hora', $descarte_residuo->__get('DSR_DATA_HORA_DESCARTE'));
            $stmt->bindParam(':fk_usuario', $descarte_residuo->__get('FK_CIDADAOS_USU_ID'));
            $stmt->bindParam(':fk_residuo', $descarte_residuo->__get('FK_RESIDUOS_SOLIDOS_RES_ID'));
            $stmt->bindParam(':fk_ponto', $descarte_residuo->__get('FK_PONTOS_COLETA_PCO_ID'));

            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "delete from descarte_residuos where DSR_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error102');
            die();
        }
    }

    public function buscarPorID($id)
    {
        try {
            $sql = "SELECT * FROM descarte_residuos WHERE DSR_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result > 0) {
                $descarte_residuo = new Descarte_ResiduoModel();
                $descarte_residuo->__set('DSR_ID', $result['DSR_ID']);
                $descarte_residuo->__set('DSR_QUANTIDADE', $result['DSR_QUANTIDADE']);
                $descarte_residuo->__set('DSR_DATA_HORA_DESCARTE', $result['DSR_DATA_HORA_DESCARTE']);
                $descarte_residuo->__set('FK_CIDADAOS_USU_ID', $result['FK_CIDADAOS_USU_ID']);
                $descarte_residuo->__set('FK_RESIDUOS_SOLIDOS_RES_ID', $result['FK_RESIDUOS_SOLIDOS_RES_ID']);
                $descarte_residuo->__set('FK_PONTOS_COLETA_PCO_ID', $result['FK_PONTOS_COLETA_PCO_ID']);

                return $descarte_residuo;
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function listar()
    {
        try {
            $descarte_residuos = array();
            $sql = "SELECT * FROM descarte_residuos ORDER BY DSR_ID ASC";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $descarte_residuo = new Descarte_ResiduoModel();
                $descarte_residuo->__set('DSR_ID', $row['DSR_ID']);
                $descarte_residuo->__set('DSR_QUANTIDADE', $row['DSR_QUANTIDADE']);
                $descarte_residuo->__set('DSR_DATA_HORA_DESCARTE', $row['DSR_DATA_HORA_DESCARTE']);
                $descarte_residuo->__set('FK_CIDADAOS_USU_ID', $row['FK_CIDADAOS_USU_ID']);
                $descarte_residuo->__set('FK_RESIDUOS_SOLIDOS_RES_ID', $row['FK_RESIDUOS_SOLIDOS_RES_ID']);
                $descarte_residuo->__set('FK_PONTOS_COLETA_PCO_ID', $row['FK_PONTOS_COLETA_PCO_ID']);

                array_push($descarte_residuos, $descarte_residuo); //Inserindo os dados persistidos da tabela em um array
            }

            return $descarte_residuos; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function obterDados($ponto, $datai, $dataf)
    {
        try {
            $dadosEstatisticos = array();
            $sql = "SELECT
            RESIDUOS_SOLIDOS.RES_NOME_RESIDUO,
            SUM(DESCARTE_RESIDUOS.DSR_QUANTIDADE) AS QuantidadeTotal
        FROM
            DESCARTE_RESIDUOS
        JOIN
            RESIDUOS_SOLIDOS ON DESCARTE_RESIDUOS.FK_RESIDUOS_SOLIDOS_RES_ID = RESIDUOS_SOLIDOS.RES_ID
        JOIN
            PONTOS_COLETA_PROPRIETARIOS ON DESCARTE_RESIDUOS.FK_PONTOS_COLETA_PCO_ID = PONTOS_COLETA_PROPRIETARIOS.PCO_ID";

            $conditions = array();

            if (!empty($ponto)) {
                $conditions[] = "PONTOS_COLETA_PROPRIETARIOS.PCO_ID = :ponto";
            }

            if (!empty($datai)) {
                $conditions[] = "DESCARTE_RESIDUOS.DSR_DATA_HORA_DESCARTE >= :datai";
            }

            if (!empty($dataf)) {
                $conditions[] = "DESCARTE_RESIDUOS.DSR_DATA_HORA_DESCARTE <= :dataf";
            }

            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            $sql .= " GROUP BY RESIDUOS_SOLIDOS.RES_NOME_RESIDUO";

            $stmt = $this->getConn()->prepare($sql);

            if (!empty($ponto)) {
                $stmt->bindParam(':ponto', $ponto, \PDO::PARAM_STR);
            }

            if (!empty($datai)) {
                $stmt->bindParam(':datai', $datai, \PDO::PARAM_STR);
            }

            if (!empty($dataf)) {
                $stmt->bindParam(':dataf', $dataf, \PDO::PARAM_STR);
            }

            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $row) {
                $dadosEstatistico = new DadosEstatisticosModel();
                $dadosEstatistico->__set('DDE_RESIDUO', $row['RES_NOME_RESIDUO']);
                $dadosEstatistico->__set('DDE_QUANTIDADE', $row['QuantidadeTotal']);
                array_push($dadosEstatisticos, $dadosEstatistico);
            }

            return $dadosEstatisticos;
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }
}
