<?php
require 'ConectarBD.php';
require 'ModeloDAO.php';
require 'Erro.php';
require '../../class/mod02/Sensor.php';


class sensorDAO extends ConectarBD implements ModeloDAO {

    public function Atualizar($entidade) {
        try {
			$pdo = parent::CriarConexao();

            $sql = "update sensores_instalados_sensores set pcd_id = :pcd_id,tse_id = :tse_id,sen_periodicidade_medicao = :sen_periodicidade_medicao where sen_id = :id_sensor ;";
			
			$prepare = $pdo->prepare($sql);
			
			$prepare->bindValue(":id_sensor", $entidade->getId(), PDO::PARAM_INT);
			$prepare->bindValue(":pcd_id", $entidade->getIdPcd(), PDO::PARAM_INT);
            $prepare->bindValue(":tse_id", $entidade->getIdTipo(), PDO::PARAM_INT);
            $prepare->bindValue(":sen_periodicidade_medicao", $entidade->getPeriodicidadeMed(), PDO::PARAM_INT);
        
			
			
			$prepare->execute();
            return $prepare;
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function Criar($entidade) {
        try {
			
			$pdo = parent::CriarConexao();

            $sql = "insert into sensores_instalados_sensores (PCD_ID, TSE_ID, SEN_PERIODICIDADE_MEDICAO, SEN_ID, SEN_ESTADO) values (:idPCD, :idTSE, :periodo, :id, :estado)";
			
			$prepare = $pdo->prepare($sql);
			
			$prepare->bindValue(":idPCD", $entidade->getIdPcd(), PDO::PARAM_STR);
            $prepare->bindValue(":idTSE", $entidade->getIdTipo(), PDO::PARAM_STR);
            $prepare->bindValue(":periodo", $entidade->getPeriodicidadeMed(), PDO::PARAM_STR);
			$prepare->bindValue(":id", $entidade->getId(), PDO::PARAM_STR);
			$prepare->bindValue(":estado", $entidade->getEstado(), PDO::PARAM_STR);
			
			return $prepare->execute();
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function CriarObjeto($data) {
        
    }

    public function Deletar($entidade) {
        try {
			
			$pdo = parent::CriarConexao();

            $sql = "delete from sensores_instalados_sensores where SEN_id = :id";
			
			$prepare = $pdo->prepare($sql);
			
			$prepare->bindValue(":id", $entidade->getId(), PDO::PARAM_INT);
            
			
			return $prepare->execute();	
			
            
        } catch (PDOException $ex) {
            return Erro::ErroBD($ex);			
        }
    }

    public function Listar() {
        try {
            
			$pdo = parent::CriarConexao();

            $sql = "select * from sensores_instalados_sensores";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();
            
            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);			
            
            
			
			$lista = array();
            
			
            foreach ($fetch as $linha) {
                
				$lista[] = new Sensor($linha["SEN_ID"], $linha["PCD_ID"], $linha["TSE_ID"], $linha["SEN_PERIODICIDADE_MEDICAO"], $linha["SEN_ESTADO"]);
				
            }
            
            return $lista;
			
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function ListarID_PCD(){
         try{
            
            $pdo = parent::CriarConexao();
            
            $sql = "select PCD_ID from PCDS";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();
            
            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($fetch as $id) {
                echo '<option value="' . $id['PCD_ID'] . '">' . $id['PCD_ID'] . '</option>';
            }
            
            
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function ListarID_Tipo(){
         try{
            
            $pdo = parent::CriarConexao();
            
            $sql = "select TSE_ID from tipos_sensores";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();
            
            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($fetch as $id) {
                echo '<option value="' . $id['TSE_ID'] . '">' . $id['TSE_ID'] . '</option>';
            }
            
            
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function ProcurarPorID($id) {
        try {
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }
	
	    public function Listar_Funcionamento() {
       
        try{
            
            $pdo = parent::CriarConexao();
            
            $sql = "select PCD_ID, PCD_STATUS_FUNCIONAMENTO from PCDS";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();
            
            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
            
            $lista = array();
            
            foreach ($fetch as $linha) {
                $lista[] = new PCD($linha['PCD_ID'], null, null, null, null, null, $linha['PCD_STATUS_FUNCIONAMENTO']);
            }
            
            return $lista;
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

}

$Mod02SensorDAO = new sensorDAO();