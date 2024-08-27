<?php

require_once '../../../modelo/mod05/paramAlertas.php';
require_once '../../../modelo/mod05/Database.php';

class paramDAO {

    public function editar($param) {
        try {
            $db = Database::conectar();

            $query = "UPDATE parametros_de_alertas SET PRA_VALOR_MAXIMO = :valorMax, PRA_VALOR_MINIMO = :valorMin, PRA_COR_MINIMA = :corMin, PRA_COR_MAXIMA = :corMax WHERE PRA_ID = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":valorMax", $param->getValorMax(), PDO::PARAM_INT);
            $stmt->bindValue(":valorMin", $param->getValorMin(), PDO::PARAM_INT);
            $stmt->bindValue(":corMax", $param->getCorMax(), PDO::PARAM_STR);
            $stmt->bindValue(":corMin", $param->getCorMin(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $param->getId(), PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listar($idSEN) {
        try {
            $db = Database::conectar();
            $query = "SELECT PRA_ID, PRA_VALOR_MAXIMO, PRA_VALOR_MINIMO, PRA_COR_MAXIMA, PRA_COR_MINIMA, SEN_ID, COUNT(*) FROM parametros_de_alertas where SEN_ID = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":id", $idSEN, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            return array(
                    new paramAlertas($result['PRA_ID'], $result['PRA_VALOR_MAXIMO'], $result['PRA_VALOR_MINIMO'], $result['PRA_COR_MAXIMA'], $result['PRA_COR_MINIMA'], $result['SEN_ID']),
                    $result['COUNT(*)']
                );
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function deletar($id) {
        try {
            $db = Database::conectar();
            $query = "DELETE FROM parametros_de_alertas WHERE PRA_ID = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function create($param) {
        try {
            $db = Database::conectar();

            $query = "INSERT INTO parametros_de_alertas (PRA_VALOR_MAXIMO, PRA_VALOR_MINIMO, PRA_COR_MINIMA, PRA_COR_MAXIMA, SEN_ID) VALUES (:valorMaximo, :valorMinimo, :corMin, :corMax, :idSensor)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":valorMaximo", $param->getValorMax(), PDO::PARAM_STR);
            $stmt->bindValue(":valorMinimo", $param->getvalorMin(), PDO::PARAM_STR);
            $stmt->bindValue(":corMax", $param->getCorMax(), PDO::PARAM_STR);
            $stmt->bindValue(":corMin", $param->getCorMin(), PDO::PARAM_STR);
            $stmt->bindValue(":idSensor", $param->getIdSensor(), PDO::PARAM_STR);
            $sucess = $stmt->execute();
            $param->setId($db->lastInsertId());
            return $sucess;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listarPCD() {
        try {
            $db = Database::conectar();
            $query = "SELECT * FROM pcds";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pcds = [];

            foreach($result as $pcd) {   
                $id = $pcd['PCD_ID'];
                $numSensores = $this::countSensor($id);
                $nome = '#' . $id . ' - '. $pcd['PCD_CIDADE'];
                $pcds[] = array(
                    "nome" => "$nome",
                    "qnt" => "$numSensores",
                    "id" => "$id"
                    );
            }   

            return $pcds;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listarSensor($idPCD) {
        try {
            $db = Database::conectar();
            $query = "SELECT * FROM sensores_instalados_sensores where PCD_ID = :idpcd";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":idpcd", $idPCD, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $params = [];
            foreach ($result as $sensor) {
                $idSensor = $sensor['SEN_ID'];
                $tipoSensor = $this::getTipo($sensor['TSE_ID']);
                $param = $this::listar($idSensor);              
                $valorMax = $param[0]->getValorMax();
                $valorMin = $param[0]->getValorMin();
                $corMax = $param[0]->getCorMax();
                $corMin = $param[0]->getCorMin();
                $idParam = $param[0]->getId();
                $temParam = $param[1] > 0;

                $params[] = array(
                    "valorMax" => "$valorMax",
                    "valorMin" => "$valorMin",
                    "corMax" => "$corMax",
                    "corMin" => "$corMin",
                    "id" => "$idParam",
                    "temParametro" => $temParam,
                    "idSensor" => "$idSensor",
                    "sensor" => "$tipoSensor"
                    );
            }
            return $params;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function countSensor($idPCD) {
        try {
            $db = Database::conectar();
            $query = "SELECT COUNT(*) FROM sensores_instalados_sensores where PCD_ID = :idpcd";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":idpcd", $idPCD, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['COUNT(*)'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function getTipo($idTSE){
        try {
            $db = Database::conectar();
            $query = "SELECT TSE_TIPO_SENSOR FROM tipos_sensores where TSE_ID = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":id", $idTSE, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['TSE_TIPO_SENSOR'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

}
