<?php
require 'ConectarBD.php';
require 'ModeloDAO.php';
require 'Erro.php';
require 'PCD.php';


class PcdDao extends ConectarBD implements ModeloDAO {

    public function Atualizar($entidade) {
        try {
			$pdo = parent::CriarConexao();

            $sql = "update pcds set pcd_cidade = :cidade,pcd_estado = :estado,pcd_latitude = :latitude,pcd_longitude = :longitude,pcd_descricao = :descricao where pcd_id = :id ;";
			
			$prepare = $pdo->prepare($sql);
			
			$prepare->bindValue(":id", $entidade->getId(), PDO::PARAM_INT);
			$prepare->bindValue(":cidade", $entidade->getCidade(), PDO::PARAM_STR);
            $prepare->bindValue(":estado", $entidade->getEstado(), PDO::PARAM_STR);
            $prepare->bindValue(":latitude", $entidade->getLatitude(), PDO::PARAM_STR);
			$prepare->bindValue(":longitude", $entidade->getLongitude(), PDO::PARAM_STR);
			$prepare->bindValue(":descricao", $entidade->getDescricao(), PDO::PARAM_STR);
        
			echo $entidade->getId();
			echo $entidade->getCidade();
			echo $entidade->getEstado();
			echo $entidade->getLatitude();
			echo $entidade->getLongitude();
			echo $entidade->getDescricao();
			$prepare->execute();
            return $prepare;
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function Criar($entidade) {
        try {
			
			$pdo = parent::CriarConexao();

            $sql = "insert into pcds(pcd_cidade,pcd_estado,pcd_latitude,pcd_longitude,pcd_descricao,pcd_status_funcionamento) values(:cidade,:estado,:latitude,:longitude,:descricao,1)";
			
			$prepare = $pdo->prepare($sql);
			
			$prepare->bindValue(":cidade", $entidade->getCidade(), PDO::PARAM_STR);
            $prepare->bindValue(":estado", $entidade->getEstado(), PDO::PARAM_STR);
            $prepare->bindValue(":latitude", $entidade->getLatitude(), PDO::PARAM_STR);
			$prepare->bindValue(":longitude", $entidade->getLongitude(), PDO::PARAM_STR);
			$prepare->bindValue(":descricao", $entidade->getDescricao(), PDO::PARAM_STR);
			
			$prepare->execute();
            return $entidade->setId($pdo->lastInsertId());
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function CriarObjeto($data) {
        
    }

    public function Deletar($entidade) {
        try {
			
			$pdo = parent::CriarConexao();

            $sql = "delete from pcds where pcd_id = :id";
			
			$prepare = $pdo->prepare($sql);
            echo("aaaaaaaaaa".$entidade->getId());
			
			$prepare->bindValue(":id", $entidade->getId(), PDO::PARAM_INT);
            
			
			$prepare->execute();
            return $entidade->setId($pdo->lastInsertId());
			
			
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function Listar() {
        try {
            
			$pdo = parent::CriarConexao();

            $sql = "select * from pcds";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();
            
            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);			
            
            
			
			$lista = array();
            
			
            foreach ($fetch as $linha) {
                
				$lista[] = new PCD($linha["PCD_ID"], $linha["PCD_CIDADE"], $linha["PCD_ESTADO"], $linha["PCD_LATITUDE"], $linha["PCD_LONGITUDE"], $linha["PCD_DESCRICAO"],null);
				
            }
            
            return $lista;
			
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

$Mod02PcdDao = new PcdDao();